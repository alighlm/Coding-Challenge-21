<?php

namespace App\Entity\CdrRecord;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\Rate\RateController;
use App\Dto\Request\Rate\RateRequestDto;
use App\Dto\Response\Rate\RateResponseDto;
use App\Repository\CdrRecordRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * This is an entity for storing rate and its CDR info.
 */
#[ApiResource(
    collectionOperations: [
        'rate' => [
            'method' => 'POST',
            'path' => '/rate',
            'controller' => RateController::class,
            'defaults' => [
                'dto' => RateRequestDto::class,
            ],
            'output' => RateResponseDto::class,
            'validate' => true,
            'openapi_context' => [
                'summary' => 'Calculate rate of given CDR record',
                'description' => 'Calculate rate of given CDR record',
                'responses' => [
                    201 => [
                        'description' => 'Rate successfully applied to the given cdr',
                        ],
                    ],

                ],
            ],
        ],
    itemOperations: [],
    )]

#[ORM\Entity(repositoryClass: CdrRecordRepository::class)]
class CdrRecord
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(targetEntity: Cdr::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $cdr;

    #[ORM\OneToOne(targetEntity: Rate::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $rate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCdr(): ?Cdr
    {
        return $this->cdr;
    }

    public function setCdr(Cdr $cdr): self
    {
        $this->cdr = $cdr;

        return $this;
    }

    public function getRate(): ?Rate
    {
        return $this->rate;
    }

    public function setRate(Rate $rate): self
    {
        $this->rate = $rate;

        return $this;
    }
}
