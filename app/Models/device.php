<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    use HasFactory;

    protected $table = 'devices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name' ,
        'image' ,
        'description' ,
        'price'
    ];

    protected $hidden =[
        'created_at',
        'updated_at',
    ];
}
