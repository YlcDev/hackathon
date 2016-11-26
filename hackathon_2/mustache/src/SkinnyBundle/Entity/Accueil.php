<?php

namespace SkinnyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accueil
 */
class Accueil
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $picture;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     */
    private $posteur;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Accueil
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Accueil
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set posteur
     *
     * @param string $posteur
     * @return Accueil
     */
    public function setPosteur($posteur)
    {
        $this->posteur = $posteur;

        return $this;
    }

    /**
     * Get posteur
     *
     * @return string 
     */
    public function getPosteur()
    {
        return $this->posteur;
    }
}
