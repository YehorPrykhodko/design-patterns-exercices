<?php
namespace App;

use SplSubject;
use SplObserver;
use SplObjectStorage;
class MusicBand implements SplSubject {
    private string $name;
    private array $dates = [];
    private SplObjectStorage $observers;

    public function __construct(string $name) {
        $this->name = $name;
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void {
        $this->observers->detach($observer);
    }

    public function notify(): void {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function addDate(string $date): void {
        $this->dates[] = $date;
        $this->notify(); // уведомляем всех подписанных пользователей
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDates(): array {
        return $this->dates;
    }
}
