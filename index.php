<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Manager;
use App\Domain\Score;
use App\Domain\Prize;

$manager = new Manager();

$predictScore = new Score(1,2);
$winScore = new Score(2, 2);

$result = $manager->getResult($predictScore, $winScore);

$resultNames = [
    Prize::BIG => 'Big Prize',
    Prize::SMALL => 'Small Prize',
    Prize::NONE => 'None Prize',
];
$resultName = $resultNames[$result];

echo 'Predict score: ' . $predictScore->getScoreA() . ':' . $predictScore->getScoreB() . PHP_EOL;
echo 'Win score: ' . $winScore->getScoreA() . ':' . $winScore->getScoreB() . PHP_EOL;
echo 'Result: ' . $result . ' (' . $resultName . ')' . PHP_EOL;