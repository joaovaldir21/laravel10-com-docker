<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected  $fillable = [
        'nome',
        'uf',
    ];

    public function getEstadosPesquisarIndex(string $search = '')
    {
       $estado = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
                $query->orWhere('uf', 'LIKE', "%{$search}%");
            }
       })->get(); 

       return $estado;
    }


}
