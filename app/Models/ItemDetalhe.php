<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    use HasFactory;
    protected $fillable = [
        'produto_id',
        'comprimento',
        'largura',
        'altura',
        'unidade_id'
    ];
    protected $table = 'produto_detalhes';


    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'produto_id', 'id');
    }

}
