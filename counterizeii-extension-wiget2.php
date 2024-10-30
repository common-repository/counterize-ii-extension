<?php
/*
------------------------------------------------------------
Copyright (C) 2010 Patners Co.,Ltd. (staff@partnersltd.jp)
------------------------------------------------------------
*/

// add_option('counterizeii_extension_is_view_login_2', 'TRUE' , 'Counterize II EXTENSION - 常に表示するかどうか', 'YES');
add_option('counterizeii_extension_is_view_title_2', 'TRUE' , 'Counterize II EXTENSION - タイトルビューの表示有無', 'YES');
add_option('counterizeii_extension_wiget_name_2', 'アクセスとページビューの合計' , 'Counterize II EXTENSION - ウィジェット名', 'YES');

register_widget_control('Counterize II [アクセスの合計]', 'counterizeii_extension_widget_control_2');
register_sidebar_widget('Counterize II [アクセスの合計]', 'counterizeii_extension_widget_viewer_2');

function counterizeii_extension_widget_viewer_2($args){ extract($args);
	
	$counterizeii_extension_wiget_donate 		= get_option('counterizeii_extension_wiget_donate');
	$counterizeii_extension_is_view_login_2 	= get_option('counterizeii_extension_is_view_login_2');
	$counterizeii_extension_is_view_title_2 	= get_option('counterizeii_extension_is_view_title_2');
	$counterizeii_extension_wiget_name_2 		= get_option('counterizeii_extension_wiget_name_2');
	
	if (($counterizeii_extension_is_view_login_2 == 'TRUE') || (is_user_logged_in())){
			
			if ($counterizeii_extension_is_view_title_2 == 'TRUE') { echo $before_widget . $before_title . $counterizeii_extension_wiget_name_2 . $after_title . '';};
			?>
			<ul>
			<li>１週間: <?php echo counterizeii_extension_get_oneweek_ip(); ?> (<?php echo counterizeii_extension_get_oneweek_pageview(); ?>)</li>
			<li>１カ月: <?php echo counterizeii_extension_get_onemonth_ip(); ?> (<?php echo counterizeii_extension_get_onemonth_pageview(); ?>)</li>
			<li>３カ月: <?php echo counterizeii_extension_get_threemonth_ip(); ?> (<?php echo counterizeii_extension_get_threemonth_pageview(); ?>)</li>
			<li>全期間: <?php echo counterizeii_extension_get_total_ip(); ?> (<?php echo counterizeii_extension_get_total_pageview(); ?>)</li>
			</ul>
			<?php
			
	if ($counterizeii_extension_wiget_donate == 'FALSE'){ echo '<div style="text-align:center;"><br />'.get_links_for_counterizeii_extension_widget().'</div>' ;}
			
			if ($counterizeii_extension_is_view_title_2 == 'TRUE') {echo $after_widget. '';};
	
	}
}

function counterizeii_extension_widget_control_2(){
	
	if (isset($_POST['counterizeii_extension_submit2'])) {
		update_option('counterizeii_extension_wiget_donate', $_POST['counterizeii_extension_wiget_donate']);
		update_option('counterizeii_extension_is_view_login_2', $_POST['counterizeii_extension_is_view_login_2']);
		update_option('counterizeii_extension_is_view_title_2', $_POST['counterizeii_extension_is_view_title_2']);
		update_option('counterizeii_extension_wiget_name_2', $_POST['counterizeii_extension_wiget_name_2']);
	}
	
	$counterizeii_extension_wiget_donate 		= get_option('counterizeii_extension_wiget_donate');
	$counterizeii_extension_is_view_login_2 	= get_option('counterizeii_extension_is_view_login_2');
	$counterizeii_extension_is_view_title_2 	= get_option('counterizeii_extension_is_view_title_2');
	$counterizeii_extension_wiget_name_2		= get_option('counterizeii_extension_wiget_name_2');
	
	?>
	<table style="text-valign:top;">
	<tr>
		<td style="text-valign:top;">カウンタの表示:</td>
		<td style="text-valign:bottom;">
		<select name="counterizeii_extension_is_view_login_2">
		<option value="TRUE" <?php if($counterizeii_extension_is_view_login_2=='TRUE'){ echo('selected');} ?>>常に表示する</option>
		<option value="FALSE" <?php if($counterizeii_extension_is_view_login_2=='FALSE'){ echo('selected');} ?>>ログインユーザのみ</option>
		</select>
		</td>
	</tr>
	</table>
	
	&nbsp;<br />
	
	<table style="text-valign:top;">
	<tr>
		<td style="text-valign:top;">タイトルの表示:</td>
		<td style="text-valign:bottom;">
		<select name="counterizeii_extension_is_view_title_2">
		<option value="TRUE" <?php if($counterizeii_extension_is_view_title_2=='TRUE'){ echo('selected');} ?>>表示する</option>
		<option value="FALSE" <?php if($counterizeii_extension_is_view_title_2=='FALSE'){ echo('selected');} ?>>表示しない</option>
		</select>
		</td>
	</tr>
	</table>
	
	<table style="text-valign:top;">
	<tr><td>タイトル:</td></tr>
	<tr>
		<td>
		<input name="counterizeii_extension_wiget_name_2" type="text" value="<?php echo $counterizeii_extension_wiget_name_2; ?>" />
		</td>
	</tr>
	<tr><td>(例) アクセスとページビューの合計</td></tr>
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
	
	<p><input type="hidden" name="counterizeii_extension_submit2" value="1" /></p>
	
	<?php
}
?>