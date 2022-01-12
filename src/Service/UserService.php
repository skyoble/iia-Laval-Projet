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

	public function find(int $id)
	{
        return $this->repoUser->find($id);
	}

	public function changePassword(int $id, String $hashedPassword)
	{
		$user = $this->find($id);
		return $this->repoUser->updatePassword($user, $hashedPassword);
	}
}
