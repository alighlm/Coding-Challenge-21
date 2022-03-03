<?php

namespace App\Dto\Request\Rate\Transformer;

use App\Dto\Request\Rate\RateRequestDto;
use App\Dto\Response\Rate\RateComponentDto;
use App\Dto\Response\Rate\RateResponseDto;
use App\Dto\Transformer\AbstractDtoTransformer;
use App\Entity\CdrRecord\Cdr;
use App\Entity\CdrRecord\CdrRecord;
use App\Entity\CdrRecord\Rate;

class RateRequestTransformer extends AbstractDtoTransformer
{
    /**
     * @param RateRequestDto
     * @return CdrRecord
     */
    public function transformFromObject( $rateRequestDto)
    {
        $rate = new Rate();
        $rate->setTransaction($rateRequestDto->rate->transaction);
        $rate->setTime($rateRequestDto->rate->time);
        $rate->setEnergy($rateRequestDto->rate->energy);

        $cdr = new Cdr();
        $cdr->setMeterStart($rateRequestDto->cdr->meterStart);
        $cdr->setMeterStop($rateRequestDto->cdr->meterStop);
        $datetimeStart = new \DateTimeImmutable($rateRequestDto->cdr->timestampStart);
        $datetimeStop = new \DateTimeImmutable($rateRequestDto->cdr->timestampStop);

        $cdr->setTimestampStart($datetimeStart);
        $cdr->setTimestampStop($datetimeStop);

        $cdrRecord = new CdrRecord();
        $cdrRecord->setCdr($cdr);
        $cdrRecord->setRate($rate);

        return $cdrRecord;

    }
}
