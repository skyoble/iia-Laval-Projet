<?php

namespace App\Service;

use App\Repository\RegionRepository;

class RegionService
{
	private $repoRegion;

	public function __construct(RegionRepository $repoRegion) {
		$this->repoRegion = $repoRegion;
	}

	public function findAll()
    {
        return $this->repoRegion->findBy([]);
    }
}
