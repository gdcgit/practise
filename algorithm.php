<?php
//待排序数组
$arr = [1,23,24,43,54,62,21,66,32,78,36,76,39,89];
echo "原 数 组：" . implode(',',$arr);
echo "<br />";
/**
*冒泡排序
*/
function mao_pao($arr){
	$len = count($arr);
	//该层循环控制 需要冒泡的轮数
	for($i=1;$i<$len;$i++){
		//该层循环用来控制每轮冒出一个数，需要比较的次数
		//内层循环依次执行相邻两个元素的比较，发现满足条件的就交换位置
		for($k=0;$k<$len-$i;$k++){
			if($arr[$k]>$arr[$k+1]){
				//交换顺序
				$tmp = $arr[$k+1];
				$arr[$k+1] = $arr[$k];
				$arr[$k] = $tmp;
			}
		}
		echo "冒泡排序： 第" .$i.'次循环 '. implode(',', $arr);
		echo "<br />";
	}
	return $arr;
}

echo "冒泡排序： " . implode(',',mao_pao($arr));
echo "<br />";



/**
*选择排序
*/
function select_sort($arr){
	$len = count($arr);

	//外层循环控制轮数，当前的最小值，内层循环控制比较的次数
	//$i当前最小值的位置，需要参与比较的元素
	for($i=0;$i<$len-1;$i++){
		//先假设最小值的位置
		$p = $i;
		//$j当前都需要和哪些元素比较，$i后面的
		for($j = $i+1; $j<$len; $j++){
			if($arr[$p] > $arr[$j]){
				//比较，发现更小的,记录下最小值的位置；并且在下次比较时，
 				// 应该采用已知的最小值进行比较。
				$p = $j;
			}
		}
		//已经确定了当前的最小值的位置，保存到$p中。
 		//如果发现 最小值的位置与当前假设的位置$i不同，则位置互换即可
		if($p != $i){
			$tmp = $arr[$p];
			$arr[$p] = $arr[$i];
			$arr[$i] = $tmp;
		}
		echo "选择排序： 第" .$i.'次循环 '. implode(',', $arr);
		echo "<br />";
	}
	
	//返回最终结果
	return $arr;
}

echo "选择排序： " . implode(',',select_sort($arr));
echo "<br />";

/**
*插入排序
*
*/
function insert_sort($arr){
	$len = count($arr);
	for($i=1;$i<$len;$i++){
		//获得当前需要比较的元素值。
		$tmp = $arr[$i];
		 //内层循环控制 比较 并 插入
		for ($j=$i-1; $j >= 0; $j--) { 
			if($tmp < $arr[$j]){
				 //发现插入的元素要小，交换位置
                //将后边的元素与前面的元素互换
				$arr[$j+1] = $arr[$j];
				//将前面的数设置为 当前需要交换的数
				$arr[$j] = $tmp;
			}else{
				break;
			}
		}
	}

	return $arr;
}

echo "插入排序 " . implode(',',insert_sort($arr));
echo "<br />";


/**
*
*快速排序
*/
function quick_sort($arr){
	//先判断是否需要继续进行
	$len = count($arr);
	if($len<=1){
		return $arr;
	}
	$index = (int)floor(count($arr) / 2);
	$value = $arr[$index];
	array_splice($arr, $index, 1);
	$left = $right = [];
	for($i=0;$i<count($arr);$i++){
		if($arr[$i] < $value){
			array_push($left, $arr[$i]);
		}else{
			array_push($right, $arr[$i]);
		}
	}

	$left = quick_sort($left);
	$right = quick_sort($right);
	array_push($left, $value);
	return array_merge($left, $right);
}

echo "快速排序： " . implode(',',quick_sort($arr));
echo "<br />";