<?php

namespace Forte\OsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Forte\OsBundle\Entity\Reparo;
use Forte\OsBundle\Form\ReparoType;

/**
 * Reparo controller.
 *
 */
class ReparoController extends Controller
{

    /**
     * Lists all Reparo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('OsBundle:Reparo')->findAll();

        return $this->render('OsBundle:Reparo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Reparo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Reparo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reparo_show', array('id' => $entity->getId())));
        }

        return $this->render('OsBundle:Reparo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Reparo entity.
    *
    * @param Reparo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Reparo $entity)
    {
        $form = $this->createForm(new ReparoType(), $entity, array(
            'action' => $this->generateUrl('reparo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Reparo entity.
     *
     */
    public function newAction()
    {
        $entity = new Reparo();
        $form   = $this->createCreateForm($entity);

        return $this->render('OsBundle:Reparo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Reparo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OsBundle:Reparo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reparo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OsBundle:Reparo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Reparo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OsBundle:Reparo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reparo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('OsBundle:Reparo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Reparo entity.
    *
    * @param Reparo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Reparo $entity)
    {
        $form = $this->createForm(new ReparoType(), $entity, array(
            'action' => $this->generateUrl('reparo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Reparo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('OsBundle:Reparo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Reparo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reparo_edit', array('id' => $id)));
        }

        return $this->render('OsBundle:Reparo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Reparo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('OsBundle:Reparo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Reparo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reparo'));
    }

    /**
     * Creates a form to delete a Reparo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reparo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
