<?php
class image
{
	//取得图片信息
	function getImageInfo($img)
	{
		$img_info = getimagesize($img);

        switch ($img_info[2])
        {
			case 1:
				$imgtype = "GIF";
            break;

            case 2:
                $imgtype = "JPG";
            break;

            case 3:
                $imgtype = "PNG";
            break;
         }

         $img_size = number_format(filesize($img)/1024,2)."k";

         $new_img_info = array (
                                    "width"  => $img_info[0],
                                    "height" => $img_info[1],
                                    "type"   => $imgtype,
                                    "size"   => $img_size
                                  );
         return $new_img_info;
	}

        //返回图片被限制大小后的尺寸
    function getZoomSize($srcW,$srcH,$dstW,$dstH)
	{
            $devideW = $devideH = 0;
            $tmp     = 1;

            if ($srcW > $dstW) $devideW = $srcW / $dstW;
            if ($srcH > $dstH) $devideH = $srcH / $dstH;

            if      ($devideW > $devideH && $devideW > 1) $tmp = $devideW;
            else if ($devideH > $devideW && $devideH > 1) $tmp = $devideH;

            $dstW = $srcW / $tmp;
            $dstH  =$srcH / $tmp;

            return array($dstW, $dstH);
	}

        //图片缩放
	function imageZoom($srcFile,$dstW='',$dstH='',$url='')
	{
            header("Content-type: image/jpeg");

            $data = GetImageSize($srcFile,$info);

            switch ($data[2]) {
                case 1:
                $im = @ImageCreateFromGIF($srcFile);
                break;
                case 2:
                $im = @ImageCreateFromJPEG($srcFile);
                break;
                case 3:
                $im = @ImageCreateFromPNG($srcFile);
                break;
            }

            $srcW=ImageSX($im);
            $srcH=ImageSY($im);

            $newsize = $this->getZoomSize($srcW,$srcH,$dstW,$dstH);

            $dstW    = $newsize[0];
            $dstH    = $newsize[1];


            if (function_exists("ImageCreateTruecolor"))
                $ni =ImageCreateTruecolor($dstW,$dstH);
            else $ni =ImageCreate($dstW,$dstH);

            ImageCopyResized ($ni, $im, 0, 0, 0, 0, $dstW, $dstH, $srcW, $srcH);

            if($url=="") imagejpeg($ni);
            else if (!imagejpeg($ni,$url)) return new sfException(lang::get("Was error!"));

            ImageDestroy ($ni);
            ImageDestroy ($im);
	}

        //生成验证码图片
	function createSafetyCode($randStr='',$imgW=60,$imgH=20,$font=20)
	{
			header ("content-type: image/png");
            $image = imagecreate($imgW , $imgH);
			if(!$randStr) $randStr = mt_rand(600,66666);
			$_SESSION['SafetyCode'] = $randStr;
            $color_white = imagecolorallocate($image , 255 , 255 , 255);
            $color_gray  = imagecolorallocate($image , 180 , 180 , 180);
            $color_black = imagecolorallocate($image , 100 , 100 , 100);
            for ($i = 0 ; $i < 600 ; $i++) imagesetpixel($image , mt_rand(0 , $imgW) , mt_rand(0 , $imgH) , $color_gray);
			imagestring($image,$font,6,2,$randStr,$color_black);
			//imagettftext($image,16,0,5,20,$color_black,"Tuffy.ttf",$randStr);
            imagerectangle($image , 0 , 0 , $imgW - 1 , $imgH - 1 , $color_gray);
            imagepng($image);
            imagedestroy($image);
	}

} //end class
?>