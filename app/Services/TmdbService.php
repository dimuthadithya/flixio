<?php

namespace App\Services;

use GuzzleHttp\Client;

class TmdbService
{
    protected $client;
    protected $apiKey;
    protected $baseUrl;
    protected $imageBaseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.api_key');
        // Remove trailing slash from baseUrl if present
        $this->baseUrl = rtrim(config('services.tmdb.base_url'), '/');
        $this->imageBaseUrl = config('services.tmdb.image_base_url');

        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 15.0,
            'verify' => true,
        ]);
    }

    /**
     * Get popular movies
     *
     * @param int $page
     * @return array
     */
    public function getPopularMovies($page = 1)
    {
        return $this->makeRequest('movie/popular', [
            'page' => $page,
        ]);
    }

    /**
     * Get full image URL
     * 
     * @param string|null $path
     * @param string $size
     * @return string|null
     */
    public function getImageUrl($path, $size = 'w500')
    {
        if (empty($path)) {
            return null;
        }

        return $this->imageBaseUrl . $size . $path;
    }

    /**
     * Make API request to TMDB
     * 
     * @param string $endpoint
     * @param array $params
     * @return array
     * @throws \RuntimeException
     */
    protected function makeRequest($endpoint, $params = [])
    {
        $endpoint = '/' . ltrim($endpoint, '/');
        $fullUrl = $this->baseUrl . $endpoint;

        if (empty($this->apiKey)) {
            return [
                'error' => true,
                'message' => 'TMDB API key is not configured'
            ];
        }

        try {
            $params = array_merge($params, [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ]);

            $response = $this->client->request('GET', $fullUrl, [
                'query' => $params,
                'http_errors' => false,
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getBody()->getContents();

            if ($statusCode !== 200) {
                throw new \RuntimeException(
                    "TMDB API Error: HTTP $statusCode - " . $content
                );
            }

            $data = json_decode($content, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException(
                    'Invalid JSON response: ' . json_last_error_msg()
                );
            }

            return $data;
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => 'Failed to fetch data from TMDB API: ' . $e->getMessage()
            ];
        }
    }
}
