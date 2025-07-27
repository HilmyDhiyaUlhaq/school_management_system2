<?php


namespace App\Traits;

use App\Helpers\IdManager;

trait AutoIdManager
{
    protected static function bootAutoIdManager()
    {
        static::deleted(function ($model) {
            IdManager::autoReset($model->getTable());
        });
    }
}
