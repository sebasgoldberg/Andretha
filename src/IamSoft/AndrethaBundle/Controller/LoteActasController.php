<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\LoteActas;
use IamSoft\AndrethaBundle\Form\LoteActasType;

/**
 * LoteActas controller.
 *
 */
class LoteActasController extends Controller
{
    /**
     * Lists all LoteActas entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:LoteActas')->findAll();

        return $this->render('IamSoftAndrethaBundle:LoteActas:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a LoteActas entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:LoteActas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LoteActas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:LoteActas:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new LoteActas entity.
     *
     */
    public function newAction()
    {
        $entity = new LoteActas();
        $form   = $this->createForm(new LoteActasType(), $entity);

        return $this->render('IamSoftAndrethaBundle:LoteActas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new LoteActas entity.
     *
     */
    public function createAction()
    {
        $entity  = new LoteActas();
        $request = $this->getRequest();
        $form    = $this->createForm(new LoteActasType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('loteactas_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:LoteActas:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing LoteActas entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:LoteActas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LoteActas entity.');
        }

        $editForm = $this->createForm(new LoteActasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:LoteActas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing LoteActas entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:LoteActas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LoteActas entity.');
        }

        $editForm   = $this->createForm(new LoteActasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('loteactas_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:LoteActas:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a LoteActas entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:LoteActas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LoteActas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('loteactas'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
