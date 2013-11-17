<?php
	function rKeyGen($length)
	{
		$j=0;
		for($i=48;$i<=57;$i++)
		{
			$poss[$j]=chr($i);
			$j++;
		}

		for($i=65;$i<=90;$i++)
		{
			$poss[$j] = chr($i);
			$j++;
		}

		for($i=97;$i<=122;$i++)
		{
			$poss[$j] = chr($i);
			$j++;
		}
		$temp = "";
		
		for($i=1;$i<=$length;$i++)
		{
			$temp = $temp . $poss[array_rand($poss)];
		}
		return $temp;
	}
?>