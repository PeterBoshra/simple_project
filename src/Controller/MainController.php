<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="app_main")
     */
    public function index(PaginatorInterface $paginator, Request $request)
    {

        $productQuery = $this->entityManager->getRepository(Product::class)->findAllQueryBuilder();
        $pagination = $paginator->paginate(
            $productQuery,
            $request->query->getInt('page', 1), /*page number*/
            10
        );
        return $this->render('main.html.twig', ['pagination' => $pagination]);
    }
}
