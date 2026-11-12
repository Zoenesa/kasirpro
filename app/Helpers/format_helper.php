<?php

/**
Helper format
https://cepatonline.com
 */

function format_ribuan($value)
{
	if (!$value)
		return 0;
	return number_format($value, 0, ',', '.');
}
