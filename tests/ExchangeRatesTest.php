<?php

namespace Stripe;

class ExchangeRatesTest extends TestCase
{
    public function testRetrieve()
    {
        $this->mockRequest(
            'GET',
            '/v1/exchange_rates/usd',
            array(),
            array(
                'object' => 'exchange_rates',
                'data' => array(
                    "usd" => array("eur" => 0.850525, "gbp" => 0.758553),
                ),
            )
        );

        $currency = "usd";
        $d = ExchangeRates::retrieve($currency);
        $this->assertSame("exchange_rates", $d->object);
    }

    public function testList()
    {
        $this->mockRequest(
            'GET',
            '/v1/exchange_rates',
            array(),
            array(
                'object' => 'exchange_rates',
                'data' => array(
                    "eur" => array("gbp" => 0.891864, "usd" => 1.17574),
                    "gbp" => array("eur" => 1.12125, "usd" => 1.3183),
                    "usd" => array("eur" => 0.850525, "gbp" => 0.758553),
                ),
            )
        );

        $d = ExchangeRates::all();
        $this->assertSame("exchange_rates", $d->object);
    }
}
