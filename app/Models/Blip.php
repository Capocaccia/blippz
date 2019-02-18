<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
        'contact_3',
        'trashed',
        'creator_contacted',
        'contacts_contacted'
    ];

    public function firstContact()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'contact_1');
    }

    public function secondContact()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'contact_2');
    }

    public function thirdContact()
    {
        return $this->hasOne('App\Models\Contact', 'id', 'contact_3');
    }

    public function scopeActive($query)
    {
        return $query->where('trashed', 0)->where('end', '>=', Carbon::now());
    }

    public function scopeReadyForCreatorContact($query)
    {
        return $query->where('trashed', 0)->where('end', '<=', Carbon::now())->where('creator_contacted', 0);
    }

    public function scopeReadyForContactsEmail($query)
    {
        return $query->where('trashed', 0)->where('end', '<=', Carbon::now())->where('creator_contacted', 1)->where('contacts_contacted', 0)->where('marked_safe', 0);
    }


}
