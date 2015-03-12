<?php namespace Gist\Library\Helpers;

use Webpatser\Uuid\Uuid;

class UuidGenerator {

    public static function generate($model = null)
    {
        do {
            $uuid = (string)Uuid::generate(4);

            if ( ! $model )
                return $uuid;

        } while ( ! static::isValidUuid($uuid, $model) );

        return $uuid;
    }

    /**
     * Find uuid in database and return true if there is no duplicate uuid
     *
     * @param $uuid
     * @param $model
     * @return bool
     */
    private static function isValidUuid($uuid, $model)
    {
        $modelClass = get_class($model);

        $find = call_user_func("\\$modelClass::find", $uuid);

        return is_null ( $find );
    }
}
