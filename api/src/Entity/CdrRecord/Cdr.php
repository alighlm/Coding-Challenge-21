<?php

namespace App\Entity\CdrRecord;

use ApiPlatform\Core\Annotation\ApiProperty;
use App\Repository\CdrRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CdrRepository::class)]
class Cdr
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @var int for starting value of meter
     */
    #[ApiProperty(
        attributes: [
            "openapi_context" => [
                "type" => "integer",
                "example" => 1204307,
            ],
        ],
    )]
    #[ORM\Column(type: 'integer')]
    private $meterStart;

    /**
     * @var DateTime for starting time of meter
     */
    #[ApiProperty(
        attributes: [
            "openapi_context" => [
                "type" => "Datetime",
                "example" => "2021-04-05T10:04:00Z",
            ],
        ],
    )]
    #[ORM\Column(type: 'datetime')]
    private $timestampStart;

    /**
     * @var int for stopping value of meter
     */
    #[ApiProperty(
        attributes: [
            "openapi_context" => [
                "type" => "integer",
                "example" => 1215230,
            ],
        ],
    )]
    #[ORM\Column(type: 'integer')]
    private $meterStop;

    /**
     * @var DateTime for stopping time of meter
     */
    #[ApiProperty(
        attributes: [
            "openapi_context" => [
                "type" => "Datetime",
                "example" => "2021-04-05T11:27:00Z",
            ],
        ],
    )]
    #[ORM\Column(type: 'datetime')]
    private $timestampStop;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeterStart(): ?int
    {
        return $this->meterStart;
    }

    public function setMeterStart(int $meterStart): self
    {
        $this->meterStart = $meterStart;

        return $this;
    }

    public function getTimestampStart(): ?\DateTimeInterface
    {
        return $this->timestampStart;
    }

    public function setTimestampStart(\DateTimeInterface $timestampStart): self
    {
        $this->timestampStart = $timestampStart;

        return $this;
    }

    public function getMeterStop(): ?int
    {
        return $this->meterStop;
    }

    public function setMeterStop(int $meterStop): self
    {
        $this->meterStop = $meterStop;

        return $this;
    }

    public function getTimestampStop(): ?\DateTimeInterface
    {
        return $this->timestampStop;
    }

    public function setTimestampStop(\DateTimeInterface $timestampStop): self
    {
        $this->timestampStop = $timestampStop;

        return $this;
    }
}
