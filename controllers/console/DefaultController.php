<?php

namespace kouosl\menu\controllers;

use yii\web\Controller;

/**
 * Default controller for the `menu` module
 */
class DefaultController extends \kouosl\base\controllers\backend\BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
