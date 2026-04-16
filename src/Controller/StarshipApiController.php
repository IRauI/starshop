<?php

namespace App\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods:['GET'])]
    //autowired LoggerInterface, works in Controller methods and __construct of any service
    //all services live in the SERVICE CONTAINER
    public function getCollection(StarshipRepository $repository): Response
    {
        $starships = $repository->findAll();

        //return new Response(json_encode($starships))
        return $this->json($starships);
    }

    //id is dynamic
    #[Route('/{id<\d+>}', methods:['GET'])]
    public function get(int $id, StarshipRepository $repository): Response
    {
        $starship= $repository->find($id);

        if(!$starship)
        {
            throw $this->createNotFoundException("Starship not found");
        }

        return $this->json($starship);
    }
}