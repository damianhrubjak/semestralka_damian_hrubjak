<?php

namespace App\Models;

use App\Models\Product;
use App\Models\FileExtension;
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

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['fileExtension'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function fileExtension()
    {
        return $this->belongsTo(FileExtension::class);
    }
}
