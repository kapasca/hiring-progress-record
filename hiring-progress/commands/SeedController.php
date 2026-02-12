<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\Attachments;
use app\models\Candidates;
use app\models\Jobs;
use app\models\JobApplications;
use app\models\RecruitmentStageLogs;
use app\models\User;

class SeedController extends Controller
{
  public function actionIndex()
  {
    // Clear all seeded data before applying new seeding
        Attachments::deleteAll();
        Candidates::deleteAll();
        Jobs::deleteAll();
        JobApplications::deleteAll();
        RecruitmentStageLogs::deleteAll();
        
    $this->stdout("Seeding data...\n");

    $this->seedJobs();
    $this->seedCandidates();
    $this->seedApplications();
    $this->seedStageLogs();
    $this->seedUser();

    $this->stdout("Done.\n");
  }

  private function seedJobs()
  {
    for ($i = 1; $i <= 3; $i++) {
      $job = new Jobs();
      $job->job_code = 'JOB-00' . $i;
      $job->title = 'Position ' . $i;
      $job->division = 'Division ' . $i;
      $job->status = 1;
      $job->description = 'Sample job description ' . $i;
      $job->created_at = time();
      $job->save(false);
    }
  }

  private function seedCandidates()
  {
    for ($i = 1; $i <= 5; $i++) {
      $candidate = new Candidates();
      $candidate->full_name = 'Candidate ' . $i;
      $candidate->email = "candidate{$i}@mail.com";
      $candidate->phone = '0812345678' . $i;
      $candidate->source = 'manatal';
      $candidate->created_at = time();
      $candidate->save(false);
    }
  }

  private function seedApplications()
  {
    $jobs = Jobs::find()->all();
    $candidates = Candidates::find()->all();

    foreach ($candidates as $index => $candidate) {
      $application = new JobApplications();
      $application->job_id = $jobs[$index % count($jobs)]->id;
      $application->candidate_id = $candidate->id;
      $application->current_stage = 'cv_review';
      $application->applied_at = time();
      $application->created_at = time();
      $application->save(false);
    }
  }

  private function seedStageLogs()
  {
    $applications = JobApplications::find()->all();

    foreach ($applications as $application) {

      // CV Review
      $log1 = new RecruitmentStageLogs();
      $log1->job_application_id = $application->id;
      $log1->stage_code = 'cv_review';
      $log1->action_type = 'reviewed';
      $log1->status = 2;
      $log1->remarks = 'CV reviewed by HR';
      $log1->created_at = time();
      $log1->save(false);

      // Interview Scheduled
      $log2 = new RecruitmentStageLogs();
      $log2->job_application_id = $application->id;
      $log2->stage_code = 'interview';
      $log2->action_type = 'scheduled';
      $log2->status = 1;
      $log2->remarks = 'Interview scheduled';
      $log2->created_at = time();
      $log2->save(false);
    }
  }

  private function seedUser()
  {
    if (User::find()->where(['username' => 'admin'])->exists()) {
      return;
    }

    $user = new User();
    $user->username = 'admin';
    $user->setPassword('admin123');
    $user->generateAuthKey();
    $user->role = 1;
    $user->status = 10;
    $user->created_at = time();
    $user->updated_at = time();
    $user->save(false);
  }
}
