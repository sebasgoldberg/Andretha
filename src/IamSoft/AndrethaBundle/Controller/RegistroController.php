<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\Registro;
use IamSoft\AndrethaBundle\Form\RegistroType;

/**
 * Registro controller.
 *
 */
class RegistroController extends Controller
{
    /**
     * Lists all Registro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:Registro')->findAll();

        return $this->render('IamSoftAndrethaBundle:Registro:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Registro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Registro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Registro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Registro:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Registro entity.
     *
     */
    public function newAction()
    {
        $entity = new Registro();
        $form   = $this->createForm(new RegistroType(), $entity);

        return $this->render('IamSoftAndrethaBundle:Registro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Registro entity.
     *
     */
    public function createAction()
    {
        $entity  = new Registro();
        $request = $this->getRequest();
        $form    = $this->createForm(new RegistroType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registro_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:Registro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Registro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Registro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Registro entity.');
        }

        $editForm = $this->createForm(new RegistroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Registro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Registro entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Registro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Registro entity.');
        }

        $editForm   = $this->createForm(new RegistroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('registro_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:Registro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Registro entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:Registro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Registro entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('registro'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
