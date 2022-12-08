<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReglementController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('reglement/index.html.twig', [
            'controller_name' => 'ReglementController',
        ]);
    }
    public function create(Request $request):Response{
        $reglement = new reglement();

        $reglement->setcode_reg("xdrt123");
        $reglement->setmontant("100,00");
        $form = $this->createFormBuilder($reglement)
            ->add("code_reg ", IntegerType::class)
            ->add("montant", TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create reglement'])
            ->getForm();
        return $this->render('reglement/index.html.twig');
    }
}
