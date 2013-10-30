<link type="text/css" rel="stylesheet" media="all" href="<?php echo templateroot(); ?>/css/menu.css">
	
<!-- JS Drop-Down Menu -->
<div class="menu">    
    	
    	<div class="label bg_red color_white">templates/common/menu.tpl</div>
		
		<div class="contents">
			<a class="menuitem" href="<?php echo __SITEBASE; ?>">Home</a>
			<a class="menuitem" href="<?php echo __SITEBASE; ?>/items">All Items</a>
			<a class="menuitem" href="<?php echo __SITEBASE; ?>/item/1">Books</a>
			<a class="menuitem" href="<?php echo __SITEBASE; ?>/item/2">Fruits</a>
			<a class="menuitem" href="<?php echo __SITEBASE; ?>/item/3">Drugs</a>
			<a class="menuitem lastitem" href="<?php echo __SITEBASE; ?>/item/4">Mobile Handsets</a>

			<div style="float:right;padding-right:20px;">
				Hello, <?php echo $_SESSION["name"]; ?>!
			</div>
		</div>
	
</div>
