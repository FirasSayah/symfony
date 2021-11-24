<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\DescriptionRepository;
use App\Form\DescriptionType;
use App\Entity\Description;
use App\Repository\UserInofrmationRepository;

use App\Entity\UserInofrmation;
use App\Form\InformationType;


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
        $mymenu =array(
            ['route'=>'post','institule'=>'Home'],
            ['route'=>'create','institule'=>'Contact us'],
            ['route'=>'remove','institule'=>'Register'],
            ['route'=>'post','institule'=>'Sign up']
           
        );
        $descrip = $description->findAll();
        return $this->render('job/home.html.twig', [
            'descriptions' => $descrip, 'mymenu'=>$mymenu
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

 /**
     * @Route("/register", name="register")
     * @param Request $request
     */
public function register(Request $request){

        $user = new UserInofrmation();
        $form = $this->createForm(InformationType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted()){ 
            
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return $this->redirect($this->generateUrl('job.login'));

    }

      return $this->render('job/register.html.twig',
      ['form'=> $form->createView()]
    );
    
}
/**
     * @Route("/login", name="login")
     * @param Request $request
     */
public function login(){

   
    return $this->render('job/login.html.twig');
    
}

}
