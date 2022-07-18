<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmissionUserNotification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'submission_id',
        'has_read',
        'note',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'submission_id',
        'user_id',
        'has_read',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'readStatus',
        'submission',
        'createdDate',
        'updatedDate',
    ];

    public function getSubmission()
    {
        return $this->hasOne(Submission::class, 'id', 'submission_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getSubmissionAttribute()
    {
        return Submission::find($this->submission_id)->only(['id', 'name_of_parameter']);
    }

    public function getReadStatusAttribute()
    {
        return $this->has_read ? trans('lang.hasRead') : trans('lang.notRead');
    }

    public function getCreatedDateAttribute()
    {
        return [
            'timestamp' => Carbon::parse($this->created_at)->timestamp,
            'readable' => Carbon::parse($this->created_at)->diffForHumans(),
            'iso' => Carbon::parse($this->created_at)->isoFormat('dddd, D MMMM Y'),
        ];
    }

    public function getUpdatedDateAttribute()
    {
        return [
            'timestamp' => Carbon::parse($this->updated_at)->timestamp,
            'readable' => Carbon::parse($this->updated_at)->diffForHumans(),
            'iso' => Carbon::parse($this->updated_at)->isoFormat('dddd, D MMMM Y'),
        ];
    }
}
