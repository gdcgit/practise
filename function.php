<?php

/**
*解析ini格式的配置文件。第二参数为true则为多维数组
*/
$ini = parse_ini_file('./file/ini.txt',true);

// var_dump($ini);



/**
*自动加载类
	调用spl_autoload_register的时候并没有传入要加载的类参数，猜测是这个函数内部有处理
* @param $class $class的值为要加载目录下的所有类名
*/
function autoload($class){
	// var_dump($class);
	$file = __DIR__."/class/".$class.'.php';
	// var_dump($file);
	if(is_file($file)){
		require_once($file);
	}
}
$r = spl_autoload_register('autoload',true,true);


// var_dump($r);

$a = new A();

$a->getAttd();

$b = new B();

$b->getAttd();