<?php

namespace App\Entity;

use App\Entity\Traits\BaseTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CalculationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Calculation
{
    use BaseTrait;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $method;

    /**
     * @ORM\Column(type="integer")
     */
    private $firstInt;

    /**
     * @ORM\Column(type="integer")
     */
    private $secondInt;

    /**
     * @ORM\Column(type="float")
     */
    private $answer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMethod(): ?string
    {
        return $this->method;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;

        return $this;
    }

    public function getFirstInt(): ?int
    {
        return $this->firstInt;
    }

    public function setFirstInt(int $firstInt): self
    {
        $this->firstInt = $firstInt;

        return $this;
    }

    public function getSecondInt(): ?int
    {
        return $this->secondInt;
    }

    public function setSecondInt(int $secondInt): self
    {
        $this->secondInt = $secondInt;

        return $this;
    }

    public function getAnswer(): ?float
    {
        return $this->secondInt;
    }

    public function setAnswer(float $answer): self
    {
        $this->answer = $answer;

        return $this;
    }
}
