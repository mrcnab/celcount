<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search | CelCount</title>
	<?php include("inc/header_tags.php"); ?>
</head>
<body>
<?php include("inc/header.php"); ?>
<div id="content">
  <div id="banner">
    <h2>SEARCH <span>| CELCOUNT<img src="images/star.png" alt="Star" /></span></h2>
    <h3>Search</h3>
  </div>
  <div class="clear"></div>
  <!--<div class="star_rating"> <img src="images/star4.png" alt="" /> <img src="images/star4.png" alt="" /> <img src="images/star4.png" alt="" /> </div>-->
  <div class="clear"></div>
  <div class="user_info_wrap">
    <div class="profile_links" style="height: 275px; width:945px !important;">
    <div class="search-content">

    <ul>
	<form action="search_result.php" name="searchGroupFrom" method="post">	
    <li class="search-group"><strong>SEARCH</strong> <span> GROUPS</span><input name="group_name" type="text" value="Group Name:" onclick="this.value=''" />
     <input name="searchGroup" id="searchGroup" type="submit" class="btn" value="Search" />
    </form>
    <form action="search_result.php" name="searchMemberFrom" method="post">	
    <li class="search-members"><strong>SEARCH</strong> <span> MEMBERS</span>
    <input name="member_name" type="text" value="Member Name:" onclick="this.value=''" />
     <input name="searchMember" id="searchMember" type="submit" class="btn" value="Search" />
   </li>
    </form>		
    </ul>
     </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
  
  
</div>
	<?php include("inc/footer.php"); ?>
</body>
</html>