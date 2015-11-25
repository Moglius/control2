<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'reply';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['comment', 'id_user', 'id_ticket'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
