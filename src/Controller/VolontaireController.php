<?php

namespace App\Controller;


use App\Form\VolontairesType;
use Container1Hz4f3x\getVolontaireRepositoryService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\Type\VolontaireType;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Volontaire;
use Symfony\Component\Routing\Annotation\Route;


class VolontaireController extends AbstractController
{
    /**
     * @Route("/volontaire/add", name="volontaire_register")
     */
    public function new(Request $request, ManagerRegistry $doctrine): Response
    {
        $volontaire = new Volontaire();
        $form = $this->createForm(VolontairesType::class, $volontaire);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$volontaire/$form` variable has also been updated
            // ... perform some action, such as saving the task to the database
            $entityManager = $doctrine->getManager();
            $data = $form->getData();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('volontaire_success');
        }
        return $this->renderForm('volontaire/form-register.html.twig', ['form' => $form,]);
    }

    /**
     * @Route("/volontaire/success", name="volontaire_success")
     */
    public function successAdd(): Response
    {
        return new Response('Saved new volontaire ');
    }

    /**
     * @Route("/volontaire/list", name="volontaire_list")
     */
    public function listVolontaire(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $volontaires = $em->getRepository(Volontaire::class)->findAll();

        return $this->render("volontaire/list-volontaire.html.twig",array("listVolontaires"=>$volontaires));
    }


    /**
     * @Route("/volontaire/update/{id}", name="volontaire_update")
     */
    public function updateVolontaire(Request $request, Volontaire $volontaire, ManagerRegistry $doctrine ): Response
    {
        $entityManager=$doctrine->getManager();
        $form= $this->createForm(VolontairesType::class, $volontaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('volontaire_list');
        }

        return $this->render('volontaire/form-edit.html.twig', [
            'volontaire' => $volontaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/volontaire/delete/{id}", name="volontaire_remove")
     */
    public function removeVolontaire(ManagerRegistry $doctrine, int $id): Response{
        $em = $doctrine->getManager();
        $volontaire = $em->getRepository(Volontaire::class)->find($id);
        if (!$volontaire) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $em->remove($volontaire);
        $em->flush();

        return $this->redirectToRoute('volontaire_list', [
            'id' => $volontaire->getId()
        ]);
    }

    /**
     * @Route("/volontaire/delete/success", name="volontaire_show")
     */
    public function successRemove(): Response
    {
        return new Response('Deleted new volontaire ');
    }

}