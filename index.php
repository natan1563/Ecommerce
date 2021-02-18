<?php 

session_start();

require_once("vendor/autoload.php");

use Hcode\Model\Category;
use \Slim\Slim;
use \Hcode\Page;
use Hcode\PageAdmin;
use Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);

require_once("site.php");
require_once("admin.php");
require_once("admin-users.php");
require_once("admin-categories.php");
require_once("admin-products.php");

$app->get('/categories/:idcategory', function($idcategory) {
	
	$category = new Category();

	$category->get((int)$idcategory);

	$page = new Page();

	$page->setTpl('category', [
		'category' => $category->getValues(),
		'products' => []
	]);

});

$app->run();

 ?>