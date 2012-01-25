<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\CarpetaEmprendimiento;
use IamSoft\AndrethaBundle\Form\CarpetaEmprendimientoType;

/**
 * CarpetaEmprendimiento controller.
 *
 */
class CarpetaEmprendimientoController extends Controller
{
    /**
     * Lists all CarpetaEmprendimiento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:CarpetaEmprendimiento')->findAll();

        return $this->render('IamSoftAndrethaBundle:CarpetaEmprendimiento:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a CarpetaEmprendimiento entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:CarpetaEmprendimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CarpetaEmprendimiento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:CarpetaEmprendimiento:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new CarpetaEmprendimiento entity.
     *
     */
    public function newAction()
    {
        $entity = new CarpetaEmprendimiento();
        $form   = $this->createForm(new CarpetaEmprendimientoType(), $entity);

        return $this->render('IamSoftAndrethaBundle:CarpetaEmprendimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new CarpetaEmprendimiento entity.
     *
     */
    public function createAction()
    {
        $entity  = new CarpetaEmprendimiento();
        $request = $this->getRequest();
        $form    = $this->createForm(new CarpetaEmprendimientoType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('carpetaemprendimiento_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:CarpetaEmprendimiento:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing CarpetaEmprendimiento entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:CarpetaEmprendimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CarpetaEmprendimiento entity.');
        }

        $editForm = $this->createForm(new CarpetaEmprendimientoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:CarpetaEmprendimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing CarpetaEmprendimiento entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:CarpetaEmprendimiento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CarpetaEmprendimiento entity.');
        }

        $editForm   = $this->createForm(new CarpetaEmprendimientoType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('carpetaemprendimiento_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:CarpetaEmprendimiento:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a CarpetaEmprendimiento entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:CarpetaEmprendimiento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CarpetaEmprendimiento entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('carpetaemprendimiento'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
