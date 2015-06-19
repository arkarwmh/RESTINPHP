<?php
/***
 * This file is to test the RESTful API via POST.
 * NO NEED to be in the same directory with the RIP Framework.
 * Just put this file ANYWHERE and run to test.
 */

$api_url = "http://localhost/rip/item/";

if ( isset($_POST["itemid"]) ) {
	$post_data = array('itemid' => $_POST["itemid"]);

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api_url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);
	$response = curl_exec($ch);
	curl_close($ch);

	$response = '<br /><br />Requested to Server API:<br />API Location - ' . $api_url . '<br />Method - POST<br />Data: ' . print_r($post_data, true) . '<br /><br />Server Returned JSON:<br />' . $response;
}
?>

<form method=post>
	Item ID: <select name="itemid">
		<option value=1>1</option>
		<option value=2>2</option>
		<option value=3>3</option>
		<option value=4>4</option>
	</select>
	<input type=submit value="Make API Request (to Server) via POST" />

	<?php echo $response; ?>
</form>
