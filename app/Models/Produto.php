<?php

namespace App\Models;


use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable=['nome','valor'];

    /*
    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
    */


    public function categorias()
    {
        return $this->belongsToMany(Categoria::class,'categorias_produtos','produto_id','categoria_id');
    }
}
