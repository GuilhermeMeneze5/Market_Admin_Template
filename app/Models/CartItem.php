<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'validade_cart',
        'product_id',
        'product_name',
        'preco_unitario',
        'vl_desconto_unitario',
        'per_desconto_unitario',
        'customizacao1',
        'acressimo1',
        'customizacao2',
        'acressimo2',
        'customizacao3',
        'acressimo3',
        'quantidade',
        'valor_total',
        'desconto_cupom',
        'cupom_id',
        'codigo_cupom',
        'valor_desc_cupom',
        'validade_cupom',
        'frete',
        'peso',
        'status',
        'imagem',
        'moeda',
        'subtotal',
        'user_id',
        'product_id',
    ];

    protected $dates = ['deleted_at']; // Se você estiver usando SoftDeletes

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
