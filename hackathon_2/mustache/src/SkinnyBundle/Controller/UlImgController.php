<?php

namespace SkinnyBundle\Controller;

use SkinnyBundle\Entity\UlImg;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ulimg controller.
 *
 */
class UlImgController extends Controller
{
    /**
     * Lists all ulImg entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ulImgs = $em->getRepository('SkinnyBundle:UlImg')->findAll();

        return $this->render('SkinnyBundle:ulimg:index.html.twig', array(
            'ulImgs' => $ulImgs,
        ));
    }

    /**
     * Creates a new ulImg entity.
     *
     */
    public function newAction(Request $request)
    {
        $ulImg = new Ulimg();
        $form = $this->createForm('SkinnyBundle\Form\UlImgType', $ulImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ulImg);
            $em->flush($ulImg);

            return $this->redirectToRoute('ulimg_show', array('id' => $ulImg->getId()));
        }

        return $this->render('SkinnyBundle:ulimg:new.html.twig', array(
            'ulImg' => $ulImg,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ulImg entity.
     *
     */
    public function showAction(UlImg $ulImg)
    {
        $deleteForm = $this->createDeleteForm($ulImg);

        return $this->render('SkinnyBundle:ulimg:show.html.twig', array(
            'ulImg' => $ulImg,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ulImg entity.
     *
     */
    public function editAction(Request $request, UlImg $ulImg)
    {
        $deleteForm = $this->createDeleteForm($ulImg);
        $editForm = $this->createForm('SkinnyBundle\Form\UlImgType', $ulImg);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ulimg_edit', array('id' => $ulImg->getId()));
        }

        return $this->render('SkinnyBundle:ulimg:edit.html.twig', array(
            'ulImg' => $ulImg,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ulImg entity.
     *
     */
    public function deleteAction(Request $request, UlImg $ulImg)
    {
        $form = $this->createDeleteForm($ulImg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ulImg);
            $em->flush($ulImg);
        }

        return $this->redirectToRoute('ulimg_index');
    }

    /**
     * Creates a form to delete a ulImg entity.
     *
     * @param UlImg $ulImg The ulImg entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UlImg $ulImg)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ulimg_delete', array('id' => $ulImg->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
