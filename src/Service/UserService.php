<?php

namespace App\Service;

use App\Repository\UserRepository;

class UserService
{
	private $repoUser;

	public function __construct(UserRepository $repoUser) {
		$this->repoUser = $repoUser;
	}

	public function findAll()
    {
        return $this->repoUser->findBy([]);
    }
}
