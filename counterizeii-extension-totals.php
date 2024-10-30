<?php
/*
------------------------------------------------------------
Copyright (C) 2010 Patners Co.,Ltd. (staff@partnersltd.jp)
------------------------------------------------------------
*/

// 最近１週間のアクセス（ユニークカウント）
function counterizeii_extension_get_oneweek_ip()
{
	// $oneweekago = date("Y-m-d", time() - 86400 * 7);
	$oneweekago = date("Y-m-d",strtotime("-7 day"));

	$sql = "SELECT count(DISTINCT ip) FROM ".counterize_logTable()." WHERE timestamp >= '$oneweekago'";
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
}

// 最近１週間のアクセス（ページビュー）
function counterizeii_extension_get_oneweek_pageview()
{
	// $oneweekago = date("Y-m-d", time() - 86400 * 7);
	$oneweekago = date("Y-m-d",strtotime("-7 day"));
	$sql = "SELECT COUNT(1) FROM ".counterize_logTable()." WHERE timestamp >= '$oneweekago'";
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
}

// 最近１カ月のアクセス（ユニークカウント）
function counterizeii_extension_get_onemonth_ip()
{
	// $onemonth = date("Y-m-d", time() - 86400 * 30);
	$onemonth = date("Y-m-d",strtotime("-30 day"));
	$sql = "SELECT count(DISTINCT ip) FROM ".counterize_logTable()." WHERE timestamp >= '$onemonth'";
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
}

// 最近１カ月のアクセス（ページビュー）
function counterizeii_extension_get_onemonth_pageview()
{
	// $onemonth = date("Y-m-d", time() - 86400 * 30);
	$onemonth = date("Y-m-d",strtotime("-30 day"));
	$sql = "SELECT COUNT(1) FROM ".counterize_logTable()." WHERE timestamp >= '$onemonth'";
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
}

// 最近３カ月のアクセス（ユニークカウント）
function counterizeii_extension_get_threemonth_ip()
{
	// $threemonth = date("Y-m-d", time() - 86400 * 90);
	$threemonth = date("Y-m-d",strtotime("-3 month"));
	$sql = "SELECT count(DISTINCT ip) FROM ".counterize_logTable()." WHERE timestamp >= '$threemonth'";
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
}

// 最近３カ月のアクセス（ページビュー）
function counterizeii_extension_get_threemonth_pageview()
{
	// $threemonth = date("Y-m-d", time() - 86400 * 90);
	$threemonth = date("Y-m-d",strtotime("-3 month"));
	$sql = "SELECT COUNT(1) FROM ".counterize_logTable()." WHERE timestamp >= '$threemonth'";
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
}

// 全期間のアクセス（ユニークカウント）
function counterizeii_extension_get_total_ip()
{
	$sql = 'SELECT count(DISTINCT IP) FROM ' . counterize_logTable();
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
}

// 全期間のアクセス（ページビュー）
function counterizeii_extension_get_total_pageview()
{
	$sql = 'SELECT COUNT(1) FROM ' . counterize_logTable();
	$wpdb =& $GLOBALS['wpdb'];
	return $wpdb->get_var($sql);
}
?>