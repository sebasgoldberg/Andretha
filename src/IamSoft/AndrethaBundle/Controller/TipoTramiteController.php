<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\TipoTramite;
use IamSoft\AndrethaBundle\Form\TipoTramiteType;

/**
 * TipoTramite controller.
 *
 */
class TipoTramiteController extends Controller
{
    /**
     * Lists all TipoTramite entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:TipoTramite')->findAll();

        return $this->render('IamSoftAndrethaBundle:TipoTramite:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a TipoTramite entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:TipoTramite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoTramite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:TipoTramite:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new TipoTramite entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoTramite();
        $form   = $this->createForm(new TipoTramiteType(), $entity);

        return $this->render('IamSoftAndrethaBundle:TipoTramite:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new TipoTramite entity.
     *
     */
    public function createAction()
    {
        $entity  = new TipoTramite();
        $request = $this->getRequest();
        $form    = $this->createForm(new TipoTramiteType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipotramite_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:TipoTramite:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing TipoTramite entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:TipoTramite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoTramite entity.');
        }

        $editForm = $this->createForm(new TipoTramiteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:TipoTramite:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TipoTramite entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:TipoTramite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoTramite entity.');
        }

        $editForm   = $this->createForm(new TipoTramiteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipotramite_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:TipoTramite:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoTramite entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:TipoTramite')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoTramite entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipotramite'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
