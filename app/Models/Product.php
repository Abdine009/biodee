<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasUuid;




class Product extends Model
{
    use HasFactory,HasUuid;

    protected $fillable = [
        'title',
        'category_title',
        'user_uuid',
        'price',
        'photo',
        'detail',
           
        
    ];

    protected $primaryKey='uuid';
    protected $keyType='string';
    public $incrementing = false;

    

}
