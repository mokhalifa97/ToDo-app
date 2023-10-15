<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $enumStatus = ['complete', 'not complete'];

    protected $fillable=[
        'user_id','task', 'status'
    ];
}
