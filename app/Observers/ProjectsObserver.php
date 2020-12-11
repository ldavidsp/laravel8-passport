<?php

namespace App\Observers;

use App\Events\ProjectsEvent;
use App\Models\Projects;

class ProjectsObserver {

  /**
   * Handle the Projects "created" event.
   *
   * @param \App\Models\Projects $project
   *
   * @return void
   */
  public function created(Projects $project) {
    event(new ProjectsEvent($project, 'created'));
  }

  /**
   * Handle the Projects "updated" event.
   *
   * @param \App\Models\Projects $project
   *
   * @return void
   */
  public function updated(Projects $project) {
    event(new ProjectsEvent($project, 'updated'));
  }

  /**
   * Handle the Projects "deleted" event.
   *
   * @param \App\Models\Projects $project
   *
   * @return void
   */
  public function deleted(Projects $project) {
    event(new ProjectsEvent($project, 'deleted'));
  }

  /**
   * Handle the Projects "restored" event.
   *
   * @param \App\Models\Projects $project
   *
   * @return void
   */
  public function restored(Projects $project) {
    event(new ProjectsEvent($project, 'restored'));
  }

  /**
   * Handle the Projects "force deleted" event.
   *
   * @param \App\Models\Projects $project
   *
   * @return void
   */
  public function forceDeleted(Projects $project) {
    event(new ProjectsEvent($project, 'force.deleted'));
  }

}
