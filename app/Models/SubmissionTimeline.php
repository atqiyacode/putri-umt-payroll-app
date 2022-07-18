<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionTimeline extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'submission_id',
        'status_id',
        'note',
        'signature',
        'attachment',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the status associated with the SubmissionTimeline
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->hasOne(WorkflowStatus::class, 'id', 'status_id');
    }

    /**
     * Get the user associated with the SubmissionTimeline
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }
}
