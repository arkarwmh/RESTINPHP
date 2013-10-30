<?php
/**
 * File: functions.session.php
 * Decscription: Basic public functions for Session operations.
 *
 * Package: REST-in PHP (RIP) Framework
 * Author: Arkar WINN MINN HTWE 
 * Email: arkarwmh@gmail.com
 * Repository: https://github.com/arkarwmh/restinphp
 * Website: http://www.restinphp.com
 * Released under MIT License (c) 2013
 */

function session_create($userid,$userlevel) {
	$_SESSION["isLoggedIn"]=true;
	$_SESSION["userid"]=$userid;
	$_SESSION["userlevel"]=$userlevel;
}
function session_delete() {
	$_SESSION["isLoggedIn"]=false;
	$_SESSION["userid"]=null;
	$_SESSION["userlevel"]=null;
	unset($_SESSION["isLoggedIn"]);
}
function isadmin() {
	if ($_SESSION["userlevel"]==1) {
		return true;
	} else {
		return false;
	}
}
