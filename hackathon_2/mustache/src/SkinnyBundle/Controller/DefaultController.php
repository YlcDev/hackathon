<?php

namespace SkinnyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SkinnyBundle:Default:index.html.twig');
    }
}
