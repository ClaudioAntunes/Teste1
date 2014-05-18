<?php

namespace Forte\OsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idCliente')
            ->add('eqto')
            ->add('idDefeito')
            ->add('idReparo')
            ->add('idSituacao')
            ->add('idTecnico')
            ->add('dataAbertura')
            ->add('dataFechamento')
            ->add('valorPecas')
            ->add('valorMaoObra')
            ->add('desconto')
            ->add('valorTotal')
            ->add('reparos')    
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Forte\OsBundle\Entity\Os'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'forte_osbundle_os';
    }
}
