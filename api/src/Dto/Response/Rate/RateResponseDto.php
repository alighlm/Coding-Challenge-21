<?php

namespace App\Dto\Response\Rate;

/**
 * Results of user cdr info calculation
 */
class RateResponseDto
{
    public float $overall ;
    public RateComponentDto $components ;


}
