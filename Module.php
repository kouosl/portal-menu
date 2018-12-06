<?php

namespace kouosl\menu;
use Yii;

class Module extends \kouosl\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = '';

    public function init()
    {
        parent::init();
    }
    
    public function registerTranslations()
    {
        Yii::$app->i18n->translations['menu/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@kouosl/menu/messages',
            'fileMap' => [
                'menu/menu' => 'menu.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('menu/' . $category, $message, $params, $language);
    }

    public static function initRules(){

        return $rules = [
            [
                'class' => 'yii\rest\UrlRule',
                'controller' => [
                    'menu/menu',
                ],
                'tokens' => [
                    '{id}' => '<id:\\w+>'
                ],
            ],
        ] ;
    }
}
