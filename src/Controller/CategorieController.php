<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     *
    @Route("/SocialAids/categorie", name="app_categorie")
     * */
    public function index(): Response
    {
        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'CategorieController',
        ]);
    }
    public function create(Request $request):Response{
        $categorie = new Categorie();

        $categorie->setcode_cat("126584");
        $categorie->setfamille_cat("chaise");
        $form = $this->createFormBuilder($categorie)
            ->add("code_cat ", IntegerType::class)
            ->add("famille_cat", TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create categorie'])
            ->getForm();
        return $this->render('categorie/index.html.twig');
    }

}
