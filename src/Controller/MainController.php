<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route ("/", name="home")
     * @Route("/main", name="main")
     */
    public function index(): Response
    {
        return $this->redirectToRoute("cours_index");
    }
}
