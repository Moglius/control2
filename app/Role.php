<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'role';

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

    /**
     * The attributes excluded from the model's JSON form.
    */
     public function user()
    {
        return $this->hasMany('App\User');
    }
}
