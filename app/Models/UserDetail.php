<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'user_id',
        'division_id',
        'group_id',
        'nip',
        'phone',
    ];

    protected $hidden = [
        // 'user_id',
        // 'division_id',
        // 'group_id',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'division',
        'group',
    ];

    protected $casts = [
        // 'nip' => 'encrypted',
        // 'phone' => 'encrypted',
    ];

    public function getGroupAttribute()
    {
        return Group::find($this->group_id);
    }
    public function getDivisionAttribute()
    {
        return Division::find($this->division_id);
    }
}
