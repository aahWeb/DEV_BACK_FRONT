<?php

$dices = $session->get('dices') ?? [0, 0, 0, 0, 0];
$result = $session->get('result') ?? '';

if (!$session->has('counter')) $session->set('counter', 5);

$counter = $session->get('counter');

$form = $this->createFormBuilder()
    ->add('dice1', HiddenType::class, ['data' => $dices[0]])
    ->add('dice2', HiddenType::class, ['data' => $dices[1]])
    ->add('dice3', HiddenType::class, ['data' => $dices[2]])
    ->add('dice4', HiddenType::class, ['data' => $dices[3]])
    ->add('dice5', HiddenType::class, ['data' => $dices[4]])
    ->getForm();

$form->handleRequest($request);

if ($form->isSubmitted()) {
    $dices = $yams->playDices();
    $result = $yams->game($dices);

    $session->set('dices', $dices);
    $session->set('result', $result);

    if ($counter == 0) {
        return $this->redirectToRoute(
            'app_result',
        );
    }

    if ($result === 0) {
        $session->set('counter', $session->get('counter') - 1);

        return $this->redirectToRoute(
            'app_game'
        );
    }

    return
        $this->redirectToRoute('app_result');
}

return $this->render('game/index.html.twig', [
    'form' => $form->createView(),
    'dices' => $dices,
    'result' => $result,
    'counter' => $counter
]);