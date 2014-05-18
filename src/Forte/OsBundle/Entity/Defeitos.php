<?php

namespace Forte\OsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Defeitos
 *
 * @ORM\Table(name="forte_defeitos")
 * @ORM\Entity(repositoryClass="Forte\OsBundle\Entity\DefeitosRepository")
 */
class Defeitos
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
     * @ORM\Column(name="reclamacao", type="string", length=255)
     */
    private $reclamacao;


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
     * Set reclamacao
     *
     * @param string $reclamacao
     * @return Defeitos
     */
    public function setReclamacao($reclamacao)
    {
        $this->reclamacao = $reclamacao;

        return $this;
    }

    /**
     * Get reclamacao
     *
     * @return string 
     */
    public function getReclamacao()
    {
        return $this->reclamacao;
    }
}
