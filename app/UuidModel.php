<?php
namespace Gist;

use Illuminate\Database\Eloquent\Model;
use Gist\Library\Helpers\UuidGenerator;

class UuidModel extends Model
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $model->{$model->getKeyName()} = UuidGenerator::generate($model);

        });
    }
}