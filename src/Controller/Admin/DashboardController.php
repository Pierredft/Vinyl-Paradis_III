<?php

namespace App\Controller\Admin;

use App\Entity\Disque;
use App\Entity\Artiste;
use App\Entity\Genre;
use App\Entity\Images;
use App\Entity\NewImg;
use App\Entity\TopMonth;
use App\Entity\TopSong;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ArtisteCrudController::class)->generateUrl();

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('VinylParadise III');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Retour sur le site', 'fas fa-home', 'home.index');
        yield MenuItem::linkToCrud('Artiste','fas fa-palette',Artiste::class);
        yield MenuItem::linkToCrud('Disque', 'fas fa-compact-disc', Disque::class);
        yield MenuItem::linkToCrud('Top 5','fas fa-music', TopSong::class);
        yield MenuItem::linkToCrud('Genre','fas fa-icons', Genre::class);
        yield MenuItem::linkToCrud('Top Mois','fas fa-calendar', TopMonth::class);
    }
}
