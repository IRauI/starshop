<?php

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;

class StarshipRepository
{
    //added to __construct is the correct way to autowire, 
    //the argument autowire is a feature for Controller methods
    public function __construct(private LoggerInterface $logger){
    }

    public function findAll(): array
    {
        $this->logger->info('Starship Controller Received');
        return [
            new Starship(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles',
                'taken over by Q',
            ),
            new Starship(
                2,
                'USS Espresso (NCC-1234-C)',
                'Latte',
                'James T. Quick!',
                'repaired',
            ),
            new Starship(
                3,
                'USS Wanderlust (NCC-2024-W)',
                'Delta Tourist',
                'Kathryn Journeyway',
                'under construction',
            ),
        ];
    }
}