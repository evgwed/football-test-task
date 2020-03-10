<?php

declare(strict_types=1);

namespace App;

use App\Domain\Prize;
use App\Domain\Score;

class Manager
{
    public function getResult(Score $predictScore, Score $factScore): int
    {
        if (
            $predictScore->getScoreA() === $factScore->getScoreA() &&
            $predictScore->getScoreB() === $factScore->getScoreB()
        ) {
            return Prize::BIG;
        }

        if (
            $predictScore->isWinA() && $predictScore->isWinA() === $factScore->isWinA() ||
            $predictScore->isWinB() && $predictScore->isWinB() === $factScore->isWinB() ||
            $predictScore->isDraw() && $predictScore->isDraw() === $factScore->isDraw()
        ) {
            return Prize::SMALL;
        }

        return Prize::NONE;
    }

}