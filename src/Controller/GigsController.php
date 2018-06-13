<?php

namespace App\Controller;

use App\Entity\DjSetEntity;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GigsController extends Controller
{
    /**
     * @Route("/gigs", name="gigs")
     */
    public function gigs()
    {
        {
            $DjSet = $this->getDoctrine()
            ->getRepository(DjSetEntity::class)
            ->findAll();
            
            
            return $this->render('gigs/index.html.twig', [
                'controller_name' => 'GigsController',
                'DjSet' => $DjSet,
            ]);
        }
    }
}
