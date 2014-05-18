<?php

namespace Forte\OsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Forte\OsBundle\Entity\Situacao;
use Forte\OsBundle\Form\SituacaoType;

/**
 * Situacao controller.
 *
 */
class SituacaoController extends Controller
{

    /**
     * Lists all Situacao entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OsBundle:Situacao')->findAll();

        return $this->render('OsBundle:Situacao:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Situacao entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Situacao();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('situacao_show', array('id' => $entity->getId())));
        }

        return $this->render('OsBundle:Situacao:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Situacao entity.
    *
    * @param Situacao $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Situacao $entity)
    {
        $form = $this->createForm(new SituacaoType(), $entity, array(
            'action' => $this->generateUrl('situacao_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Situacao entity.
     *
     */
    public function newAction()
    {
        $entity = new Situacao();
        $form   = $this->createCreateForm($entity);

        return $this->render('OsBundle:Situacao:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Situacao entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OsBundle:Situacao')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Situacao entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OsBundle:Situacao:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Situacao entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OsBundle:Situacao')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Situacao entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OsBundle:Situacao:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Situacao entity.
    *
    * @param Situacao $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Situacao $entity)
    {
        $form = $this->createForm(new SituacaoType(), $entity, array(
            'action' => $this->generateUrl('situacao_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Situacao entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OsBundle:Situacao')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Situacao entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('situacao_edit', array('id' => $id)));
        }

        return $this->render('OsBundle:Situacao:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Situacao entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OsBundle:Situacao')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Situacao entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('situacao'));
    }

    /**
     * Creates a form to delete a Situacao entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('situacao_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
