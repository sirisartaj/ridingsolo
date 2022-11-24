<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

return function (App $app) {
  //$app->get('/', \App\Action\HomeAction::class);
  $app->get('/', \App\Action\Banners\GetBanners::class);
  //Admin roles and privileges
  $app->get('/roles/getroles', \App\Action\Roles\GetRoles::class);
  $app->post('/roles/addrole', \App\Action\Roles\AddRole::class);
  $app->get('/roles/getrole/{roleId}', \App\Action\Roles\GetRole::class);
  $app->post('/addadminrole', \App\Action\AddAdminRole::class);
  $app->post('/roles/updaterole', \App\Action\Roles\UpdateRole::class);
  $app->delete('/deleteadminrole/{roleId}', \App\Action\DeleteAdminRole::class);
  $app->get('/roles/getrolepriviliges/{roleId}', \App\Action\Roles\GetRolePrivileges::class);
  $app->get('/roles/getmodules', \App\Action\Roles\GetModules::class);
  $app->post('/editprivileges', \App\Action\EditPrivileges::class);
  $app->post('/updaterolestatus', \App\Action\UpdateRoleStatus::class);
  
  $app->post('/roles/updateprivilies', \App\Action\Roles\UpdatePrivilies::class);

  //Admin Users 
  $app->post('/users/checklogin',\App\Action\CheckLogin::class);
	//$app->post('/users/adduser',\App\Action\AddUser::class);
  $app->post('/users/adduser', \App\Action\Users\AddUser::class);
	$app->get('/users/getuser/{userId}', \App\Action\Users\GetUser::class);
	$app->get('/users/getusers',\App\Action\Users\GetUsers::class);
	$app->post('/users/updateuser',\App\Action\Users\UpdateUser::class);
	$app->post('/users/updateuserpassword',\App\Action\Users\UpdateUserPassword::class);
	$app->post('/users/forgotpassword',\App\Action\ForgotPassword::class);
	$app->delete('/users/deleteuser/{userId}',\App\Action\DeleteUser::class);
  $app->post('/users/updateuserstatus', \App\Action\UpdateUserStatus::class);
  //Site Users
  $app->get('/users/getsiteusers', \App\Action\GetSiteUsers::class);
  $app->delete('/users/deletesiteuser/{userId}',\App\Action\DeleteSiteUser::class);
  

  $app->post('/admin/Approverejectuser', \App\Action\Admin\Approverejectuser::class);
    
};