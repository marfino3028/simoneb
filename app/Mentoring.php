<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Mentoring as Authenticatable;
use  \App\Semester;

class Mentoring extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primarykey = 'id';
    protected $table = 'mentoring';
    protected $fillable = [
        'jml_pertemuan', 'foto', 'nama','semester_id','jml_kehadiran','persen'
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
        'persen' => 'string',
        'jml_kehadiran' => 'string',
        'jml_pertemuan' => 'string',
        'foto' => 'string',
        'nama' => 'string',
        'semester_id' => 'integer'
    ];

    public function semester(){
        return $this->hasMany(\App\Semester::class, 'semester_id');
    }
}