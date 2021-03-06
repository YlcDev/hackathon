<?php

namespace SkinnyBundle\Controller;

use SkinnyBundle\Entity\Accueil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SkinnyBundle\Form\AccueilType;


/**
 * Accueil controller.
 *
 */
class AccueilController extends Controller
{
    /**
     * Lists all accueil entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $accueils = $em->getRepository('SkinnyBundle:Accueil')->findAll();

        return $this->render('SkinnyBundle:accueil:index.html.twig', array(
            'accueils' => $accueils,
        ));
    }

    /**
     * Creates a new accueil entity.
     *
     */
    public function newAction(Request $request)
    {
        $accueil = new Accueil();
        $form = $this->createForm('SkinnyBundle\Form\AccueilType', $accueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($accueil);
            $em->flush($accueil);

            return $this->redirectToRoute('accueil_show', array('id' => $accueil->getId()));
        }

        return $this->render('SkinnyBundle:accueil:new.html.twig', array(
            'accueil' => $accueil,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a accueil entity.
     *
     */
    public function showAction(Accueil $accueil)
    {
        $deleteForm = $this->createDeleteForm($accueil);

        return $this->render('SkinnyBundle:accueil:show.html.twig', array(
            'accueil' => $accueil,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing accueil entity.
     *
     */
    public function editAction(Request $request, Accueil $accueil)
    {
        $deleteForm = $this->createDeleteForm($accueil);
        $editForm = $this->createForm('SkinnyBundle\Form\AccueilType', $accueil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('accueil_edit', array('id' => $accueil->getId()));
        }

        return $this->render('SkinnyBundle:accueil:edit.html.twig', array(
            'accueil' => $accueil,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a accueil entity.
     *
     */
    public function deleteAction(Request $request, Accueil $accueil)
    {
        $form = $this->createDeleteForm($accueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($accueil);
            $em->flush($accueil);
        }

        return $this->redirectToRoute('accueil_index');
    }

    /**
     * Creates a form to delete a accueil entity.
     *
     * @param Accueil $accueil The accueil entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Accueil $accueil)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accueil_delete', array('id' => $accueil->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
