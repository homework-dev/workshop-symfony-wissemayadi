<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Repository\VoitureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoitureController extends AbstractController
{
    /**
     * @Route("/voiture", name="voiture")
     */
    public function index(): Response
    {
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }

    /**
     * @Route("/listvoiture", name="listvoiture")
     */
    public function listvoiture()
    {
        $voiture = $this->getDoctrine()->getRepository(Voiture::class)->findAll();
        return $this->render("voiture/list.html.twig", array("tabVoiture" => $voiture
            )
        );
    }

    /**
     * @Route("/deleteVoiture/{id}", name="deleteVoiture")
     */
    public function deleteVoiture($id)
    {
        $em = $this->getDoctrine()->getManager();
        $prop = $this->getDoctrine()->getRepository(Voiture::class)->find($id);
        $em->remove($prop);
        $em->flush();

        return $this->redirectToRoute("listvoiture");
    }

    /**
     * @Route("/countVoiture/{marque}", name="countV")
     */
    public function countVoiture($marque)
    {
        $voitures = $this->getDoctrine()->getRepository(Voiture::class)->findAll();
        $count = $this->getDoctrine()->getRepository(Voiture::class)->searchVoiture($marque);
        return $this->render('voiture/list.html.twig', array('count' => $count, 'tabVoiture' => $voitures, 'marque' => $marque));



    }
}
