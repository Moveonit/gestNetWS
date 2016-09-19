<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utente extends Authenticatable
{
    use Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Utenti';
    public $timestamps = false;
    protected $primaryKey = 'IDUtente';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "IDUtente", "Nome_utente", "Funzioni_utente", "Nome", "Email"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    */
    protected $hidden = [
        "password","Password_utente"
    ];

    public function pratiche()
    {
        return $this->hasMany('App\Debitore', "IDFunzionarioCorrente");
    }
}
