<?php

namespace Tests\Unit;

use Exception;
use Tests\TestCase;
use App\Repositories\Repository;
class RepositoryTest extends TestCase{
    public function setUp(): void
    {
        parent::setUp();

       
        $this->repository = new Repository();
        $this->repository->createDatabase();
    }
function testGetUserThrowsExceptionIfEmailNotExists(): void
{
  $this->repository->addUser('test1@example.com', 'secret1');
  $this->expectException(Exception::class);
  $this->expectExceptionMessage('Utilisateur inconnu');
  $this->repository->getStudent('test2@example.com', 'secret1');
}

function testGetUserThrowsExceptionIfPasswordIsIncorrect(): void
{
  $this->repository->addUser('test1@example.com', 'secret1');
  $this->expectException(Exception::class);
  $this->expectExceptionMessage('Utilisateur inconnu');
  $this->repository->getStudent('test1@example.com', 'secret2');
}

function testAddUserThrowsExceptionIfEmailAlreadyExists(): void
{
    $this->repository->addUser('test@example.com', 'secret1');
    $this->expectException(Exception::class);
    $this->repository->addUser('test@example.com', 'secret2');
}
}
