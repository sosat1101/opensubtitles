<?php

namespace openSubtitles;

use Exception;

class SearchOpenSubtitles
{
    private array $defaultParameters = [
        'ai_translated' => '',      // string    exclude, include (default: exclude)
        'episode_number' => 0,      // integer   For Tvshows
        'foreign_parts_only' => '', // string    foreign_parts_only
        'hearing_impaired' => '',   // string    include, exclude, only. (default: include)
        'id' => 0,                  // integer   ID of the movie or episode
        'imdb_id' => 0,             // string    IMDB ID of the movie or episode
        'languages' => '',          // string    Language code(s), coma separated (en,fr)
        'machine_translated' => '', // string    exclude, include (default: exclude)
        'moviehash' => '',          // string    include, only (default: include)
        'moviehash_match' => '',    // string    include, only (default: include)
        'order_by' => '',           // string    Order of the returned results, accept any of above fields
        'order_direction' => '',    // string    Order direction of the returned results (asc,desc)
        'page' => 0,                // integer   Results page to display
        'parent_feature_id' => 0,   // integer   For Tvshows
        'parent_imdb_id' => 0,      // integer   For Tvshows
        'parent_tmdb_id' => 0,      // integer   For Tvshows
        'query' => '',              // string    file name or text search
        'season_number' => 0,       // integer   TMDB ID of the movie or episode
        'trusted_sources' => '',    // string    include, only (default: include)
        'type' => '',               // string    movie, episode or all, (default: all)
        'user_id' => 0,             // integer   To be used alone - for user uploads listing
        'year' => 0,                // integer   Filter by movie/episode year
    ];

      private mixed $ch;

    private array $curlOption = [
        CURLOPT_URL => "https://api.opensubtitles.com/api/v1/subtitles",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPGET => true,
    ];

    public function __construct(array $parameters)
    {
        $this->initParameters($parameters);
        $this->init();
    }

    private function initParameters(array $parameters)
    {
        foreach ($parameters as $key => $value) {
            if (array_key_exists($key, $this->defaultParameters)) {
                $this->defaultParameters[$key] = $value;
            }
        }
    }

    private function init()
    {
        foreach ($this->defaultParameters as $key => $value) {
            if (!empty($value)) {
                $this->curlOption[CURLOPT_URL] .= "/" . $key . "-" . $value;
            }
        }
    }

    /**
     * @throws Exception
     */
    public function getCurlResult(): array|string
    {
        $this->ch = curl_init();
        curl_setopt_array($this->ch, $this->curlOption);
        $result = curl_exec($this->ch);
        if (curl_exec($this->ch) === false) {
            return 'Curl error: ' . curl_error($this->ch);
        }
        curl_close($this->ch);
        return $this->toArray($result);
    }

    private function toArray(string $json): array
    {
        return json_decode($json, true);
    }
}
