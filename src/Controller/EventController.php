<?php

namespace App\Controller;

use App\Entity\Event;
use App\Form\EventType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventController extends AbstractController
{
    /**
     * @Route("/event/add", name="event_register")
     */
    public function new():Response{
        $event=new Event();


        $event->setNom("collaborationMed");



        $form = $this->createForm(EventType::class, $event);
        return $this->renderForm('event/form-register.html.twig',['form'=>$form,]);
    }

}
