<?php 
	ob_start();
	include("inc/ini.php");

	$get_content_page = $content_obj -> get_content_info(7,1);
	if( $get_content_page != false )
	{
		$content_title 			= $get_content_page['content_title'];
		$content_text 			= $get_content_page['content_text'];
		$meta_title 			= $get_content_page['meta_title'];
		$meta_description 		= $get_content_page['meta_description'];
		$meta_keywords 			= $get_content_page['meta_keywords'];
	}	//	End of if( $get_content_page != false )
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$meta_title?> | Celcount</title>
<meta name="keywords" content="<?=$meta_keywords?>" />
<meta name="description" content="<?=$meta_description?>" />
	<?php include("inc/header_tags.php"); ?>
</head>

<body>
	<?php include("inc/header.php"); ?>
<div id="content">
<div class="howitwork">
<div class="howitwork-left">
<img src="http://celcount.wmedesigns.com.au/images/ceclountlog.png" alt="celcountlog" />
<h2>Keep track of the popularity of the most important person in the world
<span style="color:#5db809;">... you!!!</span>
</div>
<div class="howitwork-right">
<h2><?=$content_title?></h2>
<div class="description"><?=$content_text?></div>
<div id="ban_right" class="goleft" style="float:right;margin-right:60px;margin-top: 10px;">
      <p style="font-size:10px;"> Matthew, Carlos Cee and 3 others use CelCount.</p>
      <img src="images/img1.png" alt="image 1" /> <img src="images/img2.png" alt="image 1" /> <img src="images/img3.png" alt="image 1" /> <img src="images/img4.png" alt="image 1" /> <img src="images/img5.png" alt="image 1" /> <img src="images/img6.png" alt="image 1" /> </div>
</div>
</div>
  
</div>
	<?php include("inc/footer.php"); ?>
</body>
</html>