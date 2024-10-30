<?php
/*
------------------------------------------------------------
Copyright (C) 2010 Patners Co.,Ltd. (staff@partnersltd.jp)
------------------------------------------------------------
*/

add_option('counterizeii_extension_is_view_title_1', 'TRUE' , 'Counterize II EXTENSION - タイトルビューの表示有無', 'YES');
add_option('counterizeii_extension_is_view_online', '3' , 'Counterize II EXTENSION - オンラインユーザの表示有無', 'YES');

add_option('counterizeii_extension_wiget_name_1', '最近のアクセスとページビュー' , 'Counterize II EXTENSION - ウィジェット名', 'YES');

register_widget_control('Counterize II [最近のアクセス]', 'counterizeii_extension_widget_control_1');
register_sidebar_widget('Counterize II [最近のアクセス]', 'counterizeii_extension_widget_viewer_1');

function counterizeii_extension_widget_viewer_1($args){ extract($args);
	
	$counterizeii_extension_wiget_donate 		= get_option('counterizeii_extension_wiget_donate');
	$counterizeii_extension_is_view_login_1 	= get_option('counterizeii_extension_is_view_login_1');
	$counterizeii_extension_is_view_title_1 	= get_option('counterizeii_extension_is_view_title_1');
	$counterizeii_extension_wiget_name_1 		= get_option('counterizeii_extension_wiget_name_1');
	$counterizeii_extension_is_view_online 		= get_option('counterizeii_extension_is_view_online');
	
	if (($counterizeii_extension_is_view_login_1 == 'TRUE') || (is_user_logged_in())){
			
		if ($counterizeii_extension_is_view_title_1 == 'TRUE') { echo $before_widget . $before_title . $counterizeii_extension_wiget_name_1 . $after_title . '';};
		?>
		
		<ul>
		<?php
		if ($counterizeii_extension_is_view_online == 'UPPER'){
			?>
			<li>現　在: <?php echo counterize_get_online_users(); ?></li>
			<?php
		}
		?>
		
		<li>本　日: <?php echo counterizeii_extension_get_today_ip(); ?> (<?php echo counterizeii_extension_get_today_pageview(); ?>)</li>
		<li>昨　日: <?php echo counterizeii_extension_get_yesterday_ip(); ?> (<?php echo counterizeii_extension_get_yesterday_pageview(); ?>)</li>
		<li>３日前: <?php echo counterizeii_extension_get_threedaysago_ip(); ?> (<?php echo counterizeii_extension_get_threedaysago_pageview(); ?>)</li>
		
		<?php
		if ($counterizeii_extension_is_view_online == 'LOWER'){
			?>
			<li>現　在: <?php echo counterize_get_online_users(); ?></li>
			<?php
		}
		?>
		
		</ul>
		<?php
		
		if ($counterizeii_extension_wiget_donate == 'FALSE'){ echo '<div style="text-align:center;"><br />'.get_links_for_counterizeii_extension_widget().'</div>' ;}
		
		if ($counterizeii_extension_is_view_title_1 == 'TRUE') {echo $after_widget. '';};
		
	}
}

function counterizeii_extension_widget_control_1(){
	
	if (isset($_POST['counterizeii_extension_submit1'])) {
		update_option('counterizeii_extension_wiget_donate', $_POST['counterizeii_extension_wiget_donate']);
		update_option('counterizeii_extension_is_view_login_1', $_POST['counterizeii_extension_is_view_login_1']);
		update_option('counterizeii_extension_is_view_title_1', $_POST['counterizeii_extension_is_view_title_1']);
		update_option('counterizeii_extension_wiget_name_1', $_POST['counterizeii_extension_wiget_name_1']);
		update_option('counterizeii_extension_is_view_online',$_POST['counterizeii_extension_is_view_online']);
	}
	
	$counterizeii_extension_wiget_donate 		= get_option('counterizeii_extension_wiget_donate');
	$counterizeii_extension_is_view_login_1 	= get_option('counterizeii_extension_is_view_login_1');
	$counterizeii_extension_is_view_title_1 	= get_option('counterizeii_extension_is_view_title_1');
	$counterizeii_extension_wiget_name_1 		= get_option('counterizeii_extension_wiget_name_1');
	$counterizeii_extension_is_view_online 		= get_option('counterizeii_extension_is_view_online');
	
	?>
	<table style="text-valign:top;">
	<tr>
		<td style="text-valign:top;">カウンタの表示:</td>
		<td style="text-valign:bottom;">
		<select name="counterizeii_extension_is_view_login_1">
		<option value="TRUE" <?php if($counterizeii_extension_is_view_login_1=='TRUE'){ echo('selected');} ?>>常に表示する</option>
		<option value="FALSE" <?php if($counterizeii_extension_is_view_login_1=='FALSE'){ echo('selected');} ?>>ログインユーザのみ</option>
		</select>
		</td>
	</tr>
	</table>
	
	&nbsp;<br />
	
	<table style="text-valign:top;">
	<tr>
		<td style="text-valign:top;">タイトルの表示:</td>
		<td style="text-valign:bottom;">
		<select name="counterizeii_extension_is_view_title_1">
		<option value="TRUE" <?php if($counterizeii_extension_is_view_title_1=='TRUE'){ echo('selected');} ?>>表示する</option>
		<option value="FALSE" <?php if($counterizeii_extension_is_view_title_1=='FALSE'){ echo('selected');} ?>>表示しない</option>
		</select>
		</td>
	</tr>
	</table>
	
	<table style="text-valign:top;">
	<tr><td>タイトル:</td></tr>
	<tr>
		<td>
		<input name="counterizeii_extension_wiget_name_1" type="text" value="<?php echo $counterizeii_extension_wiget_name_1; ?>" />
		</td>
	</tr>
	<tr><td>(例) 最近のアクセスとページビュー</td></tr>
	</table>
	
	&nbsp;<br />
	
	<table style="text-valign:top;">
	<tr>
		<td style="text-valign:top;">オンラインユーザ:</td>
		<td style="text-valign:bottom;">
		<select name="counterizeii_extension_is_view_online">
		<option value="UPPER" <?php if($counterizeii_extension_is_view_online=='UPPER'){ echo('selected');} ?>>表示する(上)</option>
		<option value="LOWER" <?php if($counterizeii_extension_is_view_online=='LOWER'){ echo('selected');} ?>>表示する(下)</option>
		<option value="FALSE" <?php if($counterizeii_extension_is_view_online=='FALSE'){ echo('selected');} ?>>表示しない</option>
		</select>
		</td>
	</tr>
	</table>
	
	&nbsp;<br />
	
	<table style="text-valign:top;">
	<tr>
		<td style="text-valign:top;">ステータス:</td>
		<td style="text-valign:bottom;">
		<select name="counterizeii_extension_wiget_donate">
		<option value="FALSE" <?php if($counterizeii_extension_wiget_donate=='FALSE'){ echo('selected');} ?>>寄付していません</option>
		<option value="TRUE" <?php if($counterizeii_extension_wiget_donate=='TRUE'){ echo('selected');} ?>>寄付しました</option>
		</select>
		</td>
	</tr>
	<tr>
		<td style="text-valign:top;"></td>
		<td style="text-valign:top;">
		&nbsp;<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CZGZ9BZ9SYHKL" target="_blank">開発者に寄付する</a>
		</td>
	</tr>
	</table>
	
	<p><input type="hidden" name="counterizeii_extension_submit1" value="1" /></p>
	
	<?php
}
?>