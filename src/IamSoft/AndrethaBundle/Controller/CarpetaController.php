<?php

namespace IamSoft\AndrethaBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use IamSoft\AndrethaBundle\Entity\Carpeta;
use IamSoft\AndrethaBundle\Form\CarpetaType;
use IamSoft\AndrethaBundle\Form\CarpetaUpdateType;

/**
 * Carpeta controller.
 *
 */
class CarpetaController extends Controller
{
    /**
     * Lists all Carpeta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('IamSoftAndrethaBundle:Carpeta')->findAll();

        return $this->render('IamSoftAndrethaBundle:Carpeta:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Carpeta entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Carpeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Carpeta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Carpeta:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Carpeta entity.
     *
     */
    public function newAction()
    {
        $entity = new Carpeta();

        /*
        $em = $this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('IamSoftAndrethaBundle:Carpeta');
        $entity->setNumeroReferencia(
        	$repository->getMaxNumeroReferencia(
        		$entity->getTipoCarpeta()) + 1);
        		*/
        
        $form   = $this->createForm(new CarpetaType(), $entity);

        return $this->render('IamSoftAndrethaBundle:Carpeta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Carpeta entity.
     *
     */
    public function createAction()
    {
        $entity  = new Carpeta();
        $request = $this->getRequest();
        $form    = $this->createForm(new CarpetaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('carpeta_show', array('id' => $entity->getId())));
            
        }

        /*
        $em = $this->getDoctrine()->getEntityManager();
        $repository=$em->getRepository('IamSoftAndrethaBundle:Carpeta');
        if ($entity->getNumeroReferencia()==0 || $entity->getNumeroReferencia()==null)
	        $entity->setNumeroReferencia(
	        	$repository->getMaxNumeroReferencia(
	        		$entity->getTipoCarpeta()) + 1);
	        		*/
        
        return $this->render('IamSoftAndrethaBundle:Carpeta:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Carpeta entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Carpeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Carpeta entity.');
        }

        $editForm = $this->createForm(new CarpetaUpdateType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('IamSoftAndrethaBundle:Carpeta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Carpeta entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('IamSoftAndrethaBundle:Carpeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Carpeta entity.');
        }

        $editForm = $this->createForm(new CarpetaType(), $entity);
        
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('carpeta_edit', array('id' => $id)));
        }

        return $this->render('IamSoftAndrethaBundle:Carpeta:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Carpeta entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('IamSoftAndrethaBundle:Carpeta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Carpeta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('carpeta'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    public function getNextNumeroReferenciaAction($idTipoCarpeta)
    {
    		if ($idTipoCarpeta<=0)
    			return new Response("");

        $em = $this->getDoctrine()->getEntityManager();
        
        $repository=$em->getRepository('IamSoftAndrethaBundle:Carpeta');
        
				$maxNumeroReferencia = $repository->getMaxNumeroReferencia($idTipoCarpeta);

				return new Response($maxNumeroReferencia+1);
    }
}
