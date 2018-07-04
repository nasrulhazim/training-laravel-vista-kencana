<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = ['id'];

	/**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getOwnerNameAttribute($value)
    {
        return optional($this->user)->name;
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
