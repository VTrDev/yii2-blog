<?php

namespace vtrdev\blog;

/**
 * blog module definition class
 */
class Blog extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'vtrdev\blog\controllers';

    public $defaultRoute = 'blog'; // дефолтный контроллер

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
