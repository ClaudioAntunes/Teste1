<?php

namespace Forte\OsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Os
 *
 * @ORM\Table(name="forte_os2")
 * @ORM\Entity(repositoryClass="Forte\OsBundle\Entity\OsRepository")
 */
class Os
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
     * @var integer
     *
     * @ORM\Column(name="id_cliente", type="integer")
     */
    private $idCliente;

    /**
     * @var integer
     *
     * @ORM\Column(name="eqto", type="integer")
     */
    private $eqto;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_defeito", type="integer")
     */
    private $idDefeito;

    /**
     * @var array
     *
     * @ORM\Column(name="id_reparo", type="integer", nullable=TRUE)
     */
    private $idReparo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_situacao", type="integer")
     */
    private $idSituacao;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tecnico", type="integer")
     */
    private $idTecnico;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_abertura", type="datetime")
     */
    private $dataAbertura;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_fechamento", type="datetime")
     */
    private $dataFechamento;

    /**
     * @var string
     *
     * @ORM\Column(name="valorPecas", type="decimal")
     */
    private $valorPecas;

    /**
     * @var string
     *
     * @ORM\Column(name="valorMaoObra", type="decimal")
     */
    private $valorMaoObra;

    /**
     * @var string
     *
     * @ORM\Column(name="desconto", type="decimal")
     */
    private $desconto;

    /**
     * @var string
     *
     * @ORM\Column(name="valorTotal", type="decimal")
     */
    private $valorTotal;
    
    
    /**
     *
     * @var type \Doctrine\Common\Collections\ArrayCollection $reparos
     * 
     * @ORM\ManyToMany(targetEntity="Forte\OsBundle\Entity\Reparo", inversedBy="oesses")
     * @ORM\JoinTable(name="os_reparo",
     *      joinColumns={@ORM\JoinColumn(name="os_id",referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="reparo_id",referencedColumnName="id")}
     * )
     * 
     */
    protected $reparos;


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
     * Set idCliente
     *
     * @param integer $idCliente
     * @return Os
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get idCliente
     *
     * @return integer 
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set eqto
     *
     * @param integer $eqto
     * @return Os
     */
    public function setEqto($eqto)
    {
        $this->eqto = $eqto;

        return $this;
    }

    /**
     * Get eqto
     *
     * @return integer 
     */
    public function getEqto()
    {
        return $this->eqto;
    }

    /**
     * Set idDefeito
     *
     * @param integer $idDefeito
     * @return Os
     */
    public function setIdDefeito($idDefeito)
    {
        $this->idDefeito = $idDefeito;

        return $this;
    }

    /**
     * Get idDefeito
     *
     * @return integer 
     */
    public function getIdDefeito()
    {
        return $this->idDefeito;
    }

    /**
     * Set idReparo
     *
     * @param array $idReparo
     * @return Os
     */
    public function setIdReparo($idReparo)
    {
        $this->idReparo = $idReparo;

        return $this;
    }

    /**
     * Get idReparo
     *
     * @return array 
     */
    public function getIdReparo()
    {
        return $this->idReparo;
    }

    /**
     * Set idSituacao
     *
     * @param integer $idSituacao
     * @return Os
     */
    public function setIdSituacao($idSituacao)
    {
        $this->idSituacao = $idSituacao;

        return $this;
    }

    /**
     * Get idSituacao
     *
     * @return integer 
     */
    public function getIdSituacao()
    {
        return $this->idSituacao;
    }

    /**
     * Set idTecnico
     *
     * @param integer $idTecnico
     * @return Os
     */
    public function setIdTecnico($idTecnico)
    {
        $this->idTecnico = $idTecnico;

        return $this;
    }

    /**
     * Get idTecnico
     *
     * @return integer 
     */
    public function getIdTecnico()
    {
        return $this->idTecnico;
    }

    /**
     * Set dataAbertura
     *
     * @param \DateTime $dataAbertura
     * @return Os
     */
    public function setDataAbertura($dataAbertura)
    {
        $this->dataAbertura = $dataAbertura;

        return $this;
    }

    /**
     * Get dataAbertura
     *
     * @return \DateTime 
     */
    public function getDataAbertura()
    {
        return $this->dataAbertura;
    }

    /**
     * Set dataFechamento
     *
     * @param \DateTime $dataFechamento
     * @return Os
     */
    public function setDataFechamento($dataFechamento)
    {
        $this->dataFechamento = $dataFechamento;

        return $this;
    }

    /**
     * Get dataFechamento
     *
     * @return \DateTime 
     */
    public function getDataFechamento()
    {
        return $this->dataFechamento;
    }

    /**
     * Set valorPecas
     *
     * @param string $valorPecas
     * @return Os
     */
    public function setValorPecas($valorPecas)
    {
        $this->valorPecas = $valorPecas;

        return $this;
    }

    /**
     * Get valorPecas
     *
     * @return string 
     */
    public function getValorPecas()
    {
        return $this->valorPecas;
    }

    /**
     * Set valorMaoObra
     *
     * @param string $valorMaoObra
     * @return Os
     */
    public function setValorMaoObra($valorMaoObra)
    {
        $this->valorMaoObra = $valorMaoObra;

        return $this;
    }

    /**
     * Get valorMaoObra
     *
     * @return string 
     */
    public function getValorMaoObra()
    {
        return $this->valorMaoObra;
    }

    /**
     * Set desconto
     *
     * @param string $desconto
     * @return Os
     */
    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;

        return $this;
    }

    /**
     * Get desconto
     *
     * @return string 
     */
    public function getDesconto()
    {
        return $this->desconto;
    }

    /**
     * Set valorTotal
     *
     * @param string $valorTotal
     * @return Os
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;

        return $this;
    }

    /**
     * Get valorTotal
     *
     * @return string 
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reparos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add reparos
     *
     * @param \Forte\OsBundle\Entity\Reparo $reparos
     * @return Os
     */
    public function addReparo(\Forte\OsBundle\Entity\Reparo $reparos)
    {
        $this->reparos[] = $reparos;

        return $this;
    }

    /**
     * Remove reparos
     *
     * @param \Forte\OsBundle\Entity\Reparo $reparos
     */
    public function removeReparo(\Forte\OsBundle\Entity\Reparo $reparos)
    {
        $this->reparos->removeElement($reparos);
    }

    /**
     * Get reparos
     *
     * @return \Doctrine\Common\Collections\ArrayCollection 
     */
    public function getReparos()
    {
        return $this->reparos;
    }
}
