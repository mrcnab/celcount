<? ob_start();	 ?>
<div id="header-cont">
    <div class="head-cont"> <h1>WELCOME!</h1><h2><?=SITE_NAME?> Administrator</h2> </div>
        <div class="log-cont">
        <table width="100%" border="0" cellspacing="0">
        <tr>
            <td class="tp-mnu"><!--<a href="#">HELP</a>-->
                <a href="index.php?action=logout">LOGOUT</a>
                <a href="index.php?module_name=profile_settings">PROFILE</a>
                <a href="index.php?tab=home">HOME</a>
            </td>
            <td align="center" style="width:25px;"><!--<img src="images/mnu-sep.gif" alt="mnu-sep" />--></td>
          <!--  <td class="lang">English (US)<img src="images/lang-icon.gif" alt="lang icon" /></td>-->
            <td class="logo"></td>
        </tr>
        </table>
        </div>
        <br class="spacer" />
<!--Start Btm Header-->
    <div class="btm-header">
        <ul>
           <li><a href="index.php?module_name=content_management&file_name=manage_contents&tab=content" <? echo ((isset($_REQUEST['tab']) && $_REQUEST['tab'] == "content") )?"class='topmenu_act'":""; ?>>CONTENT PAGES</a></li>
           <li><span><img src="images/mnu-sep1.gif" alt="sep" /></span></li>
         
             <li><a href="index.php?module_name=news_n_events_management&amp;file_name=manage_news_n_events&amp;tab=news" <? echo ((isset($_REQUEST['tab']) && $_REQUEST['tab'] == "news")) ? "class='topmenu_act'" : ""; ?>>NEWS</a></li>
                     
           <?
			if( $_SESSION['user_admin'] == "4ngadmin" )
			{			
			?>
            <li><span><img src="images/mnu-sep1.gif" alt="sep" /></span></li> 
            <li><a href="index.php?module_name=manage_modules&amp;tab=settings" <? echo ((isset($_REQUEST['tab']) && $_REQUEST['tab'] == "settings")) ? "class='topmenu_act'" : ""; ?>>SETTINGS</a></li>

		<?	}	?>			
        </ul>
        <div class="btm-header2">
        <?
		switch ( $_REQUEST['tab'] )
		{
			case "content":
		?>
            <ul>
        <?
			if( $_SESSION['user_admin'] == "4ngadmin" )
			{			
		?>
                <li><a href="index.php?module_name=content_management&file_name=add_content&tab=content">Add/Edit Content Page</a></li>
                <li><span><img src="images/mnu-sep2.gif" alt="sep2" /></span></li>
       <?	}	?>
                <li><a href="index.php?module_name=content_management&file_name=manage_contents&tab=content">Manage Content Pages</a></li>

            </ul>         
         
				
		
            
      
		<?
			break;
			case "news":
		?>
        	<ul>
                <li>
                    <a href="index.php?module_name=news_n_events_management&amp;file_name=add_news_n_event&amp;tab=news">Add/Edit News/Event(s)</a> 
                </li>
                <li><span><img src="images/mnu-sep2.gif" alt="sep2" /></span></li>
                <li>
                    <a href="index.php?module_name=news_n_events_management&amp;file_name=manage_news_n_events&amp;tab=news">Manage News/Event(s)</a>
                </li>
            </ul>	
        <?
			break;
			case "faq":
		?>
        	<ul>
                <li>
                    <a href="index.php?module_name=faq_management&amp;file_name=add_faq&amp;tab=faq">Add/Edit FAQ(s)</a> 
                </li>
                <li><span><img src="images/mnu-sep2.gif" alt="sep2" /></span></li>
                <li>
                    <a href="index.php?module_name=faq_management&amp;file_name=manage_faqs&amp;tab=faq">Manage FAQ(s)</a>
                </li>
            </ul> 
            	
			 <?
			break;
			
			case "settings";
		?>
        	<ul>
                <li>
                   <a href="index.php?module_name=manage_modules&amp;tab=settings">Manage Modules</a>
                </li>
                <li><span><img src="images/mnu-sep2.gif" alt="sep2" /></span></li>
            </ul>
		<?
			break;
	 	}	//	End of switch ( $_REQUEST['tab'] ) ?>
        </div>
    
    </div>
<!--End Btm Header-->

</div>