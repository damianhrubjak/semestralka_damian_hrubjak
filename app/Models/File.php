<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'product_id',
        'file_extension_id',
        'name',
        'file_name',
        'folder_name',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
