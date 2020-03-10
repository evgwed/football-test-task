<?php

declare(strict_types=1);

namespace Tests;

use App\Domain\Prize;
use App\Manager;
use App\Domain\Score;
use PHPUnit\Framework\TestCase;

class ManagerTest extends TestCase
{
    public function testCheckBigPrizeEqualsPredictAndFactScore()
    {
        $manager = new Manager();
        $score = new Score(1,2);
        $result = $manager->getResult(
            $score,
            $score
        );

        $this->assertEquals($result, Prize::BIG);
    }


    public function testSuccessPredictWinnerAWhenWinnerA()
    {
        $manager = new Manager();
        $predictScore = new Score(3,1);
        $resultScore = new Score(5,2);
        $result = $manager->getResult(
            $predictScore,
            $resultScore
        );

        $this->assertEquals($result, Prize::SMALL);
    }

    public function testSuccessPredictWinnerBWhenWinnerB()
    {
        $manager = new Manager();
        $predictScore = new Score(1,2);
        $resultScore = new Score(2,3);
        $result = $manager->getResult(
            $predictScore,
            $resultScore
        );

        $this->assertEquals($result, Prize::SMALL);
    }

    public function testSuccessPredictDrawWhenDraw()
    {
        $manager = new Manager();
        $predictScore = new Score(1,1);
        $resultScore = new Score(2,2);
        $result = $manager->getResult(
            $predictScore,
            $resultScore
        );

        $this->assertEquals($result, Prize::SMALL);
    }

    public function testBadPredictWinnerAWhenWinnerB()
    {
        $manager = new Manager();
        $predictScore = new Score(4,1);
        $resultScore = new Score(2,2);
        $result = $manager->getResult(
            $predictScore,
            $resultScore
        );

        $this->assertEquals($result, Prize::NONE);
    }

    public function testBadPredictWinnerBWhenWinnerA()
    {
        $manager = new Manager();
        $predictScore = new Score(2,10);
        $resultScore = new Score(5,2);
        $result = $manager->getResult(
            $predictScore,
            $resultScore
        );

        $this->assertEquals($result, Prize::NONE);
    }
    public function testBadPredictDrawWhenWinnerA()
    {
        $manager = new Manager();
        $predictScore = new Score(2,2);
        $resultScore = new Score(5,2);
        $result = $manager->getResult(
            $predictScore,
            $resultScore
        );

        $this->assertEquals($result, Prize::NONE);
    }
}