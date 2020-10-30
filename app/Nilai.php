<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Nilai as Authenticatable;

class Nilai extends Authenticatable
{
    protected $table = 'nilai';
    protected $fillabel = ['ipk','ips','tahun'];

    protected $cast =
    [
        'ipk'=>'integrer',
        'ips'=>'string',
        'tahun'=> 'string'
    ];
    public function semester()
    {
        return $this->belongsTo(\App\Semester::class, 'semester_id');
    }
}
