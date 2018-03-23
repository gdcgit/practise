<?php

class B{

	private $attd = "天津市";

	public function __construct(){
		echo "我是自动加载的B";
		echo "<br />";
	}


	public function getAttd(){
		echo "attd的值为：". $this->attd;
		echo "<br />";
	}

}