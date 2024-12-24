<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCurrency extends Command
{

    protected $signature = 'app:currency';


    protected $description = 'Command description';


    public function handle()
    {

        $currencies = ["GBP", "USD", "BAM"];

        $apiUrl = Http::get("https://api.hnb.hr/tecajn-eur/v3");
        $response = $apiUrl->body();
        $response = json_decode($response);
        $this->info("Kursna lista za EUR je: \n", true);
        foreach ($currencies as $currency) {
            foreach ($response as $data) {
                if ($data->valuta == $currency) {
                    $this->info("Srednji tecaj za " . $data->valuta . " je " . $data->srednji_tecaj . ", za državu " . $data->drzava);
                }
            }
        }

    }
}
