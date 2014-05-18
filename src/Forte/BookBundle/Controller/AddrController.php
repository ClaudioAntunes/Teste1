<?php

namespace Forte\BookBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Forte\BookBundle\Entity\Addr;
use Forte\BookBundle\Form\AddrType;

/**
 * Addr controller.
 *
 * @Route("/addr")
 */
class AddrController extends Controller
{

    /**
     * Lists all Addr entities.
     *
     * @Route("/", name="addr")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ForteBookBundle:Addr')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Addr entity.
     *
     * @Route("/", name="addr_create")
     * @Method("POST")
     * @Template("ForteBookBundle:Addr:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Addr();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('addr_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Addr entity.
    *
    * @param Addr $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Addr $entity)
    {
        $form = $this->createForm(new AddrType(), $entity, array(
            'action' => $this->generateUrl('addr_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Addr entity.
     *
     * @Route("/new", name="addr_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Addr();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Addr entity.
     *
     * @Route("/{id}", name="addr_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ForteBookBundle:Addr')->find($id);
        $entity2 = $em->getRepository('ForteBookBundle:Book')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Addr entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'entity2'      => $entity2,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Addr entity.
     *
     * @Route("/{id}/edit", name="addr_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ForteBookBundle:Addr')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Addr entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Addr entity.
    *
    * @param Addr $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Addr $entity)
    {
        $form = $this->createForm(new AddrType(), $entity, array(
            'action' => $this->generateUrl('addr_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Addr entity.
     *
     * @Route("/{id}", name="addr_update")
     * @Method("PUT")
     * @Template("ForteBookBundle:Addr:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ForteBookBundle:Addr')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Addr entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('addr_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Addr entity.
     *
     * @Route("/{id}", name="addr_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ForteBookBundle:Addr')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Addr entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('addr'));
    }

    /**
     * Creates a form to delete a Addr entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('addr_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
