<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'code',
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
