<?php

namespace App\Controller;

use App\Entity\Disque;
use App\Repository\GenreRepository;
use App\Repository\DisqueRepository;
use App\Repository\OrdersRepository;
use App\Repository\ArtisteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VinylController extends AbstractController
{
    #[Route('/vinyl', name: 'app_vinyl')]
    public function index(DisqueRepository $disqueRepository, ArtisteRepository $artisteRepository, GenreRepository $genreRepository): Response
    {
        $disque = $disqueRepository->findAll();
        $artiste = $artisteRepository->findAll();
        $genre = $genreRepository->findAll();
        return $this->render('pages/vinyl/vinyl.html.twig', [
            'disques'=> $disque,
            'artistes'=> $artiste,
            'genres'=> $genre
        ]);
    }

    #[Route('/vinyl/{id}', name:'app_vinyl_show', methods: ['GET'])]
    public function show(Disque $disque): Response
    {
        return $this->render('pages/vinyl/show.html.twig', [
            'disque' => $disque
        ]);
    }
}
