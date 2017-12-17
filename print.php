<?php

	function printfile($printer = "Microsoft Print to PDF", $file = array('D:/test/word/33.pdf'), $num = 1)
	{
		$print_str = 'soffice --headless --pt "'.$printer.'" ';
		if (is_array($file)) {
			$new_file = array();
			for ($i = 0; $i < $num; $i++) {
				$new_file = array_merge($new_file, $file);
			}
		
			foreach ($new_file as $key => $value) {
				if (!file_exists($value)) {
					continue;
				}
				$print_str .= $value.' ';
			}
	
		
			echo pclose(popen("start /B ". $print_str, "r"));  
		} else {
			if (!file_exists($file)) {
				return -1;
			}
			$print_str .= $file;
			exec($print_str.' 2>&1');
		}
	}
	echo1("start");
	printfile();
	echo1("over");
	echo1(php_uname());
	
	function echo1($str)
	{
		echo $str;
		echo "<br>";
	}
	
	function var_dump1($info)
	{
		echo "<pre>";
		var_dump($info);
		echo "</pre>";
	}