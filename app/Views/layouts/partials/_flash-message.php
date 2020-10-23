<?php 
require_once CORE.'/Session.php';
Session::init();
if (Helper::isMessage()) {
	list($t, $msg) = Helper::isMessage();
	$alert = <<<EndMsg
			<div class="alert {$t}">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				<strong>{$msg}!</strong>
			</div>
	EndMsg;
	echo $alert;
	Session::unset(SESSION_PREFIX.$t);
}
