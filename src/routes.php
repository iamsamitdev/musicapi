<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {

    $container = $app->getContainer();

    // ดึงข้อมูลจากตาราง albums ออกมาแสดงเป็น json
    $app->group('/api', function() use ($app){

        $container = $app->getContainer();

        $app->get('/albums/{typeid}', function (Request $request, Response $response, array $args) use ($container) {
    		$sth = $this->db->prepare("SELECT * FROM albums WHERE albumtype='$args[typeid]' ORDER BY id DESC");
    		$sth->execute();
    		$product = $sth->fetchAll();
    		// แสดงผลออกมาเป็น JSON
    		return $this->response->withJson($product);
    	});

    });
    
};
