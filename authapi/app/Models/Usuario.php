<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'senha',
        'nivel',
    ];

    protected $hidden = [
        'senha',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verificado',
    ];

    protected function casts(): array
    {
        return [
            'email_verificado' => 'datetime',
            'senha' => 'hashed',
        ];
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
