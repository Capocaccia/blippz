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
        'contacts_contacted',
        'end_time'
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
        return $query->where('trashed', 0)
            ->where('end_time', '>=', Carbon::today('America/Chicago')
                ->toDateString());
    }

    public function scopeReadyForCreatorContact($query)
    {
        return $query->where('trashed', 0)
            ->where('creator_contacted', 0)
            ->where('end_time', '<=', Carbon::now('America/Chicago'));
    }

    public function scopeReadyForContactsEmail($query)
    {
        return $query->where('trashed', 0)
            ->where('creator_contacted', 1)
            ->where('contacts_contacted', 0)
            ->where('marked_safe', 0)
            ->where('end_time', '<=', Carbon::now('America/Chicago')
                //this puts the carbon time 3 hours behind so it waits until
                //three hours past the end_time to send the email to the contacts
                ->subHours(3));
    }


}
