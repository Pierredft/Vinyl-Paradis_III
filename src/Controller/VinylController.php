<?php

namespace App\Controller;

use App\Repository\ArtisteRepository;
use App\Repository\DisqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VinylController extends AbstractController
{
    #[Route('/vinyl', name: 'app_vinyl')]
    public function index(DisqueRepository $disqueRepository, ArtisteRepository $artisteRepository): Response
    {
        $disque = $disqueRepository->findAll();
        $artiste = $artisteRepository->findAll();
        return $this->render('vinyl/index.html.twig', [
            'disques'=> $disque,
            'artistes'=> $artiste
        ]);
    }
}
