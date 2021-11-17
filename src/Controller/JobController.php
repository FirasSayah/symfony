<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JobRepository;

class JobController extends AbstractController
{
    /**
     * @Route("/job", name="job")
     */
    public function index(): Response
    {
        return $this->render('job/index.html.twig', [
            'controller_name' => 'Groupe B',
        ]);
    }
    
    /**
     * @Route("/acceuil", name="acceuil")
     */
    public function acceuil()
    {
        return $this->render('job/acceuil.html.twig');
    }
    /**
     * @Route("/voir/{id}", name="voir" ,requirements={"id"="\d+"})
     */
    public function voir($id){
        
       return $this->render('job/voir.html.twig',['id'=>$id]);
       //return new Response("hello my new name ".$id);
    }

    
    /**
     * @Route("/home", name="home")
     */

     public function home(JobRepository $postRepository){
        $posts = $postRepository->findAll();

         return $this->render('job/home.html.twig',[
            'postes' => $posts
         ]);
     }

}
