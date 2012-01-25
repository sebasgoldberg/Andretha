<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\TipoDocumentoIdentidad;
use IamSoft\AndrethaBundle\Form\TipoDocumentoIdentidadType;

/**
 * TipoDocumentoIdentidad controller.
 *
 */
class TipoDocumentoIdentidadController extends Controller
{
    /**
     * Lists all TipoDocumentoIdentidad entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:TipoDocumentoIdentidad')->findAll();

        return $this->render('IamSoftAndrethaBundle:TipoDocumentoIdentidad:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a TipoDocumentoIdentidad entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:TipoDocumentoIdentidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoDocumentoIdentidad entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:TipoDocumentoIdentidad:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new TipoDocumentoIdentidad entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoDocumentoIdentidad();
        $form   = $this->createForm(new TipoDocumentoIdentidadType(), $entity);

        return $this->render('IamSoftAndrethaBundle:TipoDocumentoIdentidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new TipoDocumentoIdentidad entity.
     *
     */
    public function createAction()
    {
        $entity  = new TipoDocumentoIdentidad();
        $request = $this->getRequest();
        $form    = $this->createForm(new TipoDocumentoIdentidadType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipodocumentoidentidad_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:TipoDocumentoIdentidad:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing TipoDocumentoIdentidad entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:TipoDocumentoIdentidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoDocumentoIdentidad entity.');
        }

        $editForm = $this->createForm(new TipoDocumentoIdentidadType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:TipoDocumentoIdentidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing TipoDocumentoIdentidad entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:TipoDocumentoIdentidad')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoDocumentoIdentidad entity.');
        }

        $editForm   = $this->createForm(new TipoDocumentoIdentidadType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipodocumentoidentidad_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:TipoDocumentoIdentidad:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TipoDocumentoIdentidad entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:TipoDocumentoIdentidad')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoDocumentoIdentidad entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipodocumentoidentidad'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
