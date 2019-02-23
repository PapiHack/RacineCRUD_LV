<?php

namespace RacineCRUD;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateur';

    protected $fillable = [
        'nom', 'prenom', 'tel', 'email', 'password',
    ];
}
