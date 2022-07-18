<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;

    protected $table = 'reminders';

    protected $fillable = [
        'user_id',
        'submission_id',
        'workflow_status_id',
        'has_read',
        'note',
    ];

    // protected $hidden = [
    //     'submission_id',
    //     'user_id',
    //     'has_read',
    //     'created_at',
    //     'updated_at',
    // ];

    protected $appends = [
        'readStatus',
        'wasRead',
        'createdDate',
        'updatedDate',
    ];

    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_id', 'id')->with(['status']);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function workflowStatus()
    {
        return $this->hasOne(WorkflowStatus::class, 'id', 'workflow_status_id');
    }

    public function getReadStatusAttribute()
    {
        return $this->has_read ? trans('lang.hasRead') : trans('lang.notRead');
    }

    public function getWasReadAttribute()
    {
        return $this->has_read ? 1 : 0;
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
