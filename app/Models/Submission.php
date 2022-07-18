<?php

namespace App\Models;

use Carbon\Carbon;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submission extends Model
{
    use HasFactory, Loggable;

    protected $fillable = [
        'request_code',
        'requester',
        'division_id',
        'group_id',
        'user_id',
        'unit_id',
        'tag_code',
        'name_of_parameter',
        'other_parameter',
        'start',
        'finish',
        'duration_id',
        'reason',
        'impact',
        'attachment',
        'workflow_status_id',
        'status_type_id',
    ];

    protected $hidden = [
        'user_id',
        'priority_id',
        'unit_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'start',
        'finish',
    ];

    protected $appends = [
        'user',
        'priority',
        'unit',
        'created',
        'updated',
        'startDate',
        'finishDate',
        'user_notification',
    ];

    protected $casts = [
        'start' => 'datetime',
        'finish' => 'datetime',
    ];

    public function getUserAttribute()
    {
        return User::find($this->user_id)->only(['id', 'name', 'email', 'detail']);
    }

    public function getPriorityAttribute()
    {
        return Priority::find($this->priority_id);
    }

    public function getUnitAttribute()
    {
        return Unit::find($this->unit_id);
    }

    public function getCreatedAttribute()
    {
        return [
            'timestamp' => $this->created_at->timestamp,
            'readable' => $this->created_at->diffForHumans(),
            'iso' => $this->created_at->isoFormat('dddd, D MMMM Y'),
        ];
    }

    public function getUpdatedAttribute()
    {
        return [
            'timestamp' => $this->updated_at->timestamp,
            'readable' => $this->updated_at->diffForHumans(),
            'iso' => $this->updated_at->isoFormat('dddd, D MMMM Y'),
        ];
    }

    public function getStartDateAttribute()
    {
        return [
            'timestamp' => Carbon::parse($this->start)->timestamp,
            'readable' => Carbon::parse($this->start)->diffForHumans(),
            'iso' => Carbon::parse($this->start)->isoFormat('dddd, D MMMM Y'),
        ];
    }

    public function getFinishDateAttribute()
    {
        return [
            'timestamp' => Carbon::parse($this->finish)->timestamp,
            'readable' => Carbon::parse($this->finish)->diffForHumans(),
            'iso' => Carbon::parse($this->finish)->isoFormat('dddd, D MMMM Y'),
        ];
    }

    /**
     * The tags that belong to the Submission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(TagCode::class, 'submission_tag_code', 'submission_id', 'tag_code_id');
    }

    public function timelines()
    {
        return $this->hasMany(SubmissionTimeline::class, 'submission_id', 'id');
    }

    public function status()
    {
        return $this->hasOne(WorkflowStatus::class, 'id', 'workflow_status_id');
    }

    public function type()
    {
        return $this->hasOne(StatusType::class, 'id', 'status_type_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function account()
    {
        return $this->hasOne(User::class,  'id', 'user_id');
    }

    public function notification()
    {
        return $this->hasMany(SubmissionUserNotification::class, 'submission_id', 'id');
    }

    protected function getUserNotificationAttribute()
    {
        return $this->notification()->orderBy('id', 'desc')->first();
    }

    public function reminders()
    {
        return $this->hasMany(Reminder::class, 'submission_id', 'id');
    }
}
