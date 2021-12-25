<?php

namespace App\Controller;

use App\Entity\Job;
use App\Repository\JobRepository;
use App\Repository\UserRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Security\Csrf\CsrfToken;
use Vich\UploaderBundle\Form\Type\VichImageType;


use App\Form\JobType;


/**
     * @Route("/job", name="job.")
     */

class JobController extends AbstractController
{
    /**
     * @Route("/", name="home", methods="GET")
     */
    public function index(JobRepository $jobRepository): Response
    {
        $jobs = $jobRepository->findAll();
        return $this->render('index/home.html.twig', [
            'jobs' => $jobs,
        ]);
    }
    /**
     * @Route("/show/{id<[0-9]+>}", name="show",methods="GET")
     */
    public function show(Job $job): Response
    {
        //dd($job);
        return $this->render('index/show.html.twig',
    ['job' =>$job
    ]);

    }
    /**
     * @Route("/create", name="create",methods="GET|POST")
     */
    public function create(Request $request,UserRepository $userRepository):Response 
    {   
        $job = new Job();

        $form = $this->createFormBuilder($job)
               
                ->add('title', TextType::class)
                ->add('description', TextareaType::class)
                ->add('imageFile', VichImageType::class, [
                    'label'=>'Image (jpg, png)',

                    'required' => false,
                    'allow_delete' => true,
                    'download_uri' => false,
                ])
                ->getForm();
        

        $form->handleRequest($request);
        //dd($form);

        if($form->isSubmitted()){
            
            $name= $userRepository->findOneBy(['email'=>'firas@gmail.com']);
            $job->setUserA($name);
            $em = $this->getDoctrine()->getManager();
            $em->persist($job);
            $em->flush();

            if($job->getImageName()==null){
                $job->setImageName('Default-61c4887ac293e372416607.jpg');
                $em->persist($job);
                $em->flush();
            }
            //hathy bech t'affichy message mta3 notification w najmou ne5dmouha b 'session' zeda

            $this->addFlash('success','new Job successfuly created ! ');


            return $this->redirectToRoute('job.home');
        }

        return $this->render('index/create.html.twig',
            [
                'form'=>$form->createView()
            ]);
      }
       /**
     * @Route("/{id<[0-9]+>}/edit", name="edit",methods={"GET","PUT"})
     */

     public function edit(Request $request, Job $job) :Response 
     {
        $form = $this->createForm(JobType::class,$job, 
         ['method' => 'PUT'
        ]);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em= $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('primary','Job successfuly changed ! ');
            
            return $this->redirectToRoute('job.show',
            ['id'=>$job->getId()]);

        }
        
        return $this->render('index/edit.html.twig',[
            'form'=>$form->createView()
        ]);
     }
        /**
     * @Route("/{id<[0-9]+>}/delete", name="delete",methods={"DELETE","GET"})
     */

     public function delete(Request $request, $id, Job $job): Response 
     {   
        #dd($request->request->get('token'));
        $tokenValue = $request->request->get("_token_");
        #dd($token);
        #dd(($this->isCsrfTokenValid('delete' . $job->getId() ,$tokenValue)));
        
         if($this->isCsrfTokenValid( 'delete' . $job->getId(),$tokenValue)){
            $em  = $this->getDoctrine()->getManager();
            $em->remove($job);
            $em->flush();
            $this->addFlash('danger','Job successfuly deleted ! ');

            return $this->redirectToRoute('job.home');
         }
        
         return $this->redirectToRoute('job.show',
                ['id'=>$job->getId()]);

        }

}
