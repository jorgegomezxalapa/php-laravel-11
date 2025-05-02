<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PexelsService
{
    protected $apiUrl = 'https://api.pexels.com/v1/search';
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.pexels.api_key');
    }

    public function getConstructionImages(){

        $count = config('services.pexels.count');
        $randomPage = rand(1, 10);

        try {
            $response = Http::withHeaders([
                'Authorization' => $this->apiKey
            ])->get($this->apiUrl, [
                'query' => 'construction site OR building under construction OR civil engineering buildings',
                'per_page' => $count,
                'page' => $randomPage,
                'order_by' => 'popular'
            ]);
            // Verifica si la solicitud fue exitosa (código HTTP 200)
            if ($response->successful()) {
                return $response->json()['photos'] ?? [];
            } else {
                // Log del error y retorno de un array vacío    
                return [];
            }
        } catch (\Exception $e) {
            // Manejo de excepciones en caso de fallo de conexión u otros errores inesperados
            return [];
        }
    }

    


}