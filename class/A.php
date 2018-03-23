<?php

class A{

	private $attd = "北京市";

	public function __construct(){
		echo "我是自动加载的A";
		echo "<br />";
	}

	public function getAttd(){
		echo "attd的值为：". $this->attd;
		echo "<br />";
	}


}