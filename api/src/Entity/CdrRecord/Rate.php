<?php

namespace App\Entity\CdrRecord;

use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\RateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RateRepository::class)]
class Rate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * rate the charging process based on the energy consumed (€ per kWh)
     */
    #[ApiProperty(
        attributes: [
            "openapi_context" => [
                "type" => "float",
                "example" => 0.3,
            ],
        ],
    )]
    #[ORM\Column(type: 'float')]
    private $energy;

    /**
     * rate the charging process based on its duration (€ per hour)
     */
    #[ApiProperty(
        attributes: [
            "openapi_context" => [
                "type" => "float",
                "example" => 2,
            ],
        ],
    )]
    #[ORM\Column(type: 'float')]
    private $time;

    /**
     * transaction - fees per charging process (€)
     */
    #[ApiProperty(
        attributes: [
            "openapi_context" => [
                "type" => "float",
                "example" => 1,
            ],
        ],
    )]
    #[ORM\Column(type: 'float')]
    private $transaction;

    public function getId(): ?int
    {
        return $this->id;
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
