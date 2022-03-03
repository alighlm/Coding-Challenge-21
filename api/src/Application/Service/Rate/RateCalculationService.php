<?php

namespace App\Application\Service\Rate;

use App\Application\Service\Converter\UnitConvert;
use App\Entity\CdrRecord\CalculatedRate;
use App\Entity\CdrRecord\Cdr;
use App\Entity\CdrRecord\CdrRecord;
use App\Entity\CdrRecord\Rate;

class RateCalculationService
{
    public function __construct(
        private UnitConvert $unitConvert
    )
    {

    }

    /**
     * calculate rates based on input cdr and rate
     *
     * there is one point, since I didn't know how should I round rates, in calculation,
     * I decided to do it at this service in calculation time, so there is more options,
     * but it depends on business scenario, since this kind of rounding values can make corruption
     * when it comes to a lot of customers
     *
     *
     *
     * @param CdrRecord $cdrRecord
     * @return CalculatedRate
     */
    public function handle(CdrRecord $cdrRecord) : CalculatedRate
    {
        $calculatedRate = new CalculatedRate();
        $energy = $this->CalculateEnergyRate($cdrRecord->getCdr(), $cdrRecord->getRate());
        $time = $this->CalculateTimeRate($cdrRecord->getCdr(), $cdrRecord->getRate());
        $transaction = $this->CalculateTransactionRate( $cdrRecord->getRate());
        $overall = $this->CalculateOverall($energy, $time, $transaction);

        $calculatedRate->setEnergy($energy);
        $calculatedRate->setTime($time);
        $calculatedRate->setTransaction($transaction);
        $calculatedRate->setOverall($overall);

        return $calculatedRate;
    }

    private function CalculateEnergyRate(Cdr $cdr , Rate $rate) : float
    {
        $calculated = $this->unitConvert->EnergyConverter( ( $cdr->getMeterStop() - $cdr->getMeterStart() ) )
            * $rate->getEnergy() ;

        return  round($calculated,3);
    }

    private function CalculateTimeRate(Cdr $cdr , Rate $rate) : float
    {
        $calculated = ( $cdr->getTimestampStop()->getTimestamp() - $cdr->getTimestampStart()->getTimestamp() )
            * $rate->getTime() / (60 * 60 );
         return   round($calculated,3);
    }

    private function CalculateTransactionRate( Rate $rate ) : float
    {
        $calculated = $rate->getTransaction() ;

        return   round($calculated,3);
    }

    private function CalculateOverall(float $energy, float $time, float $transaction) : float
    {
        $overall =  $overall = $energy + $time + $transaction ;
        return  round($overall,2);
    }


}
