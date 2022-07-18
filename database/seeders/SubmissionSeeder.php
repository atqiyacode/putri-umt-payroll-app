<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Duration;
use App\Models\Group;
use App\Models\Submission;
use App\Models\SubmissionTimeline;
use App\Models\SubmissionUserNotification;
use App\Models\TagCode;
use App\Models\Unit;
use App\Models\User;
use App\Models\WorkflowStatus;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $process = WorkflowStatus::where('slug', 'waiting-approval-sps')->first();
        for ($i = 1; $i < 5; $i++) {

            $userId = collect(User::role('technician')->get())->random()->id;

            $data = Submission::create([
                'request_code' => Str::uuid(),
                'requester' => $faker->name(),
                'division_id' => collect(Division::all())->random()->id,
                'group_id' => collect(Group::all())->random()->id,
                'unit_id' => collect(Unit::all())->random()->id,
                'name_of_parameter' => $faker->text($maxNbChars = 50),
                'other_parameter' => $faker->text($maxNbChars = 50),
                'start' => now(),
                'finish' => now()->addDays($faker->numberBetween($min = 2, $max = 7)),
                'duration_id' => collect(Duration::all())->random()->id,
                'reason' => $faker->realText($maxNbChars = 100, $indexSize = 2),
                'impact' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'user_id' => $userId,
                'workflow_status_id' => $process->id,
                'status_type_id' => 1,
            ]);

            $tagCodes = $faker->words($nb = 3, $asText = false);
            foreach ($tagCodes as $tagCode) {
                $tag = TagCode::updateOrCreate([
                    'name' => $tagCode,
                ]);
                $data->tags()->attach($tag);
            }

            $list_approvals = User::role('supervisor')->get();
            $approvals = collect($list_approvals)->random($faker->numberBetween($min = 1, $max = $list_approvals->count()));
            foreach ($approvals as $approval) {
                SubmissionUserNotification::create([
                    'submission_id' => $data->id,
                    'user_id' => $approval->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }

            SubmissionTimeline::insert([
                [
                    'user_id' => $userId,
                    'submission_id' => $data->id,
                    'status_id' => 1,
                    'note' => $faker->realText($maxNbChars = 100, $indexSize = 2),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => $userId,
                    'updated_by' => $userId,
                ], [
                    'user_id' => $userId,
                    'submission_id' => $data->id,
                    'status_id' => $process->id,
                    'note' => $faker->realText($maxNbChars = 100, $indexSize = 2),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'created_by' => $userId,
                    'updated_by' => $userId,
                ]
            ]);
        }
    }
}
