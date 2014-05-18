<?php
// src/Forte/OsBundle/Admin/ReparoAdmin.php

namespace Forte\OsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ReparoAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('servico')// 'text', array('label' => 'Post Title'))
            ->add('duracao')//, 'entity', array('class' => 'Acme\DemoBundle\Entity\User'))
            ->add('valor') //if no type is specified, SonataAdminBundle tries to guess it
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('servico')
            ->add('duracao')
            ->add('valor')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('servico')
            ->add('duracao')
            ->add('valor')
        ;
    }
}