<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Org_mhs as Authenticatable;
use \App\Semester;
class Org_mhs extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primarykey = 'id';
    protected $table = 'org_mhs';
    protected $fillable = [
        'jabatan', 'foto', 'nama','semester_id','masa_jabatan'
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
        'jabatan' => 'string',
        'masa_jabatan' => 'string',
        'foto' => 'string',
        'nama' => 'string',
        'semester_id' => 'integer'
    ];

    public function semester(){
        return $this->hasMany(\App\Semester::class, 'semester_id');
    }
}
