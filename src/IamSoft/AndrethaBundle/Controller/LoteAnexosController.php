<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\LoteAnexos;
use IamSoft\AndrethaBundle\Form\LoteAnexosType;

/**
 * LoteAnexos controller.
 *
 */
class LoteAnexosController extends Controller
{
    /**
     * Lists all LoteAnexos entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:LoteAnexos')->findAll();

        return $this->render('IamSoftAndrethaBundle:LoteAnexos:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a LoteAnexos entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:LoteAnexos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LoteAnexos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:LoteAnexos:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new LoteAnexos entity.
     *
     */
    public function newAction()
    {
        $entity = new LoteAnexos();
        $form   = $this->createForm(new LoteAnexosType(), $entity);

        return $this->render('IamSoftAndrethaBundle:LoteAnexos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new LoteAnexos entity.
     *
     */
    public function createAction()
    {
        $entity  = new LoteAnexos();
        $request = $this->getRequest();
        $form    = $this->createForm(new LoteAnexosType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('loteanexos_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:LoteAnexos:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing LoteAnexos entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:LoteAnexos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LoteAnexos entity.');
        }

        $editForm = $this->createForm(new LoteAnexosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:LoteAnexos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing LoteAnexos entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:LoteAnexos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LoteAnexos entity.');
        }

        $editForm   = $this->createForm(new LoteAnexosType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('loteanexos_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:LoteAnexos:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a LoteAnexos entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:LoteAnexos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LoteAnexos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('loteanexos'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
