<?php

namespace App\Events;

use App\Models\Projects;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectsEvent implements ShouldBroadcast {

  use Dispatchable, InteractsWithSockets, SerializesModels;

  /**
   * @var \App\Models\Projects
   */
  public $project;

  /**
   * @var $eventType
   */
  public $eventType;

  /**
   * Create a new event instance.
   *
   * @param \App\Models\Projects $project
   * @param $eventType
   */
  public function __construct(Projects $project, $eventType) {
    $this->project = $project;
    $this->eventType = $eventType;
  }

  /**
   * Get the channels the event should broadcast on.
   *
   * @return string
   */
  public function broadcastOn(): string {
    // new PrivateChannel('projects.'. $this->project->id);
    return 'projects.' . $this->eventType;
  }

  /**
   * The event's broadcast name.
   *
   * @return string
   */
  public function broadcastAs(): string {
    return $this->eventType;
  }

}
