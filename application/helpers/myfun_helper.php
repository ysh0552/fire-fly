<?php

/**
 * 案例图片显示
 **/
function caseImg($title,$imgurl,$content,$link){
	
	if(empty($title)){
		$str = '没有数据';
		$title = $str;
		$imgurl =  base_url('index/noimages.jpg');
		$contents = $str;
		$links = '';
	}else{
		$links = $link?site_url('cases/casecon').'/'.$link:'#';
		$contents = str_replace('|','<br/>',strip_tags($content));
		if($imgurl){
			$imgurl = base_url('upload').'/'.$imgurl;
		}else{
			$imgurl = base_url('index/noimages.jpg');	
		}
	}
	
	$html = '';
	$html .= '<a href="'.$links.'">';
	$html .= '<img src="'.$imgurl.'" class="img">';
	$html .= '<div class="cover_case"><p><span class="tittle">'.$title.'</span><span class="des">'.$contents.'</span></p></div>';
	$html .= '</a> ';
	
	
	return $html;
	
}






/* -----------------------------------------------------------
 * 处理缩略图（源文件路径，保存缩略图路径，图片类型，最大宽度，最大高度）
 * ---------------------------------------------------------- */
function imgThumb($sourceFile,$thumbUrl,$types,$maxwidth=120,$maxheight=120)
{
	if($types !='')
	{
		$imgs=getimagesize($sourceFile);
		$im='';
		switch($types){
			case 'jpg':
				$im=imagecreatefromjpeg($sourceFile);
				break;
			case 'png':
				$im=imagecreatefrompng($sourceFile);
				break;
			case 'gif':
				$im=imagecreatefromgif($sourceFile);
				break;
			case 'bmp':
				$im=imagecreatefromwbmp($sourceFile);
				break;
			default:
				echo '文件类型错误！';
				return;
		}
	}
	
	$width = imagesx($im);
	$height = imagesy($im);
	$RESIZEWIDTH=false;
	$RESIZEHEIGHT=false;
	if(($maxwidth && $width > $maxwidth) || ($maxheight && $height > $maxheight)){
		if($maxwidth && $width > $maxwidth){
			$widthratio = $maxwidth/$width;
			$RESIZEWIDTH=true;
		}
		if($maxheight && $height > $maxheight){
			$heightratio = $maxheight/$height;
			$RESIZEHEIGHT=true;
		}
		if($RESIZEWIDTH && $RESIZEHEIGHT){
			if($widthratio < $heightratio){
				$ratio = $widthratio;
			}else{
				$ratio = $heightratio;
			}
		}elseif($RESIZEWIDTH){ 
			$ratio = $widthratio;
		}elseif($RESIZEHEIGHT){ 
			$ratio = $heightratio;
		}
			$newwidth = $width * $ratio; 
			$newheight = $height * $ratio; 						
	}else{
		$newwidth = $width; 
		$newheight = $height; 						
	}
			
	/* 图像失真解决 */
	if(function_exists("imagecopyresampled"))
	{
		$thumb=imagecreatetruecolor($newwidth,$newheight);
		imagecopyresampled($thumb,$im,0,0,0,0,$newwidth,$newheight,$imgs[0],$imgs[1]);
	}else{
		$thumb=imagecreate($newwidth,$newheight);
		imagecopyresized($thumb,$im,0,0,0,0,$newwidth,$newheight,$imgs[0],$imgs[1]);
	}
	
	imagejpeg($thumb,$thumbUrl);
	imagedestroy($thumb);
				
}

function delDirAndFile( $dirName )
{
if($handle = opendir("$dirName")){
	while(false !== ( $item = readdir( $handle ) ) ){
		if($item != "." && $item != ".." ){
		if(is_dir( "$dirName/$item" ) ) {
			delDirAndFile( "$dirName/$item" );
		}else{
		if(unlink( "$dirName/$item"))echo "";

				}
			}
		}
		closedir($handle);
		if(rmdir($dirName))echo "";
	}
}


