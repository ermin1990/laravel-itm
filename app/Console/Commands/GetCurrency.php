<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCurrency extends Command
{

    protected $signature = 'app:currency';


    protected $description = 'Command description';


    public function handle()
    {

        $apiUrl = Http::get("https://api.hnb.hr/tecajn-eur/v3");
        $response = $apiUrl->body();
        $response = json_decode($response);

        foreach (ExchangeRates::AVAILABLE_CURRENCIES as $currency) {
            foreach ($response as $data) {
                if ($data->valuta == $currency) {
                    if (ExchangeRates::getCurrencyDate($currency, $data->datum_primjene)) {
                        $this->info($currency . " za datum " . $data->datum_primjene . " postoji u bazi");
                    } else {
                        ExchangeRates::create([
                            "valuta" => $data->valuta,
                            "srednji_tecaj" => $data->srednji_tecaj,
                            "datum_primjene" => $data->datum_primjene
                        ]);
                    }
                }
            }
        }

    }

}
