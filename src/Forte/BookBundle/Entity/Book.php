<?php

namespace Forte\BookBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forte\BookBundle\Entity\BookRepository")
 */
class Book
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;

    

    /**
     * 
     *
     * @var \Doctrine\Common\Collections\ArrayCollection $paginas
     * 
     * @ORM\ManyToOne(targetEntity="Forte\BookBundle\Entity\Paginas", inversedBy="pages")
     * @ORM\JoinColumn(name="paginas_id", referencedColumnName="id")
     * 
     */
    private $paginas;
    
    
    /**
     *
     * @var \Doctrine\Common\Collections\ArrayCollection $endereco
     * 
     * 
     * @ORM\OneToOne(targetEntity="Forte\BookBundle\Entity\Addr")
     * @ORM\JoinColumn(name="endereco_id", referencedColumnName="id")
     */
    protected $endereco;












    public function __construct()
    {
        $this->paginas = new ArrayCollection();
        $this->endereco = new ArrayCollection();
    }
    
    
    
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
     * Set name
     *
     * @param string $name
     * @return Book
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price.
     *
     * @param string $price
     * @return Book
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

   
    /**
     * Set paginas
     *
     * @param string $paginas
     * @return Book
     */
    public function setPaginas($paginas)
    {
        $this->paginas = $paginas;

        return $this;
    }

    /**
     * Get paginas
     *
     * @return string 
     */
    public function getPaginas()
    {
        return $this->paginas;
    }

    /**
     * Set endereco
     *
     * @param \Forte\BookBundle\Entity\Addr $endereco
     * @return Book
     */
    public function setEndereco(\Forte\BookBundle\Entity\Addr $endereco = null)
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get endereco
     *
     * @return \Forte\BookBundle\Entity\Addr 
     */
    public function getEndereco()
    {
        return $this->endereco;
    }
}
