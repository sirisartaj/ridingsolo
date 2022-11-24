<?php

namespace App\Action\Admin;

use App\Domain\Admin\Admin;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetUsers
{
  private $Admin;
  public function __construct(Admin $Admin)
  {
    $this->Admin = $Admin;
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response
  ): ResponseInterface 
  {
    $Users = $this->Admin->getUsers();
    $response->getBody()->write((string)json_encode($Users));
    return $response
          ->withHeader('Content-Type', 'application/json');
  }
}