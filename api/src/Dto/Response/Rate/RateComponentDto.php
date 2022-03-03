<?php

namespace App\Dto\Response\Rate;

class RateComponentDto
{
    /**
     * Calculated payment amount for energy (€)
     * @param float $energy
     */
    public float $energy;

    /**
     *  Calculated payment amount for charging process based on its duration (€)
     * @param float $time
     */
    public float $time;

    /**
     *  Calculated payment amount for transaction (€)
     * @param float $transaction
     */
    public float $transaction;
}
