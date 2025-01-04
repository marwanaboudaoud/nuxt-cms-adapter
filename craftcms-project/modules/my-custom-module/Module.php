<?php
namespace modules\mycustommodule;

use Craft;
use craft\base\Module as BaseModule;

class Module extends BaseModule
{
    public function init()
    {
        parent::init();
        
        Craft::$app->getComponents()['graphql'] = [
            'class' => \modules\mycustommodule\graphql\GraphQL::class,
        ];
    }
}
