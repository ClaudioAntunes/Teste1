<?php

namespace Forte\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paginas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forte\BookBundle\Entity\PaginasRepository")
 */
class Paginas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="pages", type="string", length=255)
     * 
     * @ORM\OneToMany(targetEntity="Forte\BookBundle\Entity\Book", mappedBy="paginas")
     */
    private $pages;


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
     * Set pages
     *
     * @param string $pages
     * @return Paginas
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * Get pages
     *
     * @return string 
     */
    public function getPages()
    {
        return $this->pages;
    }
    
    public function __toString() {
        return $this->getPages();
    }
}
