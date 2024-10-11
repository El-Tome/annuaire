<?php

namespace App\Controller;

use App\Repository\PersonneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnnuaireController extends AbstractController
{
    private PersonneRepository $personnesRepository;

    public function __construct(PersonneRepository $personnesRepository)
    {
        $this->personnesRepository = $personnesRepository;
    }

    #[Route('/annuaire', name: 'annuaire_liste_personnes')]
    public function listePersonnes(): Response
    {
        // Récupérer toutes les personnes depuis la base de données
        $personnes = $this->personnesRepository->findAll();

        // Passer les personnes récupérées à la vue pour l'affichage
        return $this->render('annuaire/liste_personnes.html.twig', [
            'personnes' => $personnes,
        ]);
    }
}
