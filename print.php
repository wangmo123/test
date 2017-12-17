<?php
/**
 * 批量打印文件
 * @param printer 打印机名称，未传值或者传值错误时，将启用默认打印机
 * @param file   字符串或数组，非法字符过滤，自己过滤 （= =）
 * @param num  file里的文件要打印的份数
 */
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
		echo pclose(popen("start /B ". $print_str, "r"));  //此方式避免php程序挂起，后台执行打印
	} else {
		if (!file_exists($file)) {
			return -1;
		}
		$print_str .= $file;
		echo pclose(popen("start /B ". $print_str, "r"));  
	}
}

