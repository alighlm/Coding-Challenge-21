<?php

namespace App\Tests\Service\Rate;

use App\Application\Service\Converter\UnitConvert;
use App\Application\Service\Rate\RateCalculationService;
use App\Entity\CdrRecord\Cdr;
use App\Entity\CdrRecord\CdrRecord;
use App\Entity\CdrRecord\Rate;
use PHPUnit\Framework\TestCase;

class RateCalculationServiceTest extends TestCase
{
    /** @test  */
    public function rate_calculation_service_test() :void
    {
        $rate = new Rate();
        $rate->setTransaction(2);
        $rate->setTime(2.23);
        $rate->setEnergy(3);

        $cdr = new Cdr();
        $cdr->setMeterStart(124589);
        $cdr->setMeterStop(125698);
        $datetimeStart = new \DateTimeImmutable("2020-04-05T10:04:00Z");
        $datetimeStop = new \DateTimeImmutable("2020-04-06T13:04:00Z");

        $cdr->setTimestampStart($datetimeStart);
        $cdr->setTimestampStop($datetimeStop);

        $cdrRecord = new CdrRecord();
        $cdrRecord->setCdr($cdr);
        $cdrRecord->setRate($rate);

        $rateCalculationService = new RateCalculationService(new UnitConvert());

        $caculated = $rateCalculationService->handle($cdrRecord);

        self::assertSame($caculated->getOverall(),65.54);
        self::assertSame($caculated->getEnergy(),3.327);
        self::assertSame($caculated->getTransaction(),2.0);
        self::assertSame($caculated->getTime(),60.21);
        self::assertEquals($caculated->getTransaction(),2);

    }
}
