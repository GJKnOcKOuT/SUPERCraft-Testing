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


/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Aws\Sdk;
use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Marshaler;
use Monolog\Formatter\ScalarFormatter;
use Monolog\Logger;

/**
 * Amazon DynamoDB handler (http://aws.amazon.com/dynamodb/)
 *
 * @link https://github.com/aws/aws-sdk-php/
 * @author Andrew Lawson <adlawson@gmail.com>
 */
class DynamoDbHandler extends AbstractProcessingHandler
{
    const DATE_FORMAT = 'Y-m-d\TH:i:s.uO';

    /**
     * @var DynamoDbClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $table;

    /**
     * @var int
     */
    protected $version;

    /**
     * @var Marshaler
     */
    protected $marshaler;

    /**
     * @param DynamoDbClient $client
     * @param string         $table
     * @param int            $level
     * @param bool           $bubble
     */
    public function __construct(DynamoDbClient $client, $table, $level = Logger::DEBUG, $bubble = true)
    {
        if (defined('Aws\Sdk::VERSION') && version_compare(Sdk::VERSION, '3.0', '>=')) {
            $this->version = 3;
            $this->marshaler = new Marshaler;
        } else {
            $this->version = 2;
        }

        $this->client = $client;
        $this->table = $table;

        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritdoc}
     */
    protected function write(array $record)
    {
        $filtered = $this->filterEmptyFields($record['formatted']);
        if ($this->version === 3) {
            $formatted = $this->marshaler->marshalItem($filtered);
        } else {
            /** @phpstan-ignore-next-line */
            $formatted = $this->client->formatAttributes($filtered);
        }

        $this->client->putItem(array(
            'TableName' => $this->table,
            'Item' => $formatted,
        ));
    }

    /**
     * @param  array $record
     * @return array
     */
    protected function filterEmptyFields(array $record)
    {
        return array_filter($record, function ($value) {
            return !empty($value) || false === $value || 0 === $value;
        });
    }

    /**
     * {@inheritdoc}
     */
    protected function getDefaultFormatter()
    {
        return new ScalarFormatter(self::DATE_FORMAT);
    }
}
