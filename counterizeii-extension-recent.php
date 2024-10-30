<?php
/*
------------------------------------------------------------
Copyright (C) 2010 Patners Co.,Ltd. (staff@partnersltd.jp)
------------------------------------------------------------
*/

// 本日のアクセス（ユニークアクセス）
function counterizeii_extension_get_today_ip()	
{	
	$today = date("Y-m-d");
	$sql = "SELECT count(DISTINCT ip) FROM ".counterize_logTable()." WHERE timestamp >= '$today'";
	
	$wpdb =& $GLOBALS['wpdb'];	
	return $wpdb->get_var($sql);  
}

// 本日のアクセス（ページビュー）
function counterizeii_extension_get_today_pageview()
{
	$today = date("Y-m-d");
	$sql = "SELECT COUNT(1) FROM ".counterize_logTable()." WHERE timestamp >= '$today'";
	
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
	
}

// 昨日のアクセス（ユニークアクセス）
function counterizeii_extension_get_yesterday_ip()	
{	
	$today = date("Y-m-d");	
	// $yesterday = date("Y-m-d", time() - 86400);
	$yesterday = date("Y-m-d",strtotime("-1 day"));
	
	$sql = "SELECT count(DISTINCT ip) FROM ".counterize_logTable()." WHERE timestamp >= '$yesterday' AND timestamp < '$today'";
	
	$wpdb =& $GLOBALS['wpdb'];	
	return $wpdb->get_var($sql);	
}

// 昨日のアクセス（ページビュー）
function counterizeii_extension_get_yesterday_pageview()
{
	$today = date("Y-m-d");
	$yesterday = date("Y-m-d",strtotime("-1 day"));
	
	$sql = "SELECT COUNT(1) FROM ".counterize_logTable()." WHERE timestamp >= '$yesterday' AND timestamp < '$today' ";
	
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
}

// ３日前のアクセス（ユニークアクセス）
function counterizeii_extension_get_threedaysago_ip()	
{	
	// $yesterday = date("Y-m-d", time() - 86400);
	$yesterday = date("Y-m-d",strtotime("-1 day"));
	// $threedaysago = date("Y-m-d", time() - 86400 * 2);
	$threedaysago = date("Y-m-d",strtotime("-2 day"));
	
	$sql = "SELECT count(DISTINCT ip) FROM ".counterize_logTable()." WHERE timestamp >= '$threedaysago' AND timestamp < '$yesterday'";
	
	$wpdb =& $GLOBALS['wpdb'];	
	return $wpdb->get_var($sql);	
}

// ３日前のアクセス（ページビュー）
function counterizeii_extension_get_threedaysago_pageview()
{
	$yesterday = date("Y-m-d",strtotime("-1 day"));
	$threedaysago = date("Y-m-d",strtotime("-2 day"));
	
	$sql = "SELECT COUNT(1) FROM ".counterize_logTable()." WHERE timestamp >= '$threedaysago' AND timestamp < '$yesterday' ";
	
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
}
?>