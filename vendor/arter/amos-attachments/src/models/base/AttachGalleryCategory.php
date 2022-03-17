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


namespace arter\amos\attachments\models\base;

use Yii;

/**
 * This is the base-model class for table "attach_gallery_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $default_order
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 *
 * @property \arter\amos\attachments\models\AttachGalleryImage[] $attachGalleryImages
 */
class  AttachGalleryCategory extends \arter\amos\core\record\Record
{


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attach_gallery_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['default_order', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('amosattachments', 'ID'),
            'name' => Yii::t('amosattachments', 'Name'),
            'description' => Yii::t('amosattachments', 'Description'),
            'default_order' => Yii::t('amosattachments', 'Order'),
            'created_at' => Yii::t('amosattachments', 'Created at'),
            'updated_at' => Yii::t('amosattachments', 'Updated at'),
            'deleted_at' => Yii::t('amosattachments', 'Deleted at'),
            'created_by' => Yii::t('amosattachments', 'Created by'),
            'updated_by' => Yii::t('amosattachments', 'Updated at'),
            'deleted_by' => Yii::t('amosattachments', 'Deleted at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttachGalleryImages()
    {
        return $this->hasMany(\arter\amos\attachments\models\AttachGalleryImage::className(), ['category_id' => 'id']);
    }
}
