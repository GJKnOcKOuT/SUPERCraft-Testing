<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @see https://repo.art-er.it Developers' community
 * @license GPLv3
 * @license https://opensource.org/licenses/gpl-3.0.html GNU General Public License version 3
 *
 * @package    arter
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */


namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column;
use PhpOffice\PhpSpreadsheet\Worksheet\AutoFilter\Column\Rule;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AutoFilter
{
    private $worksheet;

    private $worksheetXml;

    public function __construct(Worksheet $workSheet, \SimpleXMLElement $worksheetXml)
    {
        $this->worksheet = $workSheet;
        $this->worksheetXml = $worksheetXml;
    }

    public function load()
    {
        $autoFilterRange = (string) $this->worksheetXml->autoFilter['ref'];
        if (strpos($autoFilterRange, ':') !== false) {
            $this->readAutoFilter($autoFilterRange, $this->worksheetXml);
        }
    }

    private function readAutoFilter($autoFilterRange, $xmlSheet)
    {
        $autoFilter = $this->worksheet->getAutoFilter();
        $autoFilter->setRange($autoFilterRange);

        foreach ($xmlSheet->autoFilter->filterColumn as $filterColumn) {
            $column = $autoFilter->getColumnByOffset((int) $filterColumn['colId']);
            //    Check for standard filters
            if ($filterColumn->filters) {
                $column->setFilterType(Column::AUTOFILTER_FILTERTYPE_FILTER);
                $filters = $filterColumn->filters;
                if ((isset($filters['blank'])) && ($filters['blank'] == 1)) {
                    //    Operator is undefined, but always treated as EQUAL
                    $column->createRule()->setRule(null, '')->setRuleType(Rule::AUTOFILTER_RULETYPE_FILTER);
                }
                //    Standard filters are always an OR join, so no join rule needs to be set
                //    Entries can be either filter elements
                foreach ($filters->filter as $filterRule) {
                    //    Operator is undefined, but always treated as EQUAL
                    $column->createRule()->setRule(null, (string) $filterRule['val'])->setRuleType(Rule::AUTOFILTER_RULETYPE_FILTER);
                }

                //    Or Date Group elements
                $this->readDateRangeAutoFilter($filters, $column);
            }

            //    Check for custom filters
            $this->readCustomAutoFilter($filterColumn, $column);
            //    Check for dynamic filters
            $this->readDynamicAutoFilter($filterColumn, $column);
            //    Check for dynamic filters
            $this->readTopTenAutoFilter($filterColumn, $column);
        }
    }

    private function readDateRangeAutoFilter(\SimpleXMLElement $filters, Column $column)
    {
        foreach ($filters->dateGroupItem as $dateGroupItem) {
            //    Operator is undefined, but always treated as EQUAL
            $column->createRule()->setRule(
                null,
                [
                    'year' => (string) $dateGroupItem['year'],
                    'month' => (string) $dateGroupItem['month'],
                    'day' => (string) $dateGroupItem['day'],
                    'hour' => (string) $dateGroupItem['hour'],
                    'minute' => (string) $dateGroupItem['minute'],
                    'second' => (string) $dateGroupItem['second'],
                ],
                (string) $dateGroupItem['dateTimeGrouping']
            )->setRuleType(Rule::AUTOFILTER_RULETYPE_DATEGROUP);
        }
    }

    private function readCustomAutoFilter(\SimpleXMLElement $filterColumn, Column $column)
    {
        if ($filterColumn->customFilters) {
            $column->setFilterType(Column::AUTOFILTER_FILTERTYPE_CUSTOMFILTER);
            $customFilters = $filterColumn->customFilters;
            //    Custom filters can an AND or an OR join;
            //        and there should only ever be one or two entries
            if ((isset($customFilters['and'])) && ($customFilters['and'] == 1)) {
                $column->setJoin(Column::AUTOFILTER_COLUMN_JOIN_AND);
            }
            foreach ($customFilters->customFilter as $filterRule) {
                $column->createRule()->setRule(
                    (string) $filterRule['operator'],
                    (string) $filterRule['val']
                )->setRuleType(Rule::AUTOFILTER_RULETYPE_CUSTOMFILTER);
            }
        }
    }

    private function readDynamicAutoFilter(\SimpleXMLElement $filterColumn, Column $column)
    {
        if ($filterColumn->dynamicFilter) {
            $column->setFilterType(Column::AUTOFILTER_FILTERTYPE_DYNAMICFILTER);
            //    We should only ever have one dynamic filter
            foreach ($filterColumn->dynamicFilter as $filterRule) {
                //    Operator is undefined, but always treated as EQUAL
                $column->createRule()->setRule(
                    null,
                    (string) $filterRule['val'],
                    (string) $filterRule['type']
                )->setRuleType(Rule::AUTOFILTER_RULETYPE_DYNAMICFILTER);
                if (isset($filterRule['val'])) {
                    $column->setAttribute('val', (string) $filterRule['val']);
                }
                if (isset($filterRule['maxVal'])) {
                    $column->setAttribute('maxVal', (string) $filterRule['maxVal']);
                }
            }
        }
    }

    private function readTopTenAutoFilter(\SimpleXMLElement $filterColumn, Column $column)
    {
        if ($filterColumn->top10) {
            $column->setFilterType(Column::AUTOFILTER_FILTERTYPE_TOPTENFILTER);
            //    We should only ever have one top10 filter
            foreach ($filterColumn->top10 as $filterRule) {
                $column->createRule()->setRule(
                    (((isset($filterRule['percent'])) && ($filterRule['percent'] == 1))
                        ? Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_PERCENT
                        : Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_BY_VALUE
                    ),
                    (string) $filterRule['val'],
                    (((isset($filterRule['top'])) && ($filterRule['top'] == 1))
                        ? Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_TOP
                        : Rule::AUTOFILTER_COLUMN_RULE_TOPTEN_BOTTOM
                    )
                )->setRuleType(Rule::AUTOFILTER_RULETYPE_TOPTENFILTER);
            }
        }
    }
}
