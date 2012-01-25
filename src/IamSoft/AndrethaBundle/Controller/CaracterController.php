<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\Caracter;
use IamSoft\AndrethaBundle\Form\CaracterType;

/**
 * Caracter controller.
 *
 */
class CaracterController extends Controller
{
    /**
     * Lists all Caracter entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:Caracter')->findAll();

        return $this->render('IamSoftAndrethaBundle:Caracter:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Caracter entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Caracter')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracter entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Caracter:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Caracter entity.
     *
     */
    public function newAction()
    {
        $entity = new Caracter();
        $form   = $this->createForm(new CaracterType(), $entity);

        return $this->render('IamSoftAndrethaBundle:Caracter:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Caracter entity.
     *
     */
    public function createAction()
    {
        $entity  = new Caracter();
        $request = $this->getRequest();
        $form    = $this->createForm(new CaracterType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caracter_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:Caracter:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Caracter entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Caracter')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracter entity.');
        }

        $editForm = $this->createForm(new CaracterType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Caracter:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Caracter entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Caracter')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Caracter entity.');
        }

        $editForm   = $this->createForm(new CaracterType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caracter_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:Caracter:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Caracter entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:Caracter')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Caracter entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('caracter'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
