<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Mhs as Authenticatable;

class Mhs extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primarykey = 'id_mhs';
    protected $table = 'mhs';
    protected $fillable = [
        'nim', 'foto', 'nama','semester_id','angkatan','alamat','hp','email','beasiswa','password','nilai_id'
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
        'id_mhs' => 'integer',
        'nim' => 'string',
        'angkatan' => 'string',
        'alamat' => 'string',
        'hp' => 'string',
        'email' => 'string',
        'password'=>'string',
        'beasiswa' => 'string',
        'foto' => 'string',
        'nama' => 'string',
        'semester_id' => 'integer',
        'nilai_id'=>'integrer',
    ];
    protected $hidden = [
        'password'
    ];

    public function semester(){
        return $this->hasMany(\App\Semester::class, 'semester_id');
    }
    public function nilai(){
        return $this->hasMany(\App\Nilai::class, 'nilai_id');
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}