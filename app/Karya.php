<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Karya as Authenticatable;
use  \App\Semester;


class Karya extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primarykey = 'id';
    protected $table = 'karya';
    protected $fillable = [
        'tgl', 'judul', 'nama','semester_id','media','link'
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
        'judul' => 'string',
        'media' => 'string',
        'link' => 'string',
        'semester_id' => 'integer'
    ];

    public function semester(){
        return $this->hasMany(\App\Semester::class, 'semester_id');
    }
    


}
