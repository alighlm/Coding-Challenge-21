<?php

namespace App\Application\Service\Converter;

/*
 * Unit convertor for entire application
 */
class UnitConvert
{
    /*
     * Convert Wh to Kwh energy consumption
     * @param float Wh
     * @return flat in Kwh
     */
    public function EnergyConverter(float $wh):float
    {
        return $wh/1000;
    }

}
