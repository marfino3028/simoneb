<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Semester as Authenticatable;
use \App\Beasiswa;
use \App\Forum;
use \App\Karya;
use \App\Mentoring;
use \App\Mhs;
use \App\Org_mhs;
use \App\Prestasi;
use \App\Sosial;
use \App\Tahsin;
class Semester extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primarykey = 'id';
    protected $table = 'semester';
    protected $fillable = [
        'tahun', 'ipk', 'ips'
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
        'ipk' => 'integer',
        'ips' => 'integer',
        'tahun' => 'string'
    ];

    public function karya(){
        return $this->belongsTo(\App\Karya::class);
    }
    public function mentoring(){
        return $this->belongsTo(\App\Mentoring::class);
    }
    public function forum(){
        return $this->belongsTo(\App\Forum::class);
    }
    public function menu(){
        return $this->belongsTo(\App\Menu::class);
    }
    public function tahsin(){
        return $this->belongsTo(\App\Tahsin::class);
    }
    public function mhs(){
        return $this->belongsTo(\App\Mhs::class);
    }
    public function sosial(){
        return $this->belongsTo(\App\Sosial::class);
    }
    public function org_mhs(){
        return $this->belongsTo(\App\Org_mhs::class);
    }
    public function beasiswa(){
        return $this->belongsTo(\App\Beasiswa::class);
    }

}
