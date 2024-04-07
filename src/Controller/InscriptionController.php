<?php

namespace App\Controller;

use App\Entity\Inscription;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{

    #[Route('/', name: 'app_inscription', methods: ['GET', 'POST'])]
    public function new(
        Request                $request,
        EntityManagerInterface $manager
    ): Response
    {

        $inscription = new Inscription();
        $form = $this->createForm(InscriptionType::class, $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($inscription);
            $manager->flush();

            $this->addFlash('success', 'Demande soumise avec succès');
            return $this->redirectToRoute('app_inscription');
        }
        return $this->render('inscription/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
