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
     * @Route("/listvoiture/{marque?}", name="listvoiture")
     */
    public function listvoiture($marque)
    {

        $voiture = $this->getDoctrine()->getRepository(Voiture::class)->findAll();
        $count = $this->getDoctrine()->getRepository(Voiture::class)->searchVoiture($marque);

        return $this->render("voiture/list.html.twig", array("tabVoiture" => $voiture,"count"=>$count, "marque"=>$marque
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
     * @Route("/countVoiture/{marque}", name="countVoiture")
     */
    public function countVoiture($marque)
    {
        $voiture = $this->getDoctrine()->getRepository(Voiture::class)->findAll();
        $count = $this->getDoctrine()->getRepository(Voiture::class)->searchVoiture($marque);
        return $this->render('voiture/marque.html.twig', array('count' => $count, 'tabVoiture' => $voiture,'marque' => $marque));




    }

}
