<?php

namespace App\Services;

use Google_Client;
use Google_Service_Sheets;

class GoogleService
{

    protected $client;
    protected $service;
    protected $spreadsheetId;

    public function __construct()
    {
        $this->spreadsheetId = env('GOOGLE_SHEET_ID');

        $this->client = new Google_Client();
        $this->client->setAuthConfig(storage_path('app/google-credentials.json'));
        $this->client->addScope(Google_Service_Sheets::SPREADSHEETS_READONLY);

        $this->service = new Google_Service_Sheets($this->client);
    }

    public function getStockPrices($range = 'Sheet1!A1:B10')
    {
        $response = $this->service->spreadsheets_values->get($this->spreadsheetId, $range);
        return $response->getValues();
    }
}
