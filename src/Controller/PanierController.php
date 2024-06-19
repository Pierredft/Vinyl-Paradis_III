<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Disque;
use App\Entity\Artiste;
use App\Repository\GenreRepository;
use App\Repository\DisqueRepository;
use App\Repository\ArtisteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;

class PanierController extends AbstractController
{
    #[Route('/panier', name: 'app_panier')]
    public function index(SessionInterface $session, DisqueRepository $disqueRepository): Response
    {
        $panier = $session->get('panier', []);
        $data = [];
        $total = 0;
        $totalQuantity = 0;

        foreach ($panier as $id => $quantite) {
            $disque = $disqueRepository->find($id);
            // $artiste = $artisteRepository->find($id);
            // $genre = $genreRepository->find($id);
            $data[] = [
                'disque' => $disque,
                // 'artiste' => $artiste,
                // 'genre' => $genre,
                'quantite' => $quantite
            ];
            $total += $disque->getPrice() * $quantite;
            $totalQuantity += $quantite;
        }
    {
        return $this->render('panier/index.html.twig',compact('data', 'total','totalQuantity'));
    }
}

#[Route('/add/{id}', name: 'add')]
        public function add(Disque $disque, SessionInterface $session)
        {
            //on récupere l'id du produit
            $id = $disque->getId();
            // $id = $artiste->getId();
            // $id = $genre->getId();
            //on récupere le panier existant
            $panier = $session->get('panier', []);
            
            //on ajoute le produit dans la session panier si il n'y est pas encore
            //sinon on augmente la quantité
            if(empty($panier[$id])){
                $panier[$id] =1;
            }else{
                $panier[$id]++;
            }
            $session->set('panier', $panier);
            //on redirige vers la page panier
            return $this->redirectToRoute('app_panier');
        }

        #[Route('/remove/{id}', name: 'remove')]
        public function remove(Disque $disque, SessionInterface $session)
        {
            //on récupere l'id du produit
            $id = $disque->getId();

            //on récupere le panier existant
            $panier = $session->get('panier', []);
            
            //on retire le produit dans la session panier si il n'y qu'un seul produit
            //sinon on decremente la quantité
            if(!empty($panier[$id])){
                if($panier[$id] > 1){
                    $panier[$id]--;
            }else{
                unset($panier[$id]);
            }
        }

            $session->set('panier', $panier);
            
            //on redirige vers la page panier
            return $this->redirectToRoute('app_panier');
        }

        #[Route('/delete/{id}', name: 'delete')]
        public function delete(Disque $disque, SessionInterface $session)
        {
            //on récupere l'id du produit
            $id = $disque->getId();

            //on récupere le panier existant
            $panier = $session->get('panier', []);
            
            if(!empty($panier[$id])){
                unset($panier[$id]);
            }

            $session->set('panier', $panier);
            
            //on redirige vers la page panier
            return $this->redirectToRoute('app_panier');
        }

        #[Route('/empty', name: 'empty')]
        public function empty(SessionInterface $session)
        {
            $session->remove('panier');
            
            //on redirige vers la page panier
            return $this->redirectToRoute('app_panier');
        }
}