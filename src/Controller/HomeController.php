<?php

namespace App\Controller;

use App\Service\SaleService;
use App\Service\UserService;
use App\Service\RegionService;
use App\Service\SellerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", methods="GET")
     */
    public function login(): Response
    {
        return $this->render('home/login.html.twig');
    }

    /**
     * @Route("/", methods="POST")
     */
    public function processLogin(Request $request): Response
    {
        return $this->render('home/welcome.html.twig', [
            'user' => $request->get('username')
        ]);
    }

    /**
     * @Route("/users", methods="GET")
     */
    public function findAll(UserService $srvUser): Response
    {
        return $this->render('home/users.html.twig', [
            'users' => $srvUser->findAll()
        ]);
    }

    /**
     * @Route("/region", methods="GET")
     */
    public function findAll2(RegionService $srvRegion): Response
    {
        return $this->render('home/region.html.twig', [
            'regions' => $srvRegion->findAll()
        ]);
    }
    /**
     * @Route("/sale", methods="GET")
     */
    public function findAll3(SaleService $srvSale): Response
    {
        return $this->render('home/sale.html.twig', [
            'sales' => $srvSale->findAll()
        ]);
    }
    /**
     * @Route("/seller", methods="GET")
     */
    public function findAll4(SellerService $srvSeller): Response
    {
        return $this->render('home/seller.html.twig', [
            'sellers' => $srvSeller->findAll()
        ]);
    }
}
