<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Tahsin as Authenticatable;
use \App\Semester;
class Tahsin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primarykey = 'id';
    protected $table = 'tahsin';
    protected $fillable = [
        'level', 'no_sk', 'nilai','semester_id','foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'level' => 'string',
        'no_sk' => 'string',
        'foto' => 'string',
        'semester_id' => 'integer',
    ];

    public function semester(){
        return $this->hasMany(\App\Semester::class, 'semester_id');
    }
}

