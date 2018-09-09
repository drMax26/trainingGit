<?php
ini_set('error_reporting', E_ALL);


class MyArrays
{
	public $array;
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
		$this -> array = $arr;
		$this -> arraySize = count($this -> array);
		$this -> maxValue = null;
		$this -> secondMaxValue = null;
		$this -> arraySum = null;
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
		
		$this -> maxValue = $this -> array[0];
		
		for ($i = 1; $i < $this -> arraySize; $i++)
			if ($this -> maxValue < $this -> array[$i])
				$this -> maxValue = $this -> array[$i];
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
		
		if ($this -> maxValue != $this -> array[0])
			$this -> secondMaxValue = $this -> array[0];
		else
			$this -> secondMaxValue = $this -> array[1];
		
		for ($i = 1; $i < $this -> arraySize; $i++)
			if (($this -> secondMaxValue < $this -> array[$i]) AND ($this -> maxValue > $this -> array[$i]))
				$this -> secondMaxValue = $this -> array[$i];
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
			if ($this -> array[$i] > $Z)
				$arrayLowerZ[] = $Z;
			else
				$arrayLowerZ[] = $this -> array[$i];
		
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
			$this -> arraySum += $this -> array[$i];
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
/*			6	in_array
/*****************************************************************************/
	public function inArray(int $Z)
	{
		if (0 == $this -> arraySize)
		{
			null;
		}
		
		for ($i = 0; $i < $this -> arraySize; $i++)
			if ($Z == $this -> array[$i])
				return $i;
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

?>