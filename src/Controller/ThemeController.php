<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{

    /**
     *
    @Route("/SocialAids/Theme", name="app_theme")
     * */
    public function index(): Response
    {
        return $this->render('theme/index.html.twig', [
            'controller_name' => 'ThemeController',
        ]);

    }
    public function create(Request $request):Response{
        $theme = new Theme();

        $theme->setcode("6555426");
        $theme->settitre("collect");
        $theme->setsujet("cllecter les aides");

        $form = $this->createFormBuilder($theme)
            ->add("code ", IntegerType::class)
            ->add("titre", TextType::class)
            ->add("sujet", TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create theme'])
            ->getForm();
        return $this->render('theme/index.html.twig');
}}
