<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blip extends Model
{

    protected $table = 'blips';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'start',
        'end',
        'notes',
        'contact_1',
        'contact_2',
        'contact_3'
    ];

    public function contactsAssigned()
    {
        return $this->hasMany('App\Models\Contact', 'event_id', 'id');
    }


}
