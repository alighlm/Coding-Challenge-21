<?php

namespace App\Entity\CdrRecord;

use App\Repository\CalculatedRateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CalculatedRateRepository::class)]
class CalculatedRate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float')]
    private $overall;

    #[ORM\Column(type: 'float')]
    private $energy;

    #[ORM\Column(type: 'float')]
    private $time;

    #[ORM\Column(type: 'float')]
    private $transaction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOverall(): ?float
    {
        return $this->overall;
    }

    public function setOverall(float $overall): self
    {
        $this->overall = $overall;

        return $this;
    }

    public function getEnergy(): ?float
    {
        return $this->energy;
    }

    public function setEnergy(float $energy): self
    {
        $this->energy = $energy;

        return $this;
    }

    public function getTime(): ?float
    {
        return $this->time;
    }

    public function setTime(float $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getTransaction(): ?float
    {
        return $this->transaction;
    }

    public function setTransaction(float $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }
}
