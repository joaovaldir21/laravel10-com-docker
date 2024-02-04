<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected  $fillable = [
        'nome',
        'estado_id',
        'codigo_tce',
    ];

    public function getCidadesPesquisarIndex(string $search = '')
    {
       $cidade = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");
                $query->orWhere('codigo_tce', 'LIKE', "%{$search}%");
            }
       })->get(); 

       return $cidade;
    }
 


}
