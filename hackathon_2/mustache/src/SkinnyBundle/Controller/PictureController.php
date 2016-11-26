<?php

namespace SkinnyBundle\Controller;

use SkinnyBundle\Entity\Picture;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Picture controller.
 *
 */
class PictureController extends Controller
{
    /**
     * Lists all picture entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pictures = $em->getRepository('SkinnyBundle:Picture')->findAll();

        return $this->render('SkinnyBundle:picture:index.html.twig', array(
            'pictures' => $pictures,
        ));
    }

    /**
     * Creates a new picture entity.
     *
     */
    public function newAction(Request $request)
    {
        $picture = new Picture();
        $form = $this->createForm('SkinnyBundle\Form\PictureType', $picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($picture);
            $em->flush($picture);

            return $this->redirectToRoute('picture_show', array('id' => $picture->getId()));
        }

        return $this->render('SkinnyBundle:picture:new.html.twig', array(
            'picture' => $picture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a picture entity.
     *
     */
    public function showAction(Picture $picture)
    {
        $deleteForm = $this->createDeleteForm($picture);

        return $this->render('SkinnyBundle:picture:show.html.twig', array(
            'picture' => $picture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing picture entity.
     *
     */
    public function editAction(Request $request, Picture $picture)
    {
        $deleteForm = $this->createDeleteForm($picture);
        $editForm = $this->createForm('SkinnyBundle\Form\PictureType', $picture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('picture_edit', array('id' => $picture->getId()));
        }

        return $this->render('SkinnyBundle:picture:edit.html.twig', array(
            'picture' => $picture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a picture entity.
     *
     */
    public function deleteAction(Request $request, Picture $picture)
    {
        $form = $this->createDeleteForm($picture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($picture);
            $em->flush($picture);
        }

        return $this->redirectToRoute('picture_index');
    }

    /**
     * Creates a form to delete a picture entity.
     *
     * @param Picture $picture The picture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Picture $picture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('picture_delete', array('id' => $picture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
