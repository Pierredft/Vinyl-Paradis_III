<?php

namespace App\Controller;

use App\Repository\TopSongRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', 'home.index', methods: ['GET'])]
    public function index(TopSongRepository $topSongRepository): Response
    {
        $topSong = $topSongRepository->findAll();
        return $this->render('home.html.twig',[
            'topSongs' => $topSong,
        ]);
    }
}


?>