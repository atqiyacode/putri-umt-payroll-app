<?php

namespace Database\Seeders;

use App\Models\WorkflowStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WorkflowStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('processing-force'),
            'name' => Str::replace('-', ' ', 'processing-force'),
        ]);

        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('waiting-approval-sps'),
            'name' => Str::replace('-', ' ', 'waiting-approval-sps'),
        ]);
        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('sps-approved'),
            'name' => Str::replace('-', ' ', 'sps-approved'),
        ]);
        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('sps-rejected'),
            'name' => Str::replace('-', ' ', 'sps-rejected'),
        ]);

        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('waiting-approval-engineer'),
            'name' => Str::replace('-', ' ', 'waiting-approval-engineer'),
        ]);
        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('engineer-approved'),
            'name' => Str::replace('-', ' ', 'engineer-approved'),
        ]);
        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('engineer-rejected'),
            'name' => Str::replace('-', ' ', 'engineer-rejected'),
        ]);

        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('waiting-execute-technician'),
            'name' => Str::replace('-', ' ', 'waiting-execute-technician'),
        ]);
        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('force-execution'),
            'name' => Str::replace('-', ' ', 'force-execution'),
        ]);
        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('release-force-execution'),
            'name' => Str::replace('-', ' ', 'release-force-execution'),
        ]);

        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('waiting-operator-confirmation'),
            'name' => Str::replace('-', ' ', 'waiting-operator-confirmation'),
        ]);
        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('operator-confirmation'),
            'name' => Str::replace('-', ' ', 'operator-confirmation'),
        ]);

        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('finish-force-request'),
            'name' => Str::replace('-', ' ', 'finish-force-request'),
        ]);
        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('finish-release-request'),
            'name' => Str::replace('-', ' ', 'finish-release-request'),
        ]);
        WorkflowStatus::updateOrCreate([
            'slug' => Str::slug('processing-release'),
            'name' => Str::replace('-', ' ', 'processing-release'),
        ]);
    }
}