/* ----------------------------------------
 * 该函数用于删除文件和文件夹
 * ---------------------------------------- */
function dirDelete($dir){

	$dir = dirPath($dir);
	if (!is_dir($dir)){
		return false;
	}
	$list = glob($dir.'*');
	foreach ($list as $v){
		is_dir($v)?dirDelete($v):@unlink(iconv('utf-8','gb2312',$v),0777,true);
	}
	return @rmdir($dir);
}


/* ----------------------------------------
 * 该函数用于将路径标准化
 * ---------------------------------------- */
function dirPath($path){
	$path = str_replace('\\', '/', $path);
	if (substr($path, -1) != '/')
	$path = $path . '/';
	return $path;
}


/* ----------------------------------------
 * 判断是手机访问还是电脑访问
 * ---------------------------------------- */
function isMobile(){ 
	$useragent=isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''; 
	$useragent_commentsblock=preg_match('|\(.*?\)|',$useragent,$matches)>0?$matches[0]:'';    
	function CheckSubstrs($substrs,$text)
	{ 
		foreach($substrs as $substr) 
			if(false!==strpos($text,$substr)){ 
				return true; 
			}
		return false; 
	}
	$mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
	$mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod'); 
	$found_mobile=CheckSubstrs($mobile_os_list,$useragent_commentsblock) || 
	CheckSubstrs($mobile_token_list,$useragent); 
	if ($found_mobile){ 
		return true; 
	}else{ 
		return false; 
	} 
}



/* ----------------------------------------
 * 获取客户端IP
 * ---------------------------------------- */
function getIP()
{
	global $ip;
	if (getenv("HTTP_CLIENT_IP"))
	$ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR"))
	$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR"))
	$ip = getenv("REMOTE_ADDR");
	else $ip = "Unknow";
	return $ip;
}

//操作提示,跳转链接
function admin_msg($url='back',$msg='')
{
	header("Content-type:text/html;charset=utf-8");
	echo '<script type="text/javascript">';

	if($msg !='')
	{
		echo 'alert("'.$msg.'");';
	}
	if($url == 'back')
	{
		echo 'history.go(-1)';
	}else{
		echo 'location.href="'.site_url($url).'"';
	}
	echo '</script>';
	
}


/* ----------------------------------------
 * 获取字符串字节数
 * ---------------------------------------- */
function hmStrlen($str){
	if($str == "") return 0;
	$length = strlen($str);
	$i = 0;
	$bytes = 0;
	while($i<$length){
		$asc2 = ord(substr($str, $i, 1));
		if($asc2 >= 224){
			$bytes += 2;
			$i += 3;
		}elseif($asc2 >= 192){
			$bytes += 2;
			$i += 2;
		}else{
			$i++;
			$bytes++;
		}
	}
	return $bytes;
}

/* ----------------------------------------
 * 以字节数截取字符串
 * ---------------------------------------- */
function hmSubstr($str, $byte){
	if(is_null($str)) return "";
	if($str == "") return  "";
	if($byte < 1) return $str;
	$len = strlen($str);
	if($len < $byte) return $str;
	$num = 0;
	$result = "";
	$i = 0;
	while($i < $len){
		$asc2 = ord(substr($str, $i, 1));
		if($asc2 >= 224){
			$space = 3;
		}elseif($asc2 >= 192){
			$space = 2;
		}else{
			$space = 1;
		}
		$num += ($space > 1) ? 2 : 1;
		if($num > $byte){
			return $result;
		}elseif($num == $byte){
			return ($i + $space == $len) ? $str : ($result."..") ;
		}else{
			$result .= substr($str, $i, $space);
			if(($num + 1 > $byte) && ($i + $space < $len)){
				return $result."..";
			}
			
		}
		$i += $space;
	}
	return $result;
}









?>