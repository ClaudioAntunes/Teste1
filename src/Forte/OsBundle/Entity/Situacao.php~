<?php

namespace Forte\OsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Situacao
 *
 * @ORM\Table(name="forte_situacao")
 * @ORM\Entity(repositoryClass="Forte\OsBundle\Entity\SituacaoRepository")
 */
class Situacao
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
     * @ORM\Column(name="posicao", type="string", length=100)
     */
    private $posicao;


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
     * Set posicao
     *
     * @param string $posicao
     * @return Situacao
     */
    public function setPosicao($posicao)
    {
        $this->posicao = $posicao;

        return $this;
    }

    /**
     * Get posicao
     *
     * @return string 
     */
    public function getPosicao()
    {
        return $this->posicao;
    }
}
