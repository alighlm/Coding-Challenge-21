<?php

namespace App\Dto\Request\Rate;

use Symfony\Component\Validator\Constraints as Assert;

class CdrDto
{
    /**
     * @Assert\NotBlank
     * @Assert\Positive()
     * @var int for starting value of meter
     */
    public int $meterStart;

    /**
     * @Assert\NotBlank
     * @Assert\DateTime(format="Y-m-d\TH:i:sO")
     * @var string A "Y-m-d\TH:i:sO" formatted value
     */
    public $timestampStart;

    /**
     * @Assert\NotBlank
     * @Assert\Positive()
     * @var int for stopping value of meter
     */
    public int $meterStop;

    /**
     * @Assert\NotBlank
     * @Assert\DateTime(format="Y-m-d\TH:i:sO")
     * @var string A "Y-m-d H:i:s" formatted value
     */
    public $timestampStop;
}
