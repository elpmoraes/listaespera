<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class ListaJogo extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_lists','id_users','id_lista');
    }
    use HasFactory;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao',
        'datahora',
        'endereco',
        'cidade',
        'gmaps',
        'inscritos',
        'maxinscritos',
        'dataabertura',
        'listavisivel',
        'codlista',
        'ativo'
    ];
}
