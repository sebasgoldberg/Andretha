<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\DocumentoTipoTramite;
use IamSoft\AndrethaBundle\Form\DocumentoTipoTramiteType;

/**
 * DocumentoTipoTramite controller.
 *
 */
class DocumentoTipoTramiteController extends Controller
{
    /**
     * Lists all DocumentoTipoTramite entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:DocumentoTipoTramite')->findAll();

        return $this->render('IamSoftAndrethaBundle:DocumentoTipoTramite:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a DocumentoTipoTramite entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:DocumentoTipoTramite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DocumentoTipoTramite entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:DocumentoTipoTramite:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new DocumentoTipoTramite entity.
     *
     */
    public function newAction()
    {
        $entity = new DocumentoTipoTramite();
        $form   = $this->createForm(new DocumentoTipoTramiteType(), $entity);

        return $this->render('IamSoftAndrethaBundle:DocumentoTipoTramite:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new DocumentoTipoTramite entity.
     *
     */
    public function createAction()
    {
        $entity  = new DocumentoTipoTramite();
        $request = $this->getRequest();
        $form    = $this->createForm(new DocumentoTipoTramiteType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('documentotipotramite_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:DocumentoTipoTramite:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing DocumentoTipoTramite entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:DocumentoTipoTramite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DocumentoTipoTramite entity.');
        }

        $editForm = $this->createForm(new DocumentoTipoTramiteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:DocumentoTipoTramite:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing DocumentoTipoTramite entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:DocumentoTipoTramite')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find DocumentoTipoTramite entity.');
        }

        $editForm   = $this->createForm(new DocumentoTipoTramiteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('documentotipotramite_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:DocumentoTipoTramite:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a DocumentoTipoTramite entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:DocumentoTipoTramite')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find DocumentoTipoTramite entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('documentotipotramite'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
