<?php

namespace App\Controller;
use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PostFormType;


/**
     * @Route("/post", name="post.")
     */

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     * @param PostRepository $postRepository
     * @param  Response
     */
    public function index(PostRepository $postRepository)
    {
        $posts = $postRepository->findAll();
        return $this->render('post/index.html.twig', [
            'postes' => $posts,
        ]);
    }
     /**
     * @Route("/create", name="create")
     * @param Request $request
     */

    public function create(Request $request){

        $post = new Post();
        $form = $this->createForm(PostFormType::class, $post);
        $form->handleRequest($request);
        if($form->isSubmitted()){ 
            
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
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

    public function show($id,PostRepository $postRepository){
            $post = $postRepository->find($id);


        return $this->render('post/show.html.twig',
        ['post'=>$post]);
    }
     /**
     * @Route("/remove/{id}", name="remove")
     * @param Request $request
     */

     public function remove($id,PostRepository $postRepository):Response 

     {
        $em = $this->getDoctrine()->getManager();
        $post = $postRepository->findOneById($id);
        $em->remove($post);
        $em->flush();

        return $this->redirect($this->generateUrl('post.post'));
     }
 
}
