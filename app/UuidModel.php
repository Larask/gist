<?php namespace Gist;

use Illuminate\Database\Eloquent\Model;
use Gist\Library\Helpers\UuidGenerator;

class UuidModel extends Model {

    public static function boot()
    {
        static::creating(function ($model) {

            //TODO: Check for duplicate uuid
            $model->{$model->getKeyName()} = UuidGenerator::generate($model);

        });
    }

} 