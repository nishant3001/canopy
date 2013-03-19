<?php
class Dys_Lib{
  public static function date($MySQLDate, $full = true){
		return $full ? date('M d, Y', strtotime($MySQLDate)) : date('M d', strtotime($MySQLDate)) ;
  }

	public static function encrypt($string){
		$base64 =  @openssl_encrypt ($string, OPENSSL_METHOD, OPENSSL_PASS);
		return strtr($base64, '+/=', '-_,');
	}
	
	public static function decrypt($encString){
		$originalBase64 = strtr($encString, '-_,', '+/=');
		return @openssl_decrypt ($originalBase64, OPENSSL_METHOD, OPENSSL_PASS);
	}
	
	public static function encryptAndCompress($string)	{
		return strtr(base64_encode(gzcompress($string, 9)), '+/=', '-_,');
	}
	
	public static function decryptAndUncompress($string){
		return gzuncompress(base64_decode(strtr($string, '-_,', '+/=')));
	}
	
	
	public function imageGreyout($source, $target){
		$info=pathinfo($source);
		$targetInfo=pathinfo($target);
		if (preg_match('/jpg|jpeg/i',$info['extension'])){
			$im = imagecreatefromjpeg($source);
		}
		elseif (preg_match('/png/i',$info['extension'])){
			$im = imagecreatefrompng($source);
		}
		else{
			return false;	
		}

		$layer = imagecreatetruecolor(imagesx($im), imagesy($im));
		imagecopymerge($im, $layer,  0, 0, 0, 0, imagesx($im), imagesy($im), 88);
		
	
		if (preg_match("/png/i",$targetInfo['extension'])){
			imagepng($im,$target); 
		} 
		else {
			imagejpeg($im,$target, 70); 
		}
		imagedestroy($im); 
		imagedestroy($layer);
		return true; 	
	}
	
	public static function imageResize($source, $target, $w, $h, $crop = false){
		/**** Image magic version has been depricated *****/
		/* 
		$pathToConvert = Zend_Registry::get('convert'); # this could be something like /usr/bin/convert or /opt/local/share/bin/convert
        $cmd = "$pathToConvert $source -resize $width" . "x" . "$height $target";
		$c = exec($cmd);
		return $c;
		*/
		
		list($width, $height) = getimagesize($source);
		$r = $width / $height;
		if ($crop) {
			if ($width > $height) {
				$width = ceil($width-($width*($r-$w/$h)));
			} else {
				$height = ceil($height-($height*($r-$w/$h)));
			}
			$newwidth = $w;
			$newheight = $h;
		} else {
			if ($w/$h > $r) {
				$newwidth = $h*$r;
				$newheight = $h;
			} else {
				$newheight = $w/$r;
				$newwidth = $w;
			}
		}
		
		$info=pathinfo($target);
		if (preg_match('/jpg|jpeg/i',$info['extension'])){
			$src=imagecreatefromjpeg($source);
		}
		if (preg_match('/png/i',$info['extension'])){
			$src=imagecreatefrompng($source);
		}
		$dst = imagecreatetruecolor($newwidth, $newheight);
		imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		if (preg_match("/png/i",$info['extension'])){
			imagepng($dst,$target); 
		} 
		else {
			imagejpeg($dst,$target); 
		}
		imagedestroy($dst); 
		imagedestroy($src);
		return true; 	
	}

	public static function jsonEcho($data){
        header("content-type:text/json");
        echo json_encode($data);
        exit;
	}


}  
?>
