<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\Escribano;
use IamSoft\AndrethaBundle\Form\EscribanoType;

/**
 * Escribano controller.
 *
 */
class EscribanoController extends Controller
{
    /**
     * Lists all Escribano entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:Escribano')->findAll();

        return $this->render('IamSoftAndrethaBundle:Escribano:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Escribano entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Escribano')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Escribano entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Escribano:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Escribano entity.
     *
     */
    public function newAction()
    {
        $entity = new Escribano();
        $form   = $this->createForm(new EscribanoType(), $entity);

        return $this->render('IamSoftAndrethaBundle:Escribano:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Escribano entity.
     *
     */
    public function createAction()
    {
        $entity  = new Escribano();
        $request = $this->getRequest();
        $form    = $this->createForm(new EscribanoType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('escribano_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:Escribano:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Escribano entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Escribano')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Escribano entity.');
        }

        $editForm = $this->createForm(new EscribanoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Escribano:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Escribano entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Escribano')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Escribano entity.');
        }

        $editForm   = $this->createForm(new EscribanoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('escribano_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:Escribano:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Escribano entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:Escribano')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Escribano entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('escribano'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
