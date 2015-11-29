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
        return $this->belongsTo('App\Status', 'id_status');
    }

    /**
     * Relacion one-to-many: el ticket tiene 1 prioridad
     */
    public function priority()
    {
        return $this->belongsTo('App\Priority', 'id_priority');
    }

    public function reply()
    {
        return $this->hasMany('App\Reply', 'id_ticket', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_ticket', 'id_ticket', 'id_tag');
    }
}
