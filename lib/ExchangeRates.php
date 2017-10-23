<?php

namespace Stripe;

/**
 * Class CountrySpec
 *
 * @package Stripe
 */
class ExchangeRates extends ApiResource
{
    /**
     * @return string The endpoint URL for the given class.
     */
    public static function classUrl()
    {
        return "/v1/exchange_rates";
    }

    /**
     * @param array|string $currency
     * @param array|string|null $opts
     *
     * @return ExchangeRates
     */
    public static function retrieve($currency, $opts = null)
    {
        return self::_retrieve($currency, $opts);
    }

    /**
     * @param array|null $params
     * @param array|string|null $opts
     *
     * @return ExchangeRates
     */
    public static function all($params = null, $opts = null)
    {
        return self::_all($params, $opts);
    }
}
