<?php

namespace App\Service;

use App\Repository\SaleRepository;

class SaleService
{
	private $repoSale;

	public function __construct(SaleRepository $repoSale) {
		$this->repoSale = $repoSale;
	}

	public function findAll()
    {
        return $this->repoSale->findBy([]);
    }

	public function getRapport()
	{
		return $this->repoSale->getRapport();
	}

	public function getSaleByIdRegion(int $id)
	{
		return $this->repoSale->getSaleByIdRegion($id);
	}
}
