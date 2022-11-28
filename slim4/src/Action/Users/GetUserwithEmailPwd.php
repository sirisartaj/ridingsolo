<?php

namespace App\Action\Users;

use App\Domain\Users\Users;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class GetUserwithEmailPwd
{
  private $Users;
  public function __construct(Users $Users)
  {
    $this->Users = $Users;
  }
  public function __invoke(
      ServerRequestInterface $request, 
      ResponseInterface $response, $args
  ): ResponseInterface 
  {
     $data = $request->getBody();
     $data =(array) json_decode($data);
     //print_r($data);exit;
    $Users = $this->Users->getUserwithemailpwd($data);
    $response->getBody()->write((string)json_encode($Users));
    return $response
          ->withHeader('Content-Type', 'application/json');
  }
}