<?php namespace Gist;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

class UuidModel extends Model {

    public static function boot()
    {
        static::creating(function ($model) {

            //TODO: Check for duplicate uuid
            $model->{$model->getKeyName()} = (string) Uuid::generate(4);

        });
    }

//    /**
//     * Generate a unique Uuid
//     *
//     * @return string
//     * @throws \Exception
//     */
//    private function generateUuid()
//    {
//        do {
//            $key = (string) Uuid::generate(4);
//
//        } while ( $this->isValidUuid($key)) ;
//
//        return $key;
//    }
//
//    /**
//     * Check for duplicate Uuid
//     *
//     * @param $key
//     * @return bool
//     */
//    private function isValidUuid($key)
//    {
//        return is_null( static::find($key) );
//    }


} 