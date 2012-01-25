<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\Emprendimiento;
use IamSoft\AndrethaBundle\Form\EmprendimientoType;

/**
 * Emprendimiento controller.
 *
 */
class EmprendimientoController extends Controller
{
    /**
     * Lists all Emprendimiento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:Emprendimiento')->findAll();

        return $this->render('IamSoftAndrethaBundle:Emprendimiento:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Emprendimiento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Emprendimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emprendimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Emprendimiento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Emprendimiento entity.
     *
     */
    public function newAction()
    {
        $entity = new Emprendimiento();
        $form   = $this->createForm(new EmprendimientoType(), $entity);

        return $this->render('IamSoftAndrethaBundle:Emprendimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Emprendimiento entity.
     *
     */
    public function createAction()
    {
        $entity  = new Emprendimiento();
        $request = $this->getRequest();
        $form    = $this->createForm(new EmprendimientoType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('emprendimiento_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:Emprendimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Emprendimiento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Emprendimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emprendimiento entity.');
        }

        $editForm = $this->createForm(new EmprendimientoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Emprendimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Emprendimiento entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Emprendimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Emprendimiento entity.');
        }

        $editForm   = $this->createForm(new EmprendimientoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('emprendimiento_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:Emprendimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Emprendimiento entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:Emprendimiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Emprendimiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('emprendimiento'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
