<?php

namespace Model\Entities;

use App\Entity;

final class Post extends Entity
{

    private $id;
    private $text;
    private $publishDate;
    private $user;
    private $topic;

    public function __construct($data)
    {
        $this->hydrate($data);
    }



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     */
    public function setText($text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of publishDate
     */
    public function getPublishDate()
    {
        return $this->publishDate;
    }

    /**
     * Set the value of publishDate
     */
    public function setPublishDate($publishDate): self
    {
        $this->publishDate = $publishDate;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     */
    public function setUser($user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of category
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Set the value of category
     */
    public function setCategory($topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function __toString()
    {
        return $this->text;
    }
}
