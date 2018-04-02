<?php
//迭代生成器
function xrange($start, $end, $step = 10){
	for($i = $start; $i <= $end; $i += $step){
		yield $i;
	}
}

// foreach (xrange(1,10000) as $value) {
// 	echo "value: ".$value . "\n";
// }

$range = xrange(1,10000);
var_dump($range); //返回迭代器
var_dump($range instanceof Iterator);

$range->rewind();
var_dump($range->current()); //函数内传递给yield语句的返回值可以通过$range->current()获取.
$range->next();
var_dump($range->current()); //为了继续执行生成器中yield后的代码, 你就需要调用$range->next()方法

/**
*协程 协程的支持是在迭代生成器的基础上, 增加了可以回送数据给生成器的功能(调用者发送数据给被调用的生成器函数). 这就把生成器到调用者的单向通信转变为两者之间的双向通信.

传递数据的功能是通过迭代器的send()方法实现的
*/

// function logger($filename){
// 	$filehandle = fopen($filename,'a');
// 	while (true) {
// 		fwrite($filehandle, yield . "\n");

// 	}
// }

// $logger = logger(__DIR__.'/log');
// $logger->send('Foo');
// $logger->send('Bar');



// function gen(){
// 	$ret = (yield 'yield1');
// 	var_dump($ret);
// 	$ret = (yield 'yield2');
// 	var_dump($ret);
// }

// $gen = gen();
// var_dump($gen->current());
// var_dump($gen->send('ret1'));
// var_dump($gen->send('ret2'));


function gen(){
	yield 'foo';
	yield 'bar';
}

$gen = gen();
var_dump($gen->send('something'));