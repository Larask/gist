<?php namespace Gist;

use Illuminate\Database\Eloquent\Model;

class Gist extends UuidModel {

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Gist\User');
    }

}
