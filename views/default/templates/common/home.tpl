<center>
	<div class="wrapper">
		<div class="label bg_green color_white">templates/common/home.tpl</div>
		
		<div class="contents">
			<h1>~ HOME SWEET HOME ~</h1>
			<h3>Rendered by the Default Controller assigned</h3>
			<br />

			<div class="section">
				Simple Parameter Passing from the Controller ..
			</div>
			<br />

				<b><?php echo $_SESSION["name"]; ?></b> from <b><?php echo $myHometown; ?></b> is saying ..
				<br />
				<b>'<?php echo $myGreeting; ?>'</b> now on <b><?php echo $datetime; ?></b>

				<br /><br /><br />

			<div class="section">
				Basic SESSION testing ..
			</div>
			<br />

				Oh, you want to change your name? Ok tell me: 
				<form method=post>
					<input type=text name="newname" />
					<input type=submit value="That's it!" />
				</form>

				<br /><br />

			<div class="section">
			A basic call to a simple system-wide readymade function ..
			</div>
			<br />
			<div class="md5">MD5 Hashing for my password <i>MYPASSWORD</i> : <?php echo hash_password('MYPASSWORD'); ?></div>

		</div>
		
	</div>
</center>
