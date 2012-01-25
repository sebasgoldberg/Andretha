<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\RegistroEscribano;
use IamSoft\AndrethaBundle\Form\RegistroEscribanoType;

/**
 * RegistroEscribano controller.
 *
 */
class RegistroEscribanoController extends Controller
{
    /**
     * Lists all RegistroEscribano entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:RegistroEscribano')->findAll();

        return $this->render('IamSoftAndrethaBundle:RegistroEscribano:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a RegistroEscribano entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:RegistroEscribano')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegistroEscribano entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:RegistroEscribano:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new RegistroEscribano entity.
     *
     */
    public function newAction()
    {
        $entity = new RegistroEscribano();
        $form   = $this->createForm(new RegistroEscribanoType(), $entity);

        return $this->render('IamSoftAndrethaBundle:RegistroEscribano:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new RegistroEscribano entity.
     *
     */
    public function createAction()
    {
        $entity  = new RegistroEscribano();
        $request = $this->getRequest();
        $form    = $this->createForm(new RegistroEscribanoType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registro_escribano_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:RegistroEscribano:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing RegistroEscribano entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:RegistroEscribano')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegistroEscribano entity.');
        }

        $editForm = $this->createForm(new RegistroEscribanoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:RegistroEscribano:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing RegistroEscribano entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:RegistroEscribano')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RegistroEscribano entity.');
        }

        $editForm   = $this->createForm(new RegistroEscribanoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registro_escribano_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:RegistroEscribano:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a RegistroEscribano entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:RegistroEscribano')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RegistroEscribano entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('registro_escribano'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
