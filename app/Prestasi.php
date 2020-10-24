<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Prestasi as Authenticatable;
use \App\Semester;
class Prestasi extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primarykey = 'id';
    protected $table = 'prestasi';
    protected $fillable = [
        'peringkat', 'foto', 'nama','semester_id','level','penyelenggara_prestasi'
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
        'peringkat' => 'string',
        'level' => 'string',
        'penyelenggara_prestasi' => 'string',
        'foto' => 'string',
        'nama' => 'string',
        'semester_id' => 'integer'
    ];
    public function semester(){
        return $this->hasMany(\App\Semester::class, 'semester_id');
    }

}
