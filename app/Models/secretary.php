<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secretary extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    protected $table = 'secretaries';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'birth',
        'photo',
        'gender',
        'phone_number',
    ];

    protected $hidden =[
        'created_at',
        'updated_at',
    ];

    protected $appends = ['age'];

    public function selection($query){
        return $query->where('id' , $query->id)
        ->select('id', "fname" , "lname" ,'phone_number' ,'birth', 'photo' , 'gender' , 'email' , 'password')
        ->first();
    }

//    public function age()
//    {
//        return Carbon::parse($this->attributes['birth'])->age;
//    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birth']);
    }

}
