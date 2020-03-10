<?php

declare(strict_types=1);

namespace Tests;

use App\Domain\Score;
use PHPUnit\Framework\TestCase;

class ScoreTest extends TestCase
{
    public function testSuccessCreateScore()
    {
        $score = new Score(1,2);

        $this->assertEquals($score->getScoreA(), 1);
        $this->assertEquals($score->getScoreB(), 2);
    }

    public function testCheckWinnerWhenWinnerA()
    {
        $score = new Score(2, 1);

        $this->assertTrue($score->isWinA());
        $this->assertNotTrue($score->isWinB());
        $this->assertNotTrue($score->isDraw());
    }

    public function testCheckWinnerWhenWinnerB()
    {
        $score = new Score(1, 4);

        $this->assertTrue($score->isWinB());
        $this->assertNotTrue($score->isWinA());
        $this->assertNotTrue($score->isDraw());
    }

    public function testCheckWinnerWhenDraw()
    {
        $score = new Score(1, 4);

        $this->assertTrue($score->isWinB());
        $this->assertNotTrue($score->isWinA());
        $this->assertNotTrue($score->isDraw());
    }
}