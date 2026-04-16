<?php

namespace App\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships')]
    //autowired LoggerInterface, works in Controller methods and __construct of any service
    //all services live in the SERVICE CONTAINER
    public function getCollection(StarshipRepository $repository): Response
    {
        $starships = $repository->findAll();

        //return new Response(json_encode($starships))
        return $this->json($starships);
    }

    public function get(): Response
    {
        
    }
}