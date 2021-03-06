<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contacts';

    protected $fillable = [
        'id',
        'event_id',
        'firstName',
        'lastName',
        'email',
        'user_id',
        'trashed',
        'default'
    ];

    public function scopeActive($query)
    {
        return $query->where('trashed', 0);
    }

}
