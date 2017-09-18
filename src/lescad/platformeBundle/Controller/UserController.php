<?php

namespace lescad\platformeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function menuHautAction()
    {
        return $this->render('lescadplatformeBundle:User:menuHaut.html.twig');
    }

    public function indexAction()
    {
        return $this->render('lescadplatformeBundle:plateforme:index.html.twig');
    }

    public function servicesAction()
    {
        return $this->render('lescadplatformeBundle:plateforme:services.html.twig');
    }

    public function serviceAction()
    {
        return $this->render('lescadplatformeBundle:plateforme:service.html.twig');
    }

    public function clientAction()
    {
        return $this->render('lescadplatformeBundle:plateforme:client.html.twig');
    }

    public function recrutementAction()
    {
        return $this->render('lescadplatformeBundle:plateforme:recrutement.html.twig');
    }
}
