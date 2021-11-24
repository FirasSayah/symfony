<?php

namespace App\Controller;
use App\Entity\Job;
use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\JobType;


/**
     * @Route("/post", name="post.")
     */

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     * @param JobRepository $postRepository
     * @param  Response
     */
    public function index(JobRepository $postRepository)
    {
        $posts = $postRepository->findAll();
        $mymenu =array(
            ['route'=>'post','institule'=>'Home'],
            ['route'=>'create','institule'=>'Contact us'],
            ['route'=>'remove','institule'=>'Register'],
            ['route'=>'post','institule'=>'Sign up']
           
        );
        return $this->render('post/index.html.twig', [
            'postes' => $posts,'mymenu'=>$mymenu
        ]);
    }
        /**
     * @Route("/menu", name="menu")
     * @param JobRepository $postRepository
     * @param  Response
     */
    public function menu(JobRepository $postRepository)
    {
        $posts = $postRepository->findAll();
        $mymenu =array(
            ['route'=>'post','institule'=>'Home'],
            ['route'=>'create','institule'=>'Contact us'],
            ['route'=>'remove','institule'=>'Register'],
            ['route'=>'post','institule'=>'Sign up']
           
        );
        return $this->render('job/menu.html.twig', [
            'postes' => $posts,'mymenu'=>$mymenu
        ]);
    }
     /**
     * @Route("/create", name="create")
     * @param Request $request
     */

    public function create(Request $request){

        $job = new Job();
        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);
        if($form->isSubmitted()){ 
            
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($job);
        $em->flush();
        return $this->redirect($this->generateUrl('post.post'));

    }
    return $this->render('post/create.html.twig',[
        'form'=>$form->createView()
    ]
);

        


    }
    /**
     * @Route("/show/{id}", name="show")
     * @param Request $request
     */

    public function show($id,JobRepository $postRepository){
            $job = $postRepository->find($id);


        return $this->render('post/show.html.twig',
        ['post'=>$job]);
    }
     /**
     * @Route("/remove/{id}", name="remove")
     * @param Request $request
     */

     public function remove($id,JobRepository $postRepository):Response 

     {
        $em = $this->getDoctrine()->getManager();
        $job = $postRepository->findOneById($id);
        $em->remove($job);
        $em->flush();

        return $this->redirect($this->generateUrl('post.post'));
     }
 
}
