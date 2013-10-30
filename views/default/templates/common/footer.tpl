<center>
	<div class="footer">
		<div class="label bg_blue color_white">templates/common/footer.tpl</div>
		<div class="contents">
			<?php 
				echo sprintf('A sample of %s &copy; %s %d. Developed by <a href="mailto:arkarwmh@gmail.com">%s</a>','REST-in PHP (RIP) MVC Framework v1.0','MIT Licensed',2013,'Arkar WINN MINN HTWE');
				echo '<br />';
				echo sprintf('<a href="http://www.restinphp.com" target="_blank">%s</a> | <a href="https://github.com/arkarwmh/RESTINPHP" target="_blank">%s</a>','www.restinphp.com','Project Repository'); 
			?>
		</div>
	</div>
</center>

<!--
	JAVASCRIPTS CALLS. Note: All javascripts should be start processing only at the end of the normal page.
-->
<script type="text/javascript" src="<?php echo templateroot(); ?>/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo templateroot(); ?>/js/main.js"></script>

</body>
</html>