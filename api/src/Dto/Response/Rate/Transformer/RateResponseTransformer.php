<?php

namespace App\Dto\Response\Rate\Transformer;

use App\Dto\Response\Rate\RateComponentDto;
use App\Dto\Response\Rate\RateResponseDto;
use App\Dto\Transformer\AbstractDtoTransformer;
use App\Entity\CdrRecord\CalculatedRate;

class RateResponseTransformer extends AbstractDtoTransformer
{
    /**
     * @param CalculatedRate
     * @return RateResponseDto
     */
    public function transformFromObject($calculatedRate)
    {
        $rateDto = new RateResponseDto();
        $rateDto->overall = $calculatedRate->getOverall();
        $rateComponentDto = new RateComponentDto();
        $rateComponentDto->energy = $calculatedRate->getEnergy();
        $rateComponentDto->transaction = $calculatedRate->getTransaction();
        $rateComponentDto->time = $calculatedRate->getTime();

        $rateDto->components = $rateComponentDto;

        return $rateDto;

    }
}
