<?php

namespace App\Controller;

use App\Document\Calories;
use App\Document\Origin;
use App\Document\Pastry;
use App\Repository\PastryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class PastryController extends AbstractController
{
    #[Route('/pastry', name: 'app_pastry')]
    public function index(PastryRepository $repository): JsonResponse
    {
        dump($repository->findAll());

        $result = $repository->aggregateTotalByCountry();
        
        // on doit itérer sur la requête
        foreach ($result as $key => $value) {
            dump($value);
        }

        // création d'une pastry

        // Création d'une instance de Pastry
        $pastry = new Pastry();

        // Création d'une instance de Calories
        $calories = new Calories();
        $calories->setTotal(350);
        $calories->setPerServing(90);

        $origin = new Origin();
        $origin->setCountry('France');
        $origin->setRegion('Paris');

        // Assignation des calories à la pâtisserie
        $pastry->setCalories($calories);

        dump($pastry);

        return $this->json([
            'pastry' => 'pastry'
        ]);
    }
}
