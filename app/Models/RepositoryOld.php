<?php

namespace App\Models;

/**
 *
 * @package App\Models
 */
class RepositoryOld
{
    protected $repository_name;
    protected $title;
    protected $url;
    protected $git_clone;
    protected $git_domain;
    protected $icon;
    protected $readme_link;
    protected $readme;
    protected $author;
    protected $author_profile;
    protected $status;

    public function __construct()
    {
    }
    public function create($repository_name, $title, $url, $git_clone, $git_domain, $icon, $readme_link, $readme, $author, $author_profile, $status)
    {
        $instance = new self();
        $this->repository_name = $repository_name;
        $this->title = $title;
        $this->url = $url;
        $this->git_clone = $git_clone;
        $this->git_domain = $git_domain;
        $this->icon = $icon;
        $this->readme_link = $readme_link;
        $this->readme = $readme;
        $this->author = $author;
        $this->author_profile = $author_profile;
        $this->status = $status;
        return $instance;
    }

    function setRepositoryName($repository_name)
    {
        $this->repository_name = $repository_name;
    }
    function getRepositoryName()
    {
        echo $this->repository_name . "<br>";
    }

    function setTitle($title)
    {
        $this->title = $title;
    }
    function getTitle()
    {
        echo $this->title . "<br>";
    }

    function setUrl($url)
    {
        $this->url = $url;
    }
    function getUrl()
    {
        echo $this->url . "<br>";
    }

    function setGitClone($git_clone)
    {
        $this->git_clone = $git_clone;
    }
    function getGitClone()
    {
        echo $this->git_clone . "<br>";
    }

    function setGitDomain($git_domain)
    {
        $this->git_domain = $git_domain;
    }
    function getGitDomain()
    {
        echo $this->git_domain . "<br>";
    }

    function setIcon($icon)
    {
        $this->icon = $icon;
    }
    function getIcon()
    {
        echo $this->icon . "<br>";
    }

    function setReadmeLink($readme_link)
    {
        $this->readme_link = $readme_link;
    }
    function getReadmeLink()
    {
        echo $this->readme_link . "<br>";
    }

    function setReadme($readme)
    {
        $this->readme = $readme;
    }
    function getReadme()
    {
        echo $this->readme . "<br>";
    }

    function setAuthor($author)
    {
        $this->author = $author;
    }
    function getAuthor()
    {
        echo $this->author . "<br>";
    }

    function setAuthorProfile($author_profile)
    {
        $this->author_profile = $author_profile;
    }
    function getAuthorProfile()
    {
        echo $this->author_profile . "<br>";
    }

    function setStatus($status)
    {
        $this->status = $status;
    }
    function getStatus()
    {
        echo $this->status . "<br>";
    }
}
