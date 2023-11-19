<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class admin extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory , Notifiable;

    protected $table = 'admins';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name' , 'email', 'password'
    ];

    protected $hidden =[
        'created_at',
        'updated_at',
    ];
}
