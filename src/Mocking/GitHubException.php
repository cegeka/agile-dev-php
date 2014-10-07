<?php


class GitHubException extends \Exception
{
    const USERS_GET_FAILED = '{"message":"Not Found","documentation_url":"https://developer.github.com/v3"}';

    public function __construct($url)
    {
        parent::__construct();

        $this->code = 455;
        $this->message = "There was an error encountered when accessing the URL: {$url}";
    }
} 