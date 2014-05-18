<?php

namespace Forte\OsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Forte\OsBundle\Entity\Defeitos;
use Forte\OsBundle\Form\DefeitosType;

/**
 * Defeitos controller.
 *
 */
class DefeitosController extends Controller
{

    /**
     * Lists all Defeitos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OsBundle:Defeitos')->findAll();

        return $this->render('OsBundle:Defeitos:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Defeitos entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Defeitos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('defeitos_show', array('id' => $entity->getId())));
        }

        return $this->render('OsBundle:Defeitos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Defeitos entity.
    *
    * @param Defeitos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Defeitos $entity)
    {
        $form = $this->createForm(new DefeitosType(), $entity, array(
            'action' => $this->generateUrl('defeitos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Defeitos entity.
     *
     */
    public function newAction()
    {
        $entity = new Defeitos();
        $form   = $this->createCreateForm($entity);

        return $this->render('OsBundle:Defeitos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Defeitos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OsBundle:Defeitos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Defeitos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OsBundle:Defeitos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Defeitos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OsBundle:Defeitos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Defeitos entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OsBundle:Defeitos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Defeitos entity.
    *
    * @param Defeitos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Defeitos $entity)
    {
        $form = $this->createForm(new DefeitosType(), $entity, array(
            'action' => $this->generateUrl('defeitos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Defeitos entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OsBundle:Defeitos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Defeitos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('defeitos_edit', array('id' => $id)));
        }

        return $this->render('OsBundle:Defeitos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Defeitos entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OsBundle:Defeitos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Defeitos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('defeitos'));
    }

    /**
     * Creates a form to delete a Defeitos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('defeitos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
