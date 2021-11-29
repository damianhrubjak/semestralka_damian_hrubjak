<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FileExtension extends Model
{
    use HasFactory;

    protected $fillable = ['extension'];

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
