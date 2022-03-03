<?php

namespace App\Tests\Api;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;


class RateCalculationTest extends ApiTestCase
{

    private static $rateData = [
            'cdr' => [
                'meterStart'=> 1204307,
                'timestampStart'=> '2021-04-05T10:04:00Z',
                'meterStop'=> 1215230,
                'timestampStop'=> '2021-04-05T11:27:00Z'
            ],
            'rate' => [
                'energy'=> 0.3,
                'time'  => 2,
                'transaction' => 1
            ]
        ];

    /** @test */
    public function rate_calculation_api_test() :void
    {

        $response = static::createClient()-> request('POST', '/rate', [
            'json' => $this::$rateData,
            'headers' => [
                'Accept: application/json',
            ],
        ]);

        $this::assertResponseIsSuccessful();
        $this::assertJsonEquals([
            'overall' => 7.04,
            'components' => [
                'energy'=> 3.277,
		        'time'  => 2.767,
		        'transaction' => 1
            ]
        ]);
    }

    /** @test */
    public function rate_calculation_api_input_json_test() :void
    {

        $response = static::createClient()-> request('POST', '/rate', [
            'json' => [],
            'headers' => [
                'Accept: application/json',
            ],
        ]);


        $this::assertResponseStatusCodeSame(422);

    }
}
