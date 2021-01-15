<?php

namespace App\Services;

use App\Entity\Calculation;
use Doctrine\ORM\EntityManagerInterface;

class CalculationManager
{
    /** @var EntityManagerInterface $entityManager */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getCalculations(?int $page, int $perPage): array
    {
        return $this->entityManager->getRepository(Calculation::class)->getCalculations($page, $perPage);
    }

    public function add(int $firstInt, int $secondInt): array
    {
        $answer = $firstInt + $secondInt;

        $this->saveCalculation('add', $firstInt, $secondInt, $answer);

        return ['result' => $answer];
    }

    public function subtract(int $firstInt, int $secondInt): array
    {
        $answer = $firstInt - $secondInt;

        $this->saveCalculation('subtract', $firstInt, $secondInt, $answer);

        return ['result' => $answer];
    }

    public function multiply(int $firstInt, int $secondInt): array
    {
        $answer = $firstInt * $secondInt;

        $this->saveCalculation('multiply', $firstInt, $secondInt, $answer);

        return ['result' => $answer];
    }

    public function divide(int $firstInt, int $secondInt): array
    {
        $answer = $firstInt / $secondInt;

        $this->saveCalculation('divide', $firstInt, $secondInt, $answer);

        return ['result' => $answer];
    }

    private function saveCalculation(string $method, int $firstInt, int $secondInt, int $answer): Calculation
    {
        $calculation = new Calculation();
        $calculation
            ->setMethod($method)
            ->setFirstInt($firstInt)
            ->setSecondInt($secondInt)
            ->setAnswer($answer);

        $this->entityManager->persist($calculation);
        $this->entityManager->flush();

        return $calculation;
    }
}