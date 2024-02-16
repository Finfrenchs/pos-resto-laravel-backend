<?php

namespace App\Models;

use App\Events\CategoryDeleting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    protected $dispatchesEvent = [
        'deleting' => CategoryDeleting::class,
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
