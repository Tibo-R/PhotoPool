<?php

namespace PhotoPool\PoolBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PhotoPool\PoolBundle\Entity\Gallery;
use PhotoPool\PoolBundle\Form\GalleryType;

/**
 * Gallery controller.
 *
 * @Route("/gallery")
 */
class GalleryController extends Controller
{
    /**
     * Lists all Gallery entities.
     *
     * @Route("/", name="gallery")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('PhotoPoolPoolBundle:Gallery')->findAll();

        return array('entities' => $entities);
    }

    /**
     * Finds and displays a Gallery entity.
     *
     * @Route("/{id}/show", name="gallery_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('PhotoPoolPoolBundle:Gallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gallery entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

    /**
     * Displays a form to create a new Gallery entity.
     *
     * @Route("/new", name="gallery_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Gallery();
        $form   = $this->createForm(new GalleryType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Gallery entity.
     *
     * @Route("/create", name="gallery_create")
     * @Method("post")
     * @Template("PhotoPoolPoolBundle:Gallery:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new Gallery();
        $request = $this->getRequest();
        $form    = $this->createForm(new GalleryType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gallery_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Gallery entity.
     *
     * @Route("/{id}/edit", name="gallery_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('PhotoPoolPoolBundle:Gallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gallery entity.');
        }

        $editForm = $this->createForm(new GalleryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Gallery entity.
     *
     * @Route("/{id}/update", name="gallery_update")
     * @Method("post")
     * @Template("PhotoPoolPoolBundle:Gallery:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('PhotoPoolPoolBundle:Gallery')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gallery entity.');
        }

        $editForm   = $this->createForm(new GalleryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gallery_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Gallery entity.
     *
     * @Route("/{id}/delete", name="gallery_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('PhotoPoolPoolBundle:Gallery')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Gallery entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gallery'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
