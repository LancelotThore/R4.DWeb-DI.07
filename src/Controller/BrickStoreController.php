<?php

/* indique où "vit" ce fichier */
namespace App\Controller;


/* indique l'utilisation du bon bundle pour gérer nos routes */

use stdClass;
use App\Entity\Brique as Brique;
use App\Entity\BriquesCategories;
use App\Repository\BriquesCategoriesRepository;
use App\Repository\BriqueRepository;
use App\Service\CreditsGenerator;
use App\Service\DatabaseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BrickStoreController extends AbstractController
{
    public function __construct(private BriqueRepository $briqueRepository, private BriquesCategoriesRepository $briquesCategoriesRepository) {}


    #[Route('/Brick_Store',)]
    public function brickstore(): Response
    {
        return $this->render("brickstore.html.twig", [
            'briques' => $this->briqueRepository->findAll(),
            'categories' =>$this->briquesCategoriesRepository->findAll(),
        ]);
    }

    #[Route('/{id}', 'filter_by_brick', requirements: ['name' => 'Figurines|Nature|Meubles'])]
    public function filter($id, BriquesCategories $briquesCategories): Response
    {
        return $this->render("brickstore.html.twig", [
            'briques' => $briquesCategories->getBriques(),
            'categories' =>$this->briquesCategoriesRepository->findAll(),
        ]);
    }
}