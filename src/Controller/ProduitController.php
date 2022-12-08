<?php

namespace App\Controller;



use App\Form\ProduitType;
use Container1Hz4f3x\getProduitRepositoryService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Produit;
use Symfony\Component\Routing\Annotation\Route;


class ProduitController extends AbstractController
{
    /**
     * @Route("/produit/add", name="produit_register" )
     */
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $doctrine->getManager();
            $data = $form->getData();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('produit_success');
        }
        return $this->renderForm('produit/form-register.html.twig', ['form' => $form,]);
    }

    /**
     * @Route("/produit/success", name="produit_success")
     */
    public function successAdd(): Response
    {
        return new Response('Saved new produit ');
    }

    /**
     * @Route("/produit/list", name="produit_list")
     */
    public function listProduit(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository(Produit::class)->findAll();

        return $this->render("produit/list-produit.html.twig",array("listProduit"=>$produits));
    }


    /**
     * @Route("/produit/update/{id}", name="produit_update")
     */
    public function updateProduit(Request $req, ManagerRegistry $doctrine, int $id): Response
    {
        $em = $doctrine->getManager();
        $produit = $em->getRepository(Produit::class)->find($id);
        if (!$produit) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }
        dump($produit);

        return new Response("Hello");
    }

    /**
     * @Route("/produit/delete/{id}", name="produit_remove")
     */
    public function removeProduit(ManagerRegistry $doctrine, int $id): Response{
        $em = $doctrine->getManager();
        $produit = $em->getRepository(Produit::class)->find($id);
        if (!$produit) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $em->remove($produit);
        $em->flush();

        return $this->redirectToRoute('produit_list', [
            'id' => $produit->getId()
        ]);
    }

    /**
     * @Route("/produit/delete/success", name="produit_show")
     */
    public function successRemove(): Response
    {
        return new Response('Deleted new produit ');
    }

}