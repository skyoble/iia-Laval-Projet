<?php

namespace App\Service;

use App\Repository\SellerRepository;

class SellerService
{
	private $repoSeller;

	public function __construct(SellerRepository $repoSeller) {
		$this->repoSeller = $repoSeller;
	}

	public function findAll()
    {
        return $this->repoSeller->findBy([]);
    }
}
