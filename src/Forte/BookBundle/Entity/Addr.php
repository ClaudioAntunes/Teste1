<?php

namespace Forte\BookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Addr
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Forte\BookBundle\Entity\AddrRepository")
 */
class Addr
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
     * @ORM\Column(name="rua", type="string", length=255)
     * 
     */
    private $rua;

    /**
     * @var string
     *
     * @ORM\Column(name="bairro", type="string", length=255)
     */
    private $bairro;


    
    public function __toString() {
        return $this->getBairro();
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
     * Set rua
     *
     * @param string $rua
     * @return Addr
     */
    public function setRua($rua)
    {
        $this->rua = $rua;

        return $this;
    }

    /**
     * Get rua
     *
     * @return string 
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * Set bairro
     *
     * @param string $bairro
     * @return Addr
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get bairro
     *
     * @return string 
     */
    public function getBairro()
    {
        return $this->bairro;
    }
}
