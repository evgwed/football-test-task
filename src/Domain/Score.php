<?php

declare(strict_types=1);

namespace App\Domain;

class Score {
    private int $scoreA;
    private int $scoreB;

    public function __construct(int $scoreA, int $scoreB)
    {
        $this->scoreA = $scoreA;
        $this->scoreB = $scoreB;
    }

    public function getScoreA(): int
    {
        return $this->scoreA;
    }

    public function getScoreB(): int
    {
        return $this->scoreB;
    }

    public function isWinA(): bool
    {
        return $this->scoreA > $this->scoreB;
    }

    public function isWinB(): bool
    {
        return !$this->isWinA();
    }

    public function isDraw(): bool
    {
        return $this->scoreA === $this->scoreB;
    }
}