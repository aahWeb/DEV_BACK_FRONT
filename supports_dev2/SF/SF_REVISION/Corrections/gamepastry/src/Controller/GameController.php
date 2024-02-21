<?php

namespace App\Controller;

use App\Service\Yams;
use App\Form\Model\Dice;
use App\Form\Type\DiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GameController extends AbstractController
{
    #[Route('/game', name: 'app_game')]
    public function index(Request $request, Yams $yams, SessionInterface $session): Response
    {
        $dice = new Dice();
        $dice->hydrate([0, 0, 0, 0, 0]);
        $dices = $session->get('dices') ?? [0, 0, 0, 0, 0];
        $result = $session->get('result') ?? '';

        $form = $this->createForm(DiceType::class, $dice);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $dices = $yams->playDices();
            $result = $yams->game($dices);

            $session->set('dices', $dices);
            $session->set('result', $result);

            if ($result === 0)
                return $this->redirectToRoute(
                    'app_game'
                );

            return $this->redirectToRoute('app_result');
        }

        return $this->render('game/index.html.twig', [
            'form' => $form->createView(),
            'dices' => $dices,
            'result' => $result
        ]);
    }
}
