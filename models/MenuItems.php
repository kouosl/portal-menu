<?php

namespace kouosl\menu\models;

use Yii;

/**
 * This is the model class for table "menu_items".
 *
 * @property int $id
 * @property string $label
 * @property string $link
 * @property string $target
 * @property string $type
 * @property string $parent
 * @property int $menu_id
 */
class MenuItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'link', 'target', 'type', 'parent', 'menu_id'], 'required'],
            [['menu_id'], 'integer'],
            [['label', 'link', 'target', 'type', 'parent'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'link' => 'Link',
            'target' => 'Target',
            'type' => 'Type',
            'parent' => 'Parent',
            'menu_id' => 'Menu ID',
        ];
    }
}
