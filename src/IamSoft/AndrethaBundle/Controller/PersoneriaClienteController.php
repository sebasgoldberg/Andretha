<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\PersoneriaCliente;
use IamSoft\AndrethaBundle\Form\PersoneriaClienteType;

/**
 * PersoneriaCliente controller.
 *
 */
class PersoneriaClienteController extends Controller
{
    /**
     * Lists all PersoneriaCliente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:PersoneriaCliente')->findAll();

        return $this->render('IamSoftAndrethaBundle:PersoneriaCliente:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a PersoneriaCliente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:PersoneriaCliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersoneriaCliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:PersoneriaCliente:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new PersoneriaCliente entity.
     *
     */
    public function newAction()
    {
        $entity = new PersoneriaCliente();
        $form   = $this->createForm(new PersoneriaClienteType(), $entity);

        return $this->render('IamSoftAndrethaBundle:PersoneriaCliente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new PersoneriaCliente entity.
     *
     */
    public function createAction()
    {
        $entity  = new PersoneriaCliente();
        $request = $this->getRequest();
        $form    = $this->createForm(new PersoneriaClienteType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();
        		
            return $this->redirect($this->generateUrl('personeriacliente_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:PersoneriaCliente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing PersoneriaCliente entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:PersoneriaCliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersoneriaCliente entity.');
        }

        $editForm = $this->createForm(new PersoneriaClienteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:PersoneriaCliente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing PersoneriaCliente entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:PersoneriaCliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PersoneriaCliente entity.');
        }

        $editForm   = $this->createForm(new PersoneriaClienteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('personeriacliente_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:PersoneriaCliente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PersoneriaCliente entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:PersoneriaCliente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PersoneriaCliente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personeriacliente'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
