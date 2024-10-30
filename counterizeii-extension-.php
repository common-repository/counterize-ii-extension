<?php
/*
------------------------------------------------------------
Plugin Name: Counterize II EXTENSION
Plugin URI: http://strong-seo.net/
Description: Counterize II を拡張するプラグイン。アクセスカウンターの表示機能をサイドバーウィジェットとして提供します。前提として <a href="http://www.navision-blog.de/counterize/" target="_blank">Counterize II</a> がインストール・有効化されている必要があります。 | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=CZGZ9BZ9SYHKL" target="_blank">開発者に寄付する</a>
Author: パートナーズ株式会社
Version: 1.0.5
Author URI: http://partnersltd.jp/
------------------------------------------------------------
Copyright (C) 2010,2011 - Patners Co.,Ltd. (staff@partnersltd.jp)
------------------------------------------------------------
・2010/07/01 V1.0.0 初版公開
・2010/07/16 V1.0.1 ステータス変更不具合の変更
・2010/07/30 V1.0.2 一部内部仕様を変更
・2010/09/10 V1.0.3 現在のアクセスユーザ数の表示機能を追加
・2010/12/23 V1.0.4 一部内部仕様を変更
・2010/01/10 V1.0.5 バージョンアップ時の不具合を修正
------------------------------------------------------------
*/

add_option('counterizeii_extension_wiget_donate', 'FALSE' , 'Counterize II EXTENSION - 寄付の有無', 'YES');

include_once('counterizeii-extension-pr.php');
include_once('counterizeii-extension-recent.php');
include_once('counterizeii-extension-totals.php');
include_once('counterizeii-extension-wiget1.php');
include_once('counterizeii-extension-wiget2.php');
?>