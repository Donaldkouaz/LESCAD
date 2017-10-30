<?php

//Ce controleur est le controleur principal de la plateforme

namespace lescad\platformeBundle\Controller;

use lescad\platformeBundle\Entity\DemandeCours;
use lescad\platformeBundle\Entity\ServiceClient;
use lescad\platformeBundle\Entity\Suggestion;
use lescad\platformeBundle\Entity\DemandeRecrut;
use lescad\platformeBundle\Form\DemandeCoursType;
use lescad\platformeBundle\Form\DemandeRecrutType;
use lescad\platformeBundle\Form\ServiceClientType;
use lescad\platformeBundle\Form\SuggestionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PlatformeController extends Controller {

//    Methode index pour la page d'accueil 
    public function indexAction() {
        return $this->render('lescadplatformeBundle:plateforme:index.html.twig');
    }

    public function servicesAction() {

        $sss = $this->getDoctrine()->getManager()->getRepository('lescadplatformeBundle:Sss')->findAll();
        $categories = $this->getDoctrine()->getManager()->getRepository('lescadplatformeBundle:categorie')->findAllWithFormations();

        return $this->render('lescadplatformeBundle:plateforme:services.html.twig', array('sss' => $sss,
                    'categories' => $categories,));
    }

    public function serviceAction() {
        return $this->render('lescadplatformeBundle:plateforme:service.html.twig');
    }

    public function demandeCoursAction(Request $request) {

        $demande = new DemandeCours();
        $form = $this->createForm(DemandeCoursType::class, $demande)->add('Envoyer la demande', SubmitType::class);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Votre demande a bien été envoyé. Vous serez contacté tres bientot par un agent de votre région.');

            return $this->redirectToRoute('lescadplatforme_services');
        }

        return $this->render('lescadplatformeBundle:plateforme:demande.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

       
    public function RecrutementAction(Request $request) {

        $demande = new DemandeRecrut();
        $form = $this->createForm(DemandeRecrutType::class, $demande)->add('Envoyer la demande', SubmitType::class);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Votre demande a bien été envoyé. Vous serez contacté tres bientot par un agent de votre région.');

            return $this->redirectToRoute('lescadplatforme_services');
        }

        return $this->render('lescadplatformeBundle:plateforme:recrutement.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

    public function formationsAction(Request $request, $page) {

        $demande = new DemandeCours();
        $form = $this->createForm(DemandeCoursType::class, $demande)->add('Envoyer la demande', SubmitType::class);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Votre demande a bien été envoyé. Vous serez contacté tres bientot par un agent de votre région.');

            return $this->redirectToRoute('lescadplatforme_services');
        }

        $nbreParPage = 3;

        $categories = $this->getDoctrine()->getManager()->getRepository('lescadplatformeBundle:categorie')->findAllWithFormations();

        $formations = $this->getDoctrine()->getManager()->getRepository('lescadplatformeBundle:formation')->getAll($page, $nbreParPage);

        // On calcule le nombre total de pages grâce au count($formations) qui retourne le nombre total de formation
        $nbrePages = ceil(count($formations) / $nbreParPage);

        // Si la page n'existe pas, on retourne une 404
        if ($nbrePages != 0 and $page > $nbrePages) {
            throw $this->createNotFoundException("Désolé ! La page " . $page . " n'existe pas.");
        }

        return $this->render('lescadplatformeBundle:plateforme:formations.html.twig', array('categories' => $categories,
                    'formations' => $formations,
                    'nbrePages' => $nbrePages,
                    'page' => $page,
                    'form' => $form->createView(),
        ));
    }

    public function formationsCatAction(Request $request, $categorie, $page) {
        
        $demande = new DemandeCours();
        $form = $this->createForm(DemandeCoursType::class, $demande)->add('Envoyer la demande', SubmitType::class);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Votre demande a bien été envoyé. Vous serez contacté tres bientot par un agent de votre région.');

            return $this->redirectToRoute('lescadplatforme_services');
        }
        
        $nbreParPage = 2;
        $categories = $this->getDoctrine()->getManager()->getRepository('lescadplatformeBundle:categorie')->findAllWithFormations();

        $formations = $this->getDoctrine()->getManager()->getRepository('lescadplatformeBundle:formation')->findByCat($categorie, $page, $nbreParPage);

        // On calcule le nombre total de pages grâce au count($formations) qui retourne le nombre total de formation
        $nbrePages = ceil(count($formations) / $nbreParPage);

        // Si la page n'existe pas, on retourne une 404
        if ($nbrePages != 0 and $page > $nbrePages) {
            throw $this->createNotFoundException("Désolé ! La page " . $page . " n'existe pas.");
        }

        return $this->render('lescadplatformeBundle:plateforme:formations.html.twig', array('categories' => $categories,
                    'formations' => $formations,
                    'nbrePages' => $nbrePages,
                    'page' => $page,
                    'form' => $form->createView(),
                    'categorie' => $categorie,));
    }

    public function formationAction(Request $request, $formationSlug) {


        $formation = $this->getDoctrine()->getManager()->getRepository('lescadplatformeBundle:formation')->findOneBySlug($formationSlug);

        // Si la page n'existe pas, on retourne une 404
        if ($formation == NULL) {
            throw $this->createNotFoundException("Désolé ! Cette formation n'existe pas encore sur le site.");
        }

        $demande = new DemandeCours();
        $for = $formation->getNom();
       $message = 'Bonjour, je suis interressé par la formation "'.$for.'" que vous proposez. Veuillez me recontacter, aux coordonnées indiquées. Je souhaite avoir plus d\'informations sur cette formation.';
        $demande->setMessage($message);
        $form = $this->createForm(DemandeCoursType::class, $demande)->add('Envoyer la demande', SubmitType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Votre demande a bien été envoyé. Vous serez contacté tres bientot par un agent de votre région.');

        }

        return $this->render('lescadplatformeBundle:plateforme:formation.html.twig', array('formation' => $formation,
                    'form' => $form->createView(),
        ));
    }

    public function ssAction() {

        $sss = $this->getDoctrine()->getManager()->getRepository('lescadplatformeBundle:Sss')->findAll();

        return $this->render('lescadplatformeBundle:plateforme:ss.html.twig', array('sss' => $sss));
    }

    public function sssAction(Request $request, $sssSlug) {
        $sss = $this->getDoctrine()->getManager()->getRepository('lescadplatformeBundle:Sss')->findOneBySlug($sssSlug);

        $categories = $this->getDoctrine()->getManager()->getRepository('lescadplatformeBundle:Sss')->findAll();
//        // Si la page n'existe pas, on retourne une 404
        if ($sss == NULL) {
            throw $this->createNotFoundException("Désolé ! Cette offre n'existe pas encore sur le site.");
        }


        $demande = new DemandeCours();
        $service = $sss->getNom();
        $message = 'Bonjour, je suis interressé par votre service : '.$service.'. Veuillez me recontacter, aux coordonnées indiquées. Je souhaite avoir plus d\'informations sur ce service.';
        $demande->setMessage($message);
        $form = $this->createForm(DemandeCoursType::class, $demande)->add('Envoyer la demande', SubmitType::class);
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Votre demande a bien été envoyé. Vous serez contacté tres bientot par un agent de votre région.');

            return $this->redirectToRoute('lescadplatforme_services');
        }

        return $this->render('lescadplatformeBundle:plateforme:sss.html.twig', array('sss' => $sss,
                    'categories' => $categories,
                    'form' => $form->createView(),
        ));
    }
    
        public function ServiceClientAction(Request $request) {

        $demande = new ServiceClient();
        $form = $this->createForm(ServiceClientType::class, $demande)->add('Envoyer la requette', SubmitType::class);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Votre demande a bien été envoyé. Vous serez contacté tres bientot par un agent de votre région.');

            return $this->redirectToRoute('lescadplatforme_services');
            
        }
        
        return $this->render('lescadplatformeBundle:plateforme:serviceclient.html.twig', array(
                    'form' => $form->createView(),
        ));
    }
        
        public function SuggestionAction(Request $request) {

        $demande = new Suggestion();
        $form = $this->createForm(SuggestionType::class, $demande)->add('Envoyer la suggestion', SubmitType::class);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demande);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Votre demande a bien été envoyé. Vous serez contacté tres bientot par un agent de votre région.');

            return $this->redirectToRoute('lescadplatforme_services');
        }

        return $this->render('lescadplatformeBundle:plateforme:suggestion.html.twig', array(
                    'form' => $form->createView(),
        ));
    }
}
