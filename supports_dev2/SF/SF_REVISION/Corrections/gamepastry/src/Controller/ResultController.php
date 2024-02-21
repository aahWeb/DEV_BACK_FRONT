<?php

namespace App\Controller;

use App\Repository\PastryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class ResultController extends AbstractController
{
    #[Route('/result', name: 'app_result')]
    public function index(PastryRepository $repository, SessionInterface $session): Response
    {
        $dices = $session->get('dices');
        $result = (int) $session->get('result');

        $session->remove('result');
        $session->remove('dices');

        $pastries = $repository->findRandPastries( $result ?? 0 ) ; 

        return $this->render('result/index.html.twig', [
            'controller_name' => 'ResultController',
            'dices' => $dices,
            'result'=> $result,
            'pastries' => $pastries
        ]);
    }
}
