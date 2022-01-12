<?php

namespace App\Controller;

use App\Entity\Seller;
use App\Entity\Sale;
use App\Entity\Region;
use App\Service\SaleService;
use App\Service\UserService;
use App\Service\RegionService;
use App\Service\SellerService;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function home(SaleService $srvSale): Response
    {        
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('home/index.html.twig', [
            'reports' => $srvSale->getRapport()
        ]);
    }

    #[Route('/detail{id}', name: 'app_detail')]
    public function detail(RegionService $srvRegion, SaleService $srvSale, int $id): Response
    {        
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        //get region name
        dump($id);
        $region_name = $srvRegion->find($id)->getName();
        dump($region_name);
        dump($srvSale->getSaleByIdRegion($id));

        return $this->render('home/detail.html.twig', [
            'region_name' => $region_name,
            'sales' => $srvSale->getSaleByIdRegion($id)
        ]);
    }
}
