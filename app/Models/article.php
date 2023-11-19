<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title' ,
        'author_name',
        'author_photo' ,
        'definition' ,
        'symptoms',
        'risk_factor',
        'treatment',
        'when',
        'misconceptions' ,
        'image' ,
        'category_id',
        'created_at',
    ];
    protected $hidden =[
        'updated_at',
    ];
    public function category(){
        return $this->belongsTo(category::class , 'category_id');
    }
}
