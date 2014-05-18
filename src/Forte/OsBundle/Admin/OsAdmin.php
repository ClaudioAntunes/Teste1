<?php
// src/Forte/OsBundle/Admin/OsAdmin.php

namespace Forte\OsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class OsAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('idCliente')
            ->add('eqto')// 'text', array('label' => 'Post Title'))
            ->add('idDefeito')//, 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            ->add('idReparo') //if no type is specified, SonataAdminBundle tries to guess it
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

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idCliente')
            ->add('eqto')
            ->add('idDefeito')
            ->add('idReparo')
            ->add('idSituacao')
            ->add('idTecnico')
            ->add('dataAbertura')
            ->add('dataFechamento')
           
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idCliente')
            ->addIdentifier('eqto')
            ->add('idDefeito')
            ->add('idReparo')
            ->add('idSituacao')
            ->add('idTecnico')
            ->add('dataAbertura')
            ->add('dataFechamento')
//            ->add('valorPecas')
//            ->add('valorMaoObra')
//            ->add('desconto')
            ->add('valorTotal')
            ->add('reparos')
        ;
    }
}