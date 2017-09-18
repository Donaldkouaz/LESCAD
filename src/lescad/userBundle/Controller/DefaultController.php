<?php

namespace lescad\userBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('lescaduserBundle:Default:index.html.twig');
    }
}
