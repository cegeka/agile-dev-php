<?php
require_once 'GitHubException.php';

class GitHubConnector
{
    public function callApi($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_USERAGENT, "tan-tan.github-api");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPGET, true);
        curl_setopt($curl, CURLOPT_VERBOSE, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }
} 