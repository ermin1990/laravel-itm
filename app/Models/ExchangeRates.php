<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRates extends Model
{
    const CURRENCY_GBP = "GBP";
    CONST CURRENCY_USD = "USD";
    CONST CURRENCY_BAM = "BAM";

    CONST AVAILABLE_CURRENCIES = [
        self::CURRENCY_GBP,
        self::CURRENCY_USD,
        self::CURRENCY_BAM
    ];

    protected $table = 'exchange_rates';
    protected $fillable = [
        'valuta',
        'srednji_tecaj',
        'datum_primjene',
    ];

    public static function getCurrencyDate($currency, $date)
    {
       return self::where("valuta", $currency)
            ->where('datum_primjene', $date)
            ->first();
    }
}
