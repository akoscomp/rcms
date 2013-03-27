<?php
class oath
{
	function check_key($key,$response,$counter= -1,$variability = 1)
	{
		if($counter = -1)
		{
			$counter = $this->get_time_counter();
		}
		for($i=$counter-$variability;$i<=$counter+$variability;$i++)
		{
			$values[] = $this->oath_key($key,$i,strlen($response));
		}
		return(in_array($response,$values) && !empty($response));
	}
	
	function get_time_counter()
	{
		return floor(gmmktime()/60);
	}
	
	function oath_key($key,$counter,$length=6)
	{
		return $this->oath_truncate($this->oath_hotp($key,$counter),$length);
	}

	function oath_hotp ($key, $counter)
	{
		// Counter
		//the counter value can be more than one byte long, so we need to go multiple times
		$cur_counter = array(0,0,0,0,0,0,0,0);
		for($i=7;$i>=0;$i--)
		{
			$cur_counter[$i] = pack ('C*', $counter);
			$counter = $counter >> 8;
		}
		$bin_counter = implode($cur_counter);
		// Pad to 8 chars
		if (strlen ($bin_counter) < 8)
		{
			$bin_counter = str_repeat (chr(0), 8 - strlen ($bin_counter)) . $bin_counter;
		}

		// HMAC
		$hash = hash_hmac ('sha1', $bin_counter, $key);
		return $hash;
	}

	function oath_truncate($hash, $length = 6)
	{
		// Convert to dec
		foreach(str_split($hash,2) as $hex)
		{
			$hmac_result[]=hexdec($hex);
		}

		// Find offset
		$offset = $hmac_result[19] & 0xf;

		// Algorithm from RFC
		return
		(
			(($hmac_result[$offset+0] & 0x7f) << 24 ) |
			(($hmac_result[$offset+1] & 0xff) << 16 ) |
			(($hmac_result[$offset+2] & 0xff) << 8 ) |
			($hmac_result[$offset+3] & 0xff)
		) % pow(10,$length);
	}
}
?>