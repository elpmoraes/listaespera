<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ListaJogo;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
class user_list extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_lists','id','id_users');
    }

        use SoftDeletes;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ip',
        'datainscricao',
        'fardamento',
        'classe'

    ];



}
