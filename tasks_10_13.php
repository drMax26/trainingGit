<?php
ini_set('error_reporting', E_ALL);

class MyString
{
	private $myString;
	private $stringSize;
	
	
	public function __construct(string $string)
	{
		$this->myString = $string;
		$this->stringSize = strlen($this->myString);
	}
	
	public function getString()
	{
		return $this->myString;
	}
	
/******************************************************************************
/*		10) strpos
/*****************************************************************************/		
	public function strpos(string $findString, int $offset = 0)
	{
		$findStringSize = strlen($findString);
		for ($i = $offset; $i < ($this->stringSize - $findStringSize); $i++) {
			if($this->substr($i, $findStringSize) == $findString) {
				return $i;
			}
		}
		
		return  FALSE;
	}
	
/******************************************************************************
/*		11) substr
/*****************************************************************************/		
	public function substr(int $start = 0, int $length = -1)
	{
		if ($stringSize < $start) {
			return FALSE;
		}
		$result = '';
		$endposition = $this->stringSize;
		
		if ((-1 != $length) && ($start + $length < $this->stringSize)) {
			$endposition = $start + $length;
		}
		
		for ($i = $start; $i < $endposition; $i++) {
			$result .= $this->myString{$i};
		}

		return $result;
	}
/******************************************************************************
/*		12) substr_count
/*****************************************************************************/	
	public function substr_count(string $findString, int $start = 0, int $length = -1)
	{
		$count = 0;
		$endposition = $this->stringSize;
		$findStringSize = strlen($findString);
		
		if ((-1 != $length) && ($start + $length < $this->stringSize)) {
			$endposition = $start + $length;
		}
		
		for ($i = $start; $i < $endposition; $i++) {
			if ($findString == $this->substr($i, $findStringSize)) {
				$count++;
			}
		}
		
		return $count;
	}
	
/******************************************************************************
/*		13) explode
/*****************************************************************************/	
	public function explode(string $separator, int $maxCount = -1)
	{
		if ('' == $separator) {
			return false;
		}
		$result = [];
		$start = 0;
		$separatorSize = strlen($separator);
		
		for ($i = 0; $i < ($this->stringSize - $separatorSize); $i++)
		{
			if ($separator == $this->substr($i, $separatorSize)) {
				if (0 == $start) {
					$result[] = $this->substr(0, $i);
				} else {
					$result[] = $this->substr(($start + $separatorSize), $i - $start - $separatorSize);
				}
				
				$start = $i;
				if ($maxCount == count($result))
					return $result;
			}
		}
		$result[] = $this->substr(($start + $separatorSize));
		return $result;
	}
}


$obj = new MyString('test string for testing string class');

echo 'My String = ' . $obj->getString() . '<br>';

echo 'strpos("est", 5) = ' . $obj->strpos('est', 5) . '<br>';

echo 'substr(2, 5) = ' . $obj->substr(2, 5) . '<br>';

echo 'substr("est", 0) = ' . $obj->substr_count('est', 0) . '<br>';
echo 'substr("ng", 0, 25) = ' . $obj->substr_count('ng', 0, 25) . '<br>';

echo 'explode("t") = <pre>'; 
print_r($obj->explode('ri'));
echo '</pre>';

print_r(explode('ri', 'test string for testing string class'));


?>