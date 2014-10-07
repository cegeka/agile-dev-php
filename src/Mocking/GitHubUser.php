<?php


class GitHubUser
{

    /** @var string */
    protected $login;

    /** @var string */
    protected $id;

    /** @var string */
    protected $avatarUrl;

    /** @var string */
    protected $publicName;

    /** @var string */
    protected $htmlUrl;

    /** @var string */
    protected $publicRepositoryCount;

    /**
     * @param string $avatarUrl
     * @return $this
     */
    public function setAvatarUrl($avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @param string $htmlUrl
     * @return $this
     */
    public function setHtmlUrl($htmlUrl)
    {
        $this->htmlUrl = $htmlUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtmlUrl()
    {
        return $this->htmlUrl;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $login
     * @return $this
     */
    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $publicName
     * @return $this
     */
    public function setPublicName($publicName)
    {
        $this->publicName = $publicName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublicName()
    {
        return $this->publicName;
    }

    /**
     * @param string $publicRepositoryCount
     * @return $this
     */
    public function setPublicRepositoryCount($publicRepositoryCount)
    {
        $this->publicRepositoryCount = $publicRepositoryCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublicRepositoryCount()
    {
        return $this->publicRepositoryCount;
    }


} 