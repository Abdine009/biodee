<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Category extends Model
{
    use HasFactory,HasUuid;


    protected $fillable = [
        'title',
        
    ];

    protected $primaryKey='uuid';
    protected $keyType='string';
    public $incrementing = false;


    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_title');
    }
}
