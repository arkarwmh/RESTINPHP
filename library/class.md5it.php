<?php
/**
 * File: class.md5it.php
 * Class: md5it
 * Decscription: Core Class for MD5 Based Advanced Encryption
 *
 * Package: REST-in PHP (RIP) Framework
 * Author: Arkar WINN MINN HTWE 
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013
 */
 
class md5it {
	function __construct($str,$key){
		$this->code = $key; // !!!IMPORTANT this must stay the same every time you use the function
		$this->level = 10; // how many times to run the encryptor
		$this->add = 5; // how many characters from $this->code to add to the start/end of md5
		$this->str = $str; // the string to be processed
		$this->double = true; // set to false to stop running md5 on the substr added to start/end of md5
		$this->create(); // initiate the class
	}
	function create(){
		$limit = ($this->add)*($this->level);
		if(strlen($this->code) < $limit){
			$change = ceil($limit/strlen($this->code));
			$code = $this->code;
			for($a=1;$a<=$change;$a++){
				$code = $code.$this->code;
			}
		}
		else{
			$code = $this->code;
		}
		$value = md5($this->str);
		for($b=1;$b<=$this->level;$b++){
			if(!isset($c)){
				$c = 0;
			}
			$code_len = strlen($code);
			if($this->double == true){
				$next = md5(substr($code,$c,$this->add)).$value.md5(substr($code,($code_len-$c-$this->add),$this->add));
			}
			else{
				$next = substr($code,$c,$this->add).$value.substr($code,($code_len-$c-$this->add),$this->add);
			}
			$c = $c + $this->add;
			$value = md5($next);
		}
		$this->value = $value;
	}
}
