<?php
ini_set('error_reporting', E_ALL);


class MyArrays
{
	public $myArray;
	public $maxValue = null;
	public $secondMaxValue = null;
	public $arraySize;
	public $arraySum = null;
	
	
	public function __construct(array $arr)
	{
		$this -> changeArray($arr);
	}
	
	public function changeArray(array $arr)
	{
		$this -> myArray = $arr;
		$this -> arraySize = count($this -> myArray);
		$this -> maxValue = null;
		$this -> secondMaxValue = null;
		$this -> arraySum = null;
	}
	
	public function getArray()
	{
		return $this -> myArray;
	}
	
/******************************************************************************
/*		0) найти максимальный элемент массива.
/*****************************************************************************/	
	public function calculateMaxValue()
	{
		if (0 == $this -> arraySize)
		{
			return;
		}
		
		$this -> maxValue = $this -> myArray[0];
		
		for ($i = 1; $i < $this -> arraySize; $i++)
			if ($this -> maxValue < $this -> myArray[$i])
				$this -> maxValue = $this -> myArray[$i];
	}
	
	public function getMaxValue()
	{
		if (!$this -> maxValue)
			$this -> calculateMaxValue();
		
		return $this -> maxValue;
	}

/******************************************************************************
/*		3) найти в массиве число второе по величине.
/*****************************************************************************/
	public function calculateSecondMaxValue()
	{
		if (0 == $this -> arraySize)
		{
			return;
		}
		
		if ($this -> maxValue != $this -> myArray[0])
			$this -> secondMaxValue = $this -> myArray[0];
		else
			$this -> secondMaxValue = $this -> myArray[1];
		
		for ($i = 1; $i < $this -> arraySize; $i++)
			if (($this -> secondMaxValue < $this -> myArray[$i]) AND ($this -> maxValue > $this -> myArray[$i]))
				$this -> secondMaxValue = $this -> myArray[$i];
	}


	public function getSecondMaxValue()
	{
		if (!$this -> secondMaxValue)
			$this -> calculateSecondMaxValue();
		
		return $this -> secondMaxValue;
	}

/******************************************************************************
/*		4) В массиве заменить все элементы, большие данного числа Z, этим числом. Подсчитать количество замен.
/*****************************************************************************/	
	public function getArrayLowerZ(int $Z)
	{
		$arrayLowerZ = [];
		for ($i = 0; $i < $this -> arraySize; $i++)
			if ($this -> myArray[$i] > $Z)
				$arrayLowerZ[] = $Z;
			else
				$arrayLowerZ[] = $this -> myArray[$i];
		
		return $arrayLowerZ;
	}
	
/******************************************************************************
/*		5) array_sum
/*****************************************************************************/	
	public function calculateArraySum()
	{
		if (0 == $this -> arraySize)
		{
			return;
		}
		
		for ($i = 0; $i < $this -> arraySize; $i++)
			$this -> arraySum += $this -> myArray[$i];
	}
	
	public function getArraySum()
	{
		if (0 == $this -> arraySize)
		{
			return;
		}
		
		if (!$this -> arraySum)
			$this -> calculateArraySum();
		
		return $this -> arraySum;
	}
	
/******************************************************************************
/*		6	in_array
/*****************************************************************************/
	public function inArray(int $Z)
	{
		if (0 == $this -> arraySize)
		{
			null;
		}
		
		for ($i = 0; $i < $this -> arraySize; $i++)
			if ($Z == $this -> myArray[$i])
				return $i;
	}

/******************************************************************************
/*		7	array_diff
/*****************************************************************************/	
	public function arrayDiff(array $array2)
	{
		$count = count($array2);
		if (0 == $count)
			return [];
		
		$tempArray = $this -> myArray;
		
		//for ($i = 0; $i < $this -> arraySize; $i++)
		foreach($tempArray as $key => $value)
			for ($y = 0; $y < $count; $y++)
				if ($value == $array2[$y])
					unset($tempArray[$key]);
		
		return $tempArray;
	}

/******************************************************************************
/*		8	sort
/*****************************************************************************/
	public function arraySort()
	{
		for ($i = ($this -> arraySize - 1); $i > 0; $i--)
			for ($y = 0; $y < $i; $y++)
				if ($this -> myArray[$y] > $this -> myArray[$y + 1])
				{
					$temp = $this -> myArray[$y];
					$this -> myArray[$y] = $this -> myArray[$y + 1];
					$this -> myArray[$y + 1] = $temp;
				}
	}
}

/*****************************************************************************/	

Class MyGenerator
{
/******************************************************************************
/*		1) Написать функцию которая выводит все положительные четные числа которые меньше заданного.
/*****************************************************************************/	
	public function getPositivEvenInteger(int $maxValue)
	{
		$result = [];
		for ($i = 0; $i < $maxValue; $i += 2)
			$result[] = $i;
		
		return $result;
	}
/******************************************************************************
/*		2) Вывести определенное количество элементов  последовательности Фибоначчи.
/*****************************************************************************/
	public function getFibbonachi($count) 
	{
		$result = [];
		if (0 > $count)
			return $result;
		
		$result[] = 0;
		if (0 == $count)
			return $result;
		
		$result[] = 1;
		if (1 == $count)
			return $result;
		
		for ($i = 2; $i < $count; $i++)
		{
			$myCount = count($result);
			$result[] = $result[$myCount - 2] + $result[$myCount - 1];
		}
		
		return $result; 
	}
}

/*****************************************************************************/	

$inputArray = array(10, 9, 2, 8, 3, 1, 7, 4, 6, 5);

echo "inputArray = <pre>"; print_r($inputArray); echo "</pre><br>";

$obj1 = new MyArrays($inputArray);

echo "MaxValue = " . $obj1 -> getMaxValue() . "<br>";

echo "SecondMaxValue = " . $obj1 -> getSecondMaxValue() . "<br>";

echo "ArrayLowerZ = <pre>"; print_r($obj1 -> getArrayLowerZ(5)); echo "</pre><br>";

echo "getArraySum = " . $obj1 -> getArraySum() . "<br>";

echo "inArray = " . $obj1 -> inArray(3) . "<br>";

echo "arrayDiff = <pre>"; print_r($obj1 -> arrayDiff(array(1,2,9,10))); echo "</pre><br>";

$obj1 -> arraySort();
echo "arraySort = <pre>"; print_r($obj1 -> getArray()); echo "</pre><br>";

/*****************************************************************************/	

$obj2 = new MyGenerator();
echo "getPositivEvenInteger = <pre>"; print_r($obj2 -> getPositivEvenInteger(21)); echo "</pre><br>";

echo "getFibbonachi = <pre>"; print_r($obj2 -> getFibbonachi(10)); echo "</pre><br>";

?>