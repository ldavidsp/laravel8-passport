<?php

namespace App\Providers;

use App\Models\Projects;
use App\Observers\ProjectsObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    Projects::observe(ProjectsObserver::class);
  }

}
