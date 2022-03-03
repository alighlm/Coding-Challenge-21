<?php

namespace App\Dto\Request\Rate;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

class RateDto
{
    /**
     *  rate the charging process based on the energy consumed (€ per kWh)
     * @Assert\NotBlank
     * @Assert\Positive()
     * @param float $energy
     */
    public float $energy;

    /**
     *  rate the charging process based on its duration (€ per hour)
     * @Assert\NotBlank
     * @Assert\Positive()
     * @param float $time
     */
    public float $time;

    /**
     *  transaction - fees per charging process (€)
     * @Assert\NotBlank
     * @Assert\Positive()
     * @param float $transaction
     */
    public float $transaction;




}
