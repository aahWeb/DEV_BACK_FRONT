<?php

namespace App\Controller;

use App\Entity\Pastry;
use App\Repository\PastryRepository;
use App\Service\MessageGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class PastryController extends AbstractController
{

    #[Route('/pastry', name: 'app_pastry')]
    public function index(MessageGenerator $generator, PastryRepository $repository): JsonResponse
    {   

        $pastries = $repository->findAllOrderedByName();

        dump($pastries);

        $pastries = $repository->findPastryByOriginNameBis('France');
        dump($pastries);

        $id = $pastries[0]->getId();

        $repository->incrPastryCaloryTotalById($id, 1.2);
        $p = $repository->findOneBy(['id' => $id] ) ;
        dump($p);

        return $this->json([
            'message' => $generator->getHappyMessage(),
        ]);
    }
}
