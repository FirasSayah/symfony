<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\DescriptionRepository;
use App\Form\DescriptionType;
use App\Entity\Description;
/**
     * @Route("/description", name="description.")
     */
class DescriptionController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param DescriptionRepository $description
     */
    public function index(DescriptionRepository $description): Response
    {
        $descrip = $description->findAll();
        return $this->render('job/home.html.twig', [
            'descriptions' => $descrip
        ]);
    }
    /**
     * @Route("/create", name="create")
     * @param Request $request
     */

    public function create(Request $request){

        $job = new Description();
        $form = $this->createForm(DescriptionType::class, $job);
        $form->handleRequest($request);
        if($form->isSubmitted()){ 
            
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($job);
        $em->flush();
        return $this->redirect($this->generateUrl('description.index'));

    }
    return $this->render('description/create.html.twig',[
        'form'=>$form->createView()
    ]
);

 }
}
