<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'catId',
        'subcatName',
        'slug',
        'des',
        'img',
        'status'

    ];

    public function cat()
    {
        return $this->belongsTo(Category::class, 'catId');
    }
}
