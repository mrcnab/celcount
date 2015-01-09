<?php 
	ob_start();
	include("inc/ini.php");

	$get_content_page = $content_obj -> get_content_info(3,1);
	if( $get_content_page != false )
	{
		$content_title 			= $get_content_page['content_title'];
		$content_text 			= $get_content_page['content_text'];
		$meta_title 			= $get_content_page['meta_title'];
		$meta_description 		= $get_content_page['meta_description'];
		$meta_keywords 			= $get_content_page['meta_keywords'];
	}	//	End of if( $get_content_page != false )

if(isset($_POST['btnSubmit'])){

		$email_content = $content_obj ->	select_email();
		$admin_email =	$email_content['user_email'];
		
		$txtFName		=	$_REQUEST['txtFName'];
		$txtEmail		=	$_REQUEST['txtEmail'];
		$txtPhone		=	$_REQUEST['txtPhone'];
		$txtMobile		=	$_REQUEST['txtMobile'];
		$enquiry		=	$_REQUEST['enquiry'];
	

  $EmailBody = "<table width='755' border='0' align='center' cellpadding='0' cellspacing='0' style='border:0px solid #41ad49;'>
				  <tr>
					<td>
					<table width='100%' border='0' align='center'>
				  </tr>
			<tr>
					<td><table width='100%' align='center' border='0' cellspacing='0' cellpadding='0'>
				  <tr>
						<td colspan='2' nowrap='nowrap' style='font-family:Georgia;font-size: 11px;font-style: normal;color: #000000;text-decoration: none;background-color: #F9D9ED;vertical-align:middle;text-align:center;height:30px;'><span  style='font-family: Georgia;font-size: 12px;font-weight: normal;color:#000000;text-decoration: none; ' >New Enquiry from ".$txtFName." through contact us form </span></td>
    			  </tr>
					 </table>
					</td>
				  </tr>
					<td align='left'>
					<table width='100%' cellpadding='0' cellspacing='8' border='0' bgcolor='#ffffff'>
                            <tr style='font-family: Georgia;font-size: 11px;font-style: normal;color:#000;text-decoration: none;vertical-align:middle;text-align:left;height:20px;text-indent:10px;'>
                                <td style='font-weight:bold;' width='200'>Full Name:</td>
                                <td>".$txtFName."</td>
                            </tr>                           
                            <tr style='font-family: Georgia;font-size: 11px;font-style: normal;color:#000;text-decoration: none;vertical-align:middle;text-align:left;height:20px;text-indent:10px;'>
                                <td style='font-weight:bold;'>Email Address:</td>
                                <td>".$txtEmail."</td>
                            </tr> 
							<tr style='font-family: Georgia;font-size: 11px;font-style: normal;color:#000;text-decoration: none;vertical-align:middle;text-align:left;height:20px;text-indent:10px;'>
                                <td style='font-weight:bold;'>Phone Number:</td>
                                <td>".$txtPhone."</td>
                            </tr> 
							<tr style='font-family: Georgia;font-size: 11px;font-style: normal;color:#000;text-decoration: none;vertical-align:middle;text-align:left;height:20px;text-indent:10px;'>
                                <td style='font-weight:bold;'>Enquiry </td>
                                <td>".$enquiry."</td>
                            </tr> 
						
						 
                    </table>
					</td>
				  </tr>
				</table></td>
				  </tr>				  
				  <tr>
					<td><table width='100%' align='center' border='0' cellspacing='0' cellpadding='0'>
				  <tr>
			<td colspan='2' nowrap='nowrap' style='font-family:Georgia;font-size: 11px;font-style: normal;color: #000000;text-decoration: none;background-color: #F9D9ED;vertical-align:middle;text-align:center;height:30px;'><span  style='font-family: Georgia;font-size: 12px;font-weight: normal;color:#000000;text-decoration: none; '>&nbsp;&nbsp;&nbsp;All rights reserved to <span  style='font-family: Georgia;font-size: 12px;font-weight: bold;color:#000000;text-decoration: none; ' ><a href=''# target='_blank' style='font-family: Georgia;font-weight: bold;color:#000000;text-decoration: none; ' >CellCount</a></span></td>
							  </tr>
					 </table>
					</td>
				  </tr>
				</table>";
	
			
			$mail = new PHPMailer();
			$mail->AddReplyTo($admin_email,"CelCount");
			$mail->WordWrap = 50;                              // set word wrap
			$mail->IsHTML(true);                               // send as HTML
			$mail->From     = $txtEmai;
			$mail->FromName = $txtFName;
			$mail->Subject  = "Contact Us CelCount";
			$mail->Body = $EmailBody;
			$mail->AddAddress($admin_email, "Administrator MSOSN");
			if(!$mail->Send())
				{				
							
						header("Location: contactus.php?flag=2");
				}
				else
				{
					
						header("Location: contactus.php?flag=1");
				}
			

		}

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
<div class="description">
<?=$content_text?><br />

        <? if($_REQUEST['flag']==1){
            ?>              <br class="spacer" />
            <?
            echo '<strong>Thank you for your enquiry. We will contact you very soon.</strong>';
            }
            else if($_REQUEST['flag']==2){
            ?>              <br class="spacer" /><?
            echo '<strong>Sorry. There was some error. Please try again.</strong>';
            
            }
            
            ?>
  <form name="frmContactUs" id="frmContactUs" method="post" action="contactus.php"> 
<div class="form">
<ul>
<li><input type="text" name="txtFName" id="txtFName"  <? if($_REQUEST['txtFName'] =='' ||  $_REQUEST['txtFName'] == 'Full Name') {?> value="Full Name" <? } else {?> value="<?=$_REQUEST['txtFName']?>" <? }?>  class="validate[required] txtfield"   onclick="this.value=''" /></li>
<li><input type="text" name="txtEmail" id="txtEmail" <? if($_REQUEST['txtEmail'] =='' ||  $_REQUEST['txtEmail'] == 'Email Address') {?> value="Email Address" <? } else {?> value="<?=$_REQUEST['txtEmail']?>" <? }?>   class="validate[required,custom[email],length[0,100]] txtfield"    onclick="this.value=''" /></li>
<li><input type="text" name="txtPhone" id="txtPhone"  <? if($_REQUEST['txtPhone'] =='' ||  $_REQUEST['txtPhone'] == 'Phone') {?> value="Phone" <? } else {?> value="<?=$_REQUEST['txtPhone']?>" <? }?>   class="txtfield"   onclick="this.value=''" /></li>
<li><textarea class="validate[required] txtfield" id="enquiry" name="enquiry" onclick="this.value=''" ><? if($_REQUEST['enquiry'] =='' ||  $_REQUEST['enquiry'] == 'Comments') {?> Comments <? } else {?> <?=$_REQUEST['enquiry']?> <? }?>  </textarea></li>
<li class="send"><input name="btnSubmit" id="btnSubmit" type="submit" class="btn" value="Submit" /></li>

<li class="note"><em>*All fields are required</em></li>
</ul>
</div>
</form>
</div>
<div id="ban_right" class="goleft" style="float:right;margin-right:60px;margin-top: 10px;">
      <p style="font-size:10px;"> Matthew, Carlos Cee and 3 others use CelCount.</p>
      <img src="images/img1.png" alt="image 1" /> <img src="images/img2.png" alt="image 1" /> <img src="images/img3.png" alt="image 1" /> <img src="images/img4.png" alt="image 1" /> <img src="images/img5.png" alt="image 1" /> <img src="images/img6.png" alt="image 1" /> </div>
</div>
</div>
  
</div>
	<?php include("inc/footer.php"); ?>
</body>
</html>