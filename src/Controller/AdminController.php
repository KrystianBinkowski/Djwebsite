<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Entity\DjSetEntity;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class AdminController extends Controller
{
    public function add(Request $request)
    {
        $DjSetEntity = new DjSetEntity();
     

        $form = $this->createFormBuilder($DjSetEntity)
            ->add('link', TextType::class)
            ->add('title', TextType::class)
            ->add('SoundCloudId', IntegerType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
        
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
        
            return $this->redirectToRoute('admin');
        }
       

        return $this->render('admin/add.html.twig', [
       'form' => $form->createView(),
        'controller_name' => 'AdminController',
        
        
        ]);
    }
    public function delete(int $id)
    {
        $DjSet = $this
        ->getDoctrine()
        ->getRepository(DjSetEntity::class)
        ->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($DjSet);
        $entityManager->flush();
        dump($DjSet);
        return $this->redirectToRoute('admin');
        return $this->render('admin/delete.html.twig', [
            
            'controller_name' => 'AdminController',
            
            
            
            ]);
    }
    public function update($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $DjSetEntity = $entityManager->getRepository(DjSetEntity::class)->find($id);
    
    
    
   
        if (!$DjSetEntity) {
            throw $this->createNotFoundException(
            'No product found for id '.$id
        );
        }
        $form = $this->createFormBuilder($DjSetEntity)
            ->add('link', TextType::class)
            ->add('title', TextType::class)
            ->add('SoundCloudId', IntegerType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('admin');
        }
   
    
        return $this->render('admin/update.html.twig', [
            
        'controller_name' => 'AdminController',
        'form' => $form->createView(),
        
        
        
        ]);
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError(); 

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('admin/login.html.twig', array(
            'controller_name' => 'AdminController',
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }
    public function admin()
    {
        $DjSet = $this->getDoctrine()
        ->getRepository(DjSetEntity::class)
        ->findAll();
        
        
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'DjSet' => $DjSet,
        ]);
    }
}
