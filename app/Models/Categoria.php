<?php

namespace App\Models;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    use HasFactory;

    protected $fillable= ['nome'];

    /*
    public function produto()
    {
        return $this->hasMany(Produto::class,'categoria_id');
    }
    */

    public function produtos()
    {
        return $this->belongsToMany(Produto::class,'categorias_produtos','categoria_id','produto_id');
    }
}
