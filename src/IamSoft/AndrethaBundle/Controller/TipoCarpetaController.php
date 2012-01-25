<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\TipoCarpeta;
use IamSoft\AndrethaBundle\Form\TipoCarpetaType;

/**
 * TipoCarpeta controller.
 *
 */
class TipoCarpetaController extends Controller
{
    /**
     * Lists all TipoCarpeta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:TipoCarpeta')->findAll();

        return $this->render('IamSoftAndrethaBundle:TipoCarpeta:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a TipoCarpeta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:TipoCarpeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoCarpeta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:TipoCarpeta:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new TipoCarpeta entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoCarpeta();
        $form   = $this->createForm(new TipoCarpetaType(), $entity);

        return $this->render('IamSoftAndrethaBundle:TipoCarpeta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new TipoCarpeta entity.
     *
     */
    public function createAction()
    {
        $entity  = new TipoCarpeta();
        $request = $this->getRequest();
        $form    = $this->createForm(new TipoCarpetaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipocarpeta_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:TipoCarpeta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing TipoCarpeta entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:TipoCarpeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoCarpeta entity.');
        }

        $editForm = $this->createForm(new TipoCarpetaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:TipoCarpeta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TipoCarpeta entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:TipoCarpeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoCarpeta entity.');
        }

        $editForm   = $this->createForm(new TipoCarpetaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipocarpeta_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:TipoCarpeta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoCarpeta entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:TipoCarpeta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoCarpeta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipocarpeta'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
