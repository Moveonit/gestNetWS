<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debitore extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Debitori';
    public $timestamps = false;
    protected $primaryKey = 'IDPratica';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nominativo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array

    protected $hidden = [
    ];*/
}
