<?php
$router = new gene_router();
$router->clear()
	->get("/",function(){
            echo "index";
		})
	->group("/admin")
		->get("/",function(){
			echo 'admin';
		},"auth")
		->get("/:name/",function($abc){
			var_dump($abc);
		})
		->get("/:name.:ext",function($abc){
			var_dump($abc);
		})
		->get("/:name/sasoud",function(){
			echo 'dd';
		},"name")
		->get("/blog/:ext/baidu",function(){
			echo 'baidu';
			return array('sdfasd'=>'baidu.edu.com');
		},"auth@clearAll")
	->group()
	->get("/index",function(){
		echo 'index';
	})
	->error(401,function(){
		echo " 401 ";
	})
	->hook("auth",function(){
		echo " auth ";
	})
	->hook("before", function(){
		echo " before ";
	})
	->hook("after", function($params){
		echo " after ";
		if(is_array($params))var_dump($params);
	})
	;
	