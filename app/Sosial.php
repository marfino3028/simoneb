<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Sosial as Authenticatable;
use \App\Semester;
class Sosial extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primarykey = 'id';
    protected $table = 'sosial';
    protected $fillable = [
        'tgl', 'foto', 'nama','semester_id','penyelenggara_sosial'
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
        'penyelenggara_sosial' => 'string',
        'semester_id' => 'integer'
    ];

    public function semester(){
        return $this->hasMany(\App\Semester::class, 'semester_id');
    }
}
