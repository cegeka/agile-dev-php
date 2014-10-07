<?php
require_once 'GitHubConnector.php';
require_once 'GitHubException.php';
require_once 'GitHubUser.php';

class GitHubApi
{
    const USERS_URL = 'https://api.github.com/users/';

    /** @var GitHubConnector */
    protected $connector;

    public function __construct(GitHubConnector $connector)
    {
        $this->connector = $connector;
    }

    public function getUserData($username)
    {
        $url = self::USERS_URL . $username;
        $apiResponse = $this->connector->callApi($url);

        if (GitHubException::USERS_GET_FAILED === $apiResponse) {
            throw new GitHubException($url);
        }

        $response = json_decode($apiResponse);

        $userEntity = new GitHubUser();
        $userEntity->setLogin($response->login)
            ->setId($response->id)
            ->setAvatarUrl($response->avatar_url)
            ->setHtmlUrl($response->html_url)
            ->setPublicName($response->name)
            ->setPublicRepositoryCount($response->public_repos);

        return $userEntity;
    }
}