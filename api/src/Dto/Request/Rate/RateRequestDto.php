<?php

namespace App\Dto\Request\Rate;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;


class RateRequestDto
{

    /**
     * @var RateDto
     * @Assert\Valid
     * @Assert\NotBlank
     */
    public RateDto $rate;

    /**
     * @var CdrDto
     * @Assert\Valid
     * @Assert\NotBlank
     */
    public CdrDto $cdr;




}
