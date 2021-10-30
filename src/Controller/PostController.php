<?php

namespace App\Controller;
use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/post", name="post.")
     */

class PostController extends AbstractController
{
    /**
     * @Route("/", name="post")
     */
    public function index(): Response
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }
     /**
     * @Route("/create", name="create")
     * param Request $request
     */

    public function create(Request $request){

        $post = new Post();
        $post->setTitle('this a title');

        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();

        

        return $this->render('post/post.html.twig',
    [
        'post'=>$post
    ]);

    }
}
