<?php

namespace SkinnyBundle\Controller;

use SkinnyBundle\Entity\Map;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Map controller.
 *
 */
class MapController extends Controller
{
    /**
     * Lists all map entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $maps = $em->getRepository('SkinnyBundle:Map')->findAll();

        return $this->render('SkinnyBundle:map:index.html.twig', array(
            'maps' => $maps,
        ));
    }

    /**
     * Creates a new map entity.
     *
     */
    public function newAction(Request $request)
    {
        $map = new Map();
        $form = $this->createForm('SkinnyBundle\Form\MapType', $map);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($map);
            $em->flush($map);

            return $this->redirectToRoute('map_show', array('id' => $map->getId()));
        }

        return $this->render('SkinnyBundle:map:new.html.twig', array(
            'map' => $map,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a map entity.
     *
     */
    public function showAction(Map $map)
    {
        $deleteForm = $this->createDeleteForm($map);

        return $this->render('SkinnyBundle:map:show.html.twig', array(
            'map' => $map,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing map entity.
     *
     */
    public function editAction(Request $request, Map $map)
    {
        $deleteForm = $this->createDeleteForm($map);
        $editForm = $this->createForm('SkinnyBundle\Form\MapType', $map);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('map_edit', array('id' => $map->getId()));
        }

        return $this->render('SkinnyBundle:map:edit.html.twig', array(
            'map' => $map,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a map entity.
     *
     */
    public function deleteAction(Request $request, Map $map)
    {
        $form = $this->createDeleteForm($map);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($map);
            $em->flush($map);
        }

        return $this->redirectToRoute('map_index');
    }

    /**
     * Creates a form to delete a map entity.
     *
     * @param Map $map The map entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Map $map)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('map_delete', array('id' => $map->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
