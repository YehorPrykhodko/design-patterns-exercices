<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use App\User;
use App\MusicBand;

require_once __DIR__ . '/../app/User.php';
require_once __DIR__ . '/../app/MusicBand.php';

class UserMusicBandTest extends TestCase
{
    public function testBasicLaptop()
    {
        $albert = new User('Albert Mudhat');
        $michelle = new User('Michelle Ectron');
        $yves = new User('Yves Haigé');

        $band = new MusicBand('Daft PHPunk');

        $band->attach($albert);
        $band->attach($michelle);
        $band->attach($yves);

        $band->detach($yves);

        $band->addDate('19/11/2027');

        $this->assertTrue($albert->getNotifications() !== []);
        $this->assertTrue($michelle->getNotifications() !== []);
        $this->assertTrue($yves->getNotifications() === []);
    }

    public function testUserIsNotifiedWhenBandAddsDate()
    {
        $user = new User('Alice');
        $band = new MusicBand('Imagine Dragons');

        $user->follow($band);
        $band->addDate('2025-06-15');

        $notifications = $user->getNotifications();

        $this->assertCount(1, $notifications);
        $this->assertStringContainsString('Imagine Dragons', $notifications[0]);
    }
}
