<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdministrateurController extends AbstractController
{
    #[Route('/administrateur', name: 'app_administrateur')]
    public function index(): Response
    {
        return $this->render('administrateur/index.html.twig', [
            'controller_name' => 'AdministrateurController',
        ]);
    }
    public function create(Request $request):Response{
        $administrateur = new Administrateur();

        $administrateur>setcident("65578963");
        $administrateur->setnom("chaima");
        $administrateur->settel("26789456");

        $form = $this->createFormBuilder($administrateur)
            ->add("ident ", IntegerType::class)
            ->add("nom", TextType::class)
            ->add("tel", TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Administrateur'])
            ->getForm();
        return $this->render('tel/index.html.twig');
    }
}
