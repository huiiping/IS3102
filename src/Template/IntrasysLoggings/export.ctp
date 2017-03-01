<?php

foreach ($data as $row):
	foreach ($row['IntrasysLogging'] as &$cell):
		// Escape double quotation marks
		$cell = '"' . preg_replace('/"/','""',$cell) . '"';
	endforeach;
	//echo implode(',', $row['IntrasysLogging']) . "\n";
endforeach;

?>