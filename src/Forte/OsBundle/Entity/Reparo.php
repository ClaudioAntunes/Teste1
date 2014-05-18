<?php

namespace Forte\OsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reparo
 *
 * @ORM\Table(name="forte_reparo")
 * @ORM\Entity(repositoryClass="Forte\OsBundle\Entity\ReparoRepository")
 */
class Reparo
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
     * @ORM\Column(name="servico", type="string", length=255)
     */
    private $servico;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracao", type="integer")
     */
    private $duracao;

    /**
     * @var string
     *
     * @ORM\Column(name="valor", type="decimal")
     */
    private $valor;
    
    /**
     *
     * @var type \Doctrine\Common\Collections\ArrayCollection $oesses
     * 
     * @ORM\ManyToMany(targetEntity="Forte\OsBundle\Entity\Os", mappedBy="reparos") 
     */
    protected $oesses;






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
     * Set servico
     *
     * @param string $servico
     * @return Reparo
     */
    public function setServico($servico)
    {
        $this->servico = $servico;

        return $this;
    }

    /**
     * Get servico
     *
     * @return string 
     */
    public function getServico()
    {
        return $this->servico;
    }

    /**
     * Set duracao
     *
     * @param integer $duracao
     * @return Reparo
     */
    public function setDuracao($duracao)
    {
        $this->duracao = $duracao;

        return $this;
    }

    /**
     * Get duracao
     *
     * @return integer 
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return Reparo
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->oesses = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() {
        return $this->getServico();
    }

    /**
     * Add oesses
     *
     * @param \Forte\OsBundle\Entity\Os $oesses
     * @return Reparo
     */
    public function addOess(\Forte\OsBundle\Entity\Os $oesses)
    {
        $this->oesses[] = $oesses;

        return $this;
    }

    /**
     * Remove oesses
     *
     * @param \Forte\OsBundle\Entity\Os $oesses
     */
    public function removeOess(\Forte\OsBundle\Entity\Os $oesses)
    {
        $this->oesses->removeElement($oesses);
    }

    /**
     * Get oesses
     *
     * @return \Doctrine\Common\Collections\ArrayCollection 
     */
    public function getOesses()
    {
        return $this->oesses;
    }
}
