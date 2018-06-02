<?php

namespace App\Controller;
use App\Entity\DjSetEntity;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        {
            $DjSet = $this->getDoctrine()
            ->getRepository(DjSetEntity::class)
            ->findAll();
            dump($DjSet);
            
            return $this->render('contact/index.html.twig', [
                'controller_name' => 'ContactController',
                'DjSet' => $DjSet,
            ]);
        }
    }
    
}
