<?php

namespace App;

use SplObserver;
use SplSubject;
class User implements SplObserver {
    private string $name;
    private array $notifications = [];

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function follow(MusicBand $band): void {
        $band->attach($this);
    }

    public function update(SplSubject $subject): void {
        if ($subject instanceof MusicBand) {
            $this->notifications[] = "Notification: {$this->name}, le groupe {$subject->getName()} a ajouté une nouvelle date.";
        }
    }

    public function getNotifications(): array {
        return $this->notifications;
    }
}
