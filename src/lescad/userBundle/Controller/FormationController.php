<?php

namespace lescad\userBundle\Controller;

use lescad\platformeBundle\Entity\matiere;
use lescad\platformeBundle\Entity\categorie;
use lescad\platformeBundle\Entity\formation;
use lescad\platformeBundle\Form\matiereType;
use lescad\platformeBundle\Form\categorieType;
use lescad\platformeBundle\Form\formationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class FormationController extends Controller
{
    public function addmatiereAction(Request $request)
    {

        // On crée un objet matiere
    $matiere = new Matiere();
    
        // J'ai raccourci cette partie, car c'est plus rapide à écrire !
        $form = $this->createForm(matiereType::class, $matiere)
        ->add('Enregistrer',      SubmitType::class);
    
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $matiere contient les valeurs entrées dans le formulaire.
          $form->handleRequest($request);

          if ($form->isValid()) {
            // On enregistre notre objet $matiere dans la base de données.
            $em = $this->getDoctrine()->getManager();
            $em->persist($matiere);
            $em->flush();
    
            $request->getSession()->getFlashBag()->add('notice', 'Matière bien enregistrée.');

            return $this->redirectToRoute('fos_user_profile_show');
          }
        }
        return $this->render('lescaduserBundle:Matiere:edit_matiere.html.twig', array(
          'form' => $form->createView(),
        ));       
    }

    public function addcategorieAction(Request $request)
    {

        // On crée un objet Categorie
    $categorie = new Categorie();
    
        // J'ai raccourci cette partie, car c'est plus rapide à écrire !
        $form = $this->createForm(categorieType::class, $categorie);
        $form->add('Enregistrer',      SubmitType::class);
    
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $categorie contient les valeurs entrées dans le formulaire.
          $form->handleRequest($request);

          if ($form->isValid()) {
            // On enregistre notre objet $categorie dans la base de données.
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
    
            $request->getSession()->getFlashBag()->add('notice', 'Categorie bien enregistrée.');

            return $this->redirectToRoute('fos_user_profile_show');
          }
        }
        return $this->render('lescaduserBundle:Categorie:edit_categorie.html.twig', array(
          'form' => $form->createView(),
        ));       
    }

    public function addformationAction(Request $request)
    {

        // On crée un objet formation
    $formation = new Formation();
    
        // J'ai raccourci cette partie, car c'est plus rapide à écrire !
        $form = $this->createForm(formationType::class, $formation);
        $form->add('Enregistrer',      SubmitType::class);
    
        // Si la requête est en POST
        if ($request->isMethod('POST')) {
          // On fait le lien Requête <-> Formulaire
          // À partir de maintenant, la variable $formation contient les valeurs entrées dans le formulaire.
          $form->handleRequest($request);

          if ($form->isValid()) {
            // On enregistre notre objet $formation dans la base de données.
            $em = $this->getDoctrine()->getManager();
            $em->persist($formation);
            $em->flush();
    
            $request->getSession()->getFlashBag()->add('notice', 'Formation bien enregistrée.');

            return $this->redirectToRoute('fos_user_profile_show');
          }
        }
        return $this->render('lescaduserBundle:Formation:edit_formation.html.twig', array(
          'form' => $form->createView(),
        ));       
    }
}
