<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\Libro;
use IamSoft\AndrethaBundle\Form\LibroType;

/**
 * Libro controller.
 *
 */
class LibroController extends Controller
{
    /**
     * Lists all Libro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:Libro')->findAll();

        return $this->render('IamSoftAndrethaBundle:Libro:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Libro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Libro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Libro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Libro:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Libro entity.
     *
     */
    public function newAction()
    {
    		$em = $this->getDoctrine()->getEntityManager();
				$librosRepository = $em->getRepository('IamSoftAndrethaBundle:Libro');
    	
        $entity = new Libro();
        $entity->setNumero($librosRepository->findOneByMaxNumero()+1);        

        $form   = $this->createForm(new LibroType(), $entity);

        return $this->render('IamSoftAndrethaBundle:Libro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Libro entity.
     *
     */
    public function createAction()
    {
        $entity  = new Libro();
        $request = $this->getRequest();
        $form    = $this->createForm(new LibroType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('libro_show', array('id' => $entity->getId())));
            
        }

        return $this->render('IamSoftAndrethaBundle:Libro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Libro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Libro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Libro entity.');
        }

        $editForm = $this->createForm(new LibroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Libro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Libro entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Libro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Libro entity.');
        }

        $editForm   = $this->createForm(new LibroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('libro_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:Libro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Libro entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:Libro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Libro entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('libro'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
