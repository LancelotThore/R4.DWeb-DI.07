<?php

/* indique où "vit" ce fichier */
namespace App\Controller;

/* indique l'utilisation du bon bundle pour gérer nos routes */
use stdClass;
use App\Entity\Lego as Lego;
use App\Repository\LegoRepository;
use App\Service\CreditsGenerator;
use App\Service\DatabaseInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/* le nom de la classe doit être cohérent avec le nom du fichier */
class LegoController extends AbstractController
{

    public function __construct(private LegoRepository $legoRepository) {}

    #[Route('/', )]
    public function homeAll(): Response
    {
        return $this->render("lego.html.twig", [
            'legos' => $this->legoRepository->findAll(),
            'collection' =>$this->legoRepository->findAllCollections(),
        ]);
    }


    #[Route('/{collection}', 'filter_by_collection', requirements: ['collection' => 'Creator|Star Wars|Creator Expert|Harry Potter'])]
    public function filter($collection, LegoRepository $legoRepository): Response
    {
        return $this->render("lego.html.twig", [
            'legos' => $legoRepository->findByCollection($collection),
            'collection' =>$legoRepository->findAllCollections(),
        ]);
    }


    #[Route('/credits', 'credits')]
    public function credits(CreditsGenerator $credits): Response
    {
        return new Response($credits->getCredits());
    }

    
    #[Route('/test', 'test')]
    public function test(EntityManagerInterface $entityManager): Response
    {
        $l = new Lego(1234);
        $l->setName("un beau Lego");
        $l->setCollection("Lego espace");
        $l->setDescription("Bonjour, c'est un beau lego !");
        $l->setPrice(499.99);
        $l->setPieces(1);
        $l->setBoxImage("./unFondDeBeauLego.jpg");
        $l->setLegoImage("./unBeauLego.jpg");

        $entityManager->persist($l);
        $entityManager->flush();

        return new Response('Lego saved with id : '.$l->getId());
    }
}