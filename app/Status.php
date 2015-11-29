<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];

     public function ticket()
    {
         return $this->hasMany('App\Ticket', 'id_status', 'id');
    }
}
