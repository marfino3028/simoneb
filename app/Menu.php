<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Menu as Authenticatable;

class Menu extends Authenticatable
{
    protected $primary = 'id_menu';
    protected $table = 'menu';
    protected $fillable = [
        'id_menu', 'org_mhs_id','prestasi_id','sosial_id','tahsin_id','forum_id','karya_id','mentoring_id','mhs_id_mhs'
    ];
    protected $cast = [
        'id_menu'     =>'integrer',
        `org_mhs_id`  =>'integrer',
        `prestasi_id` =>'integrer',
        `sosial_id`   =>'integrer',
        `tahsin_id`   =>'integrer',
        `forum_id`    =>'integrer',
        `karya_id`    =>'integrer',
        `mentoring_id`=>'integrer',
        `mhs_id_mhs`  =>'integrer'
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
