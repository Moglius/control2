<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ticket';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'comment', 'id_priority', 'id_status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];

    /**
     * Relacion one-to-many: el ticket tiene 1 status
     */
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    /**
     * Relacion one-to-many: el ticket tiene 1 prioridad
     */
    public function priority()
    {
        return $this->belongsTo('App\Priority');
    }

    public function reply()
    {
        return $this->hasMany('App\Reply');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
