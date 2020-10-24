<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Forum as Authenticatable;
use \App\Semester;
class Forum extends Authenticatable
{
    use Notifiable;
    protected $primarykey = 'id';
    protected $table = 'forum';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tgl', 'foto', 'nama','semester_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tgl' => 'date',
        'foto' => 'string',
        'nama' => 'string',
        'semester_id' => 'integer'
    ];

    public function semester(){
        return $this->hasMany(\App\Semester::class, 'semester_id');
    }
}
