<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Prestasi as Authenticatable;
use \App\Semester;
class Beasiswa extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primarykey = 'id_beasiswa';
    protected $table = 'beasiswa';
    protected $fillable = [
        'deskripsi', 'foto', 'nama','semester_id'
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
        'deskripsi' => 'string',
        'foto' => 'string',
        'nama' => 'string',
        'semester_id' => 'integer'
    ];
    public function semester(){
        return $this->hasMany(\App\Semester::class, 'semester_id');
    }

}
