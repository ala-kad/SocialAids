<?php

namespace App\Controller;



use App\Form\CompteType;
use Container1Hz4f3x\getCompteeRepositoryService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Compte;
use Symfony\Component\Routing\Annotation\Route;


class CompteController extends AbstractController
{
    /**
     * @Route("/compte/add", name="compte_register" )
     */
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $compte = new Compte();
        $form = $this->createForm(CompteType::class, $compte);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$compte/$form` variable has also been updated
            // ... perform some action, such as saving the task to the database
            $entityManager = $doctrine->getManager();
            $data = $form->getData();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('compte_success');
        }
        return $this->renderForm('compte/form-register.html.twig', ['form' => $form,]);
    }

    /**
     * @Route("/compte/success", name="compte_success")
     */
    public function successAdd(): Response
    {
        return new Response('Saved new compte ');
    }

    /**
     * @Route("/compte/list", name="compte_list")
     */
    public function listCompte(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $comptes = $em->getRepository(Compte::class)->findAll();

        return $this->render("compte/list-compte.html.twig",array("listCompte"=>$comptes));
    }


    /**
     * @Route("/compte/update/{id}", name="compte_update")
     */
    public function updateCompte(Request $req, ManagerRegistry $doctrine, int $id): Response
    {
        $em = $doctrine->getManager();
        $compte = $em->getRepository(Compte::class)->find($id);
        if (!$compte) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }
        dump($compte);

        return new Response("Hello");
    }

    /**
     * @Route("/compte/delete/{id}", name="compte_remove")
     */
    public function removeCompte(ManagerRegistry $doctrine, int $id): Response{
        $em = $doctrine->getManager();
        $compte = $em->getRepository(Compte::class)->find($id);
        if (!$compte) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $em->remove($compte);
        $em->flush();

        return $this->redirectToRoute('compte_list', [
            'id' => $compte->getId()
        ]);
    }

    /**
     * @Route("/compte/delete/success", name="compte_show")
     */
    public function successRemove(): Response
    {
        return new Response('Deleted new compte ');
    }

}