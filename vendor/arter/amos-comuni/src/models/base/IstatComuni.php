<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @see http://example.com Developers'community
 * @license GPLv3
 * @license https://opensource.org/licenses/gpl-3.0.html GNU General Public License version 3
 *
 * @package    arter\amos\comuni
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\comuni\models\base;

use Yii;
use arter\amos\comuni\AmosComuni;

/**
 * This is the base-model class for table "istat_comuni".
 *
 * @property integer $id
 * @property string $nome
 * @property string $progressivo
 * @property string $nome_tedesco
 * @property integer $cod_ripartizione_geografica
 * @property string $ripartizione_geografica
 * @property integer $comune_capoluogo_provincia
 * @property string $cod_istat_alfanumerico
 * @property integer $codice_2006_2009
 * @property integer $codice_1995_2005
 * @property string $codice_catastale
 * @property integer $popolazione_20111009
 * @property string $codice_nuts1_2010
 * @property string $codice_nuts2_2010
 * @property string $codice_nuts3_2010
 * @property string $codice_nuts1_2006
 * @property string $codice_nuts2_2006
 * @property string $codice_nuts3_2006
 * @property integer $soppresso
 * @property integer $istat_unione_dei_comuni_id
 * @property integer $istat_regioni_id
 * @property integer $istat_province_id
 *
 * @property \arter\amos\comuni\models\IstatProvince $istatProvince
 * @property \arter\amos\comuni\models\IstatRegioni $istatRegioni
 * @property \arter\amos\comuni\models\IstatUnioneDeiComuni $istatUnioneDeiComuni
 */
class IstatComuni extends \arter\amos\core\record\Record {

  /**
   * @inheritdoc
   */
  public static function tableName() {
    return 'istat_comuni';
  }

  /**
   * @inheritdoc
   */
  public function rules() {
    return [
      [
        ['id', 'nome', 'istat_province_id'], 
        'required'
      ],
      [
        [
          'id', 'cod_ripartizione_geografica', 'comune_capoluogo_provincia', 
          'codice_2006_2009', 'codice_1995_2005', 'popolazione_20111009', 
          'soppresso', 'istat_unione_dei_comuni_id', 'istat_regioni_id', 
          'istat_province_id'
        ], 
        'integer'
      ],
      [
        [
          'nome', 'progressivo', 'nome_tedesco', 'ripartizione_geografica', 
          'cod_istat_alfanumerico', 'codice_catastale', 'codice_nuts1_2010', 
          'codice_nuts2_2010', 'codice_nuts3_2010', 'codice_nuts1_2006', 
          'codice_nuts2_2006', 'codice_nuts3_2006'
        ], 
        'string', 
        'max' => 255
      ],
      [
        ['istat_province_id'], 
        'exist', 
        'skipOnError' => true, 
        'targetClass' => IstatProvince::className(), 
        'targetAttribute' => ['istat_province_id' => 'id']
      ],
      [
        ['istat_regioni_id'], 
        'exist', 
        'skipOnError' => true, 
        'targetClass' => IstatRegioni::className(), 
        'targetAttribute' => ['istat_regioni_id' => 'id']
      ],
      [
        ['istat_unione_dei_comuni_id'],
        'exist', 
        'skipOnError' => true, 
        'targetClass' => IstatUnioneDeiComuni::className(), 
        'targetAttribute' => ['istat_unione_dei_comuni_id' => 'id']
      ],
    ];
  }

  /**
   * @inheritdoc
   */
  public function attributeLabels() {
    return [
      'id' => AmosComuni::t('amoscomuni', 'ID'),
      'nome' => AmosComuni::t('amoscomuni', 'Comune'),
      'progressivo' => AmosComuni::t('amoscomuni', 'Progressivo'),
      'nome_tedesco' => AmosComuni::t('amoscomuni', 'Nome tedesco'),
      'cod_ripartizione_geografica' => AmosComuni::t('amoscomuni', 'Codice di ripartizione geografica'),
      'ripartizione_geografica' => AmosComuni::t('amoscomuni', 'Ripartizione geografica'),
      'comune_capoluogo_provincia' => AmosComuni::t('amoscomuni', 'Capoluogo di provincia'),
      'cod_istat_alfanumerico' => AmosComuni::t('amoscomuni', 'Codice Istat alfanumerico'),
      'codice_2006_2009' => AmosComuni::t('amoscomuni', 'Codice Istat 2006-2009'),
      'codice_1995_2005' => AmosComuni::t('amoscomuni', 'Codice Istat 1995-2005'),
      'codice_catastale' => AmosComuni::t('amoscomuni', 'Codice catastale'),
      'popolazione_20111009' => AmosComuni::t('amoscomuni', 'Popolazione al 09/10/2011'),
      'codice_nuts1_2010' => AmosComuni::t('amoscomuni', 'NUTS1 2010'),
      'codice_nuts2_2010' => AmosComuni::t('amoscomuni', 'NUTS2 2010'),
      'codice_nuts3_2010' => AmosComuni::t('amoscomuni', 'NUTS3 2010'),
      'codice_nuts1_2006' => AmosComuni::t('amoscomuni', 'NUTS1 2006'),
      'codice_nuts2_2006' => AmosComuni::t('amoscomuni', 'NUTS2 2006'),
      'codice_nuts3_2006' => AmosComuni::t('amoscomuni', 'NUTS3 2006'),
      'soppresso' => AmosComuni::t('amoscomuni', 'Soppresso'),
      'istat_unione_dei_comuni_id' => AmosComuni::t('amoscomuni', 'Istat Unione Dei Comuni ID'),
      'istat_regioni_id' => AmosComuni::t('amoscomuni', 'Regione'),
      'istat_province_id' => AmosComuni::t('amoscomuni', 'Provincia'),
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getIstatProvince() {
    return $this->hasOne(\arter\amos\comuni\models\IstatProvince::className(), ['id' => 'istat_province_id'])->inverseOf('istatComunis');
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getIstatRegioni() {
    return $this->hasOne(\arter\amos\comuni\models\IstatRegioni::className(), ['id' => 'istat_regioni_id'])->inverseOf('istatComunis');
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getIstatUnioneDeiComuni() {
    return $this->hasOne(\arter\amos\comuni\models\IstatUnioneDeiComuni::className(), ['id' => 'istat_unione_dei_comuni_id'])->inverseOf('istatComunis');
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getIstatComuniCaps() {
    return $this->hasMany(\arter\amos\comuni\models\IstatComuniCap::className(), ['comune_id' => 'id']);
  }

}