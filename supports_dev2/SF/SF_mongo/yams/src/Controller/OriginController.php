<?php

namespace App\Controller;

use App\Document\Pastry;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class OriginController extends AbstractController
{
    #[Route('/origin', name: 'app_origin')]
    public function index(DocumentManager $dm): Response
    {

        $pastries=  $dm->getRepository(Pastry::class)
        ->findAll();
        return $this->render('origin/index.html.twig', [
            'controller_name' => 'OriginController',
            'pastries' => $pastries
        ]);
    }
}
