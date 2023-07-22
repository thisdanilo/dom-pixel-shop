<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'description',
        'stock',
    ];

    protected $casts = ['price' => 'float'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /** Formata o atributo */
    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->attributes['price'], 2, ',', '.');
    }

    /** Formata o atributo */
    public function setPriceAttribute($value): void
    {
        $formatted_value = str_replace(',', '.', str_replace('.', '', $value));

        $this->attributes['price'] = $formatted_value;
    }
}
