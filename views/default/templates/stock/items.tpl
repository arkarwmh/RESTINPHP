<center>
	<div class="wrapper">
		<div class="label bg_green color_white">templates/stock/items.tpl</div>
		
		<div class="contents">
			<h1>All My Items</h1>

			<table border=1 cellpadding=15>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Stock</th>
				</tr>
				<?php
					foreach ($items as $item) {
						echo '<tr>';
						echo '	<td><a href="'.__SITEBASE.'/item/'.$item["id"].'">'.$item["id"].'</a></td>';
						echo '	<td><a href="'.__SITEBASE.'/item/'.$item["id"].'">'.$item["name"].'</a></td>';
						echo '	<td>'.$item["stock"].'</td>';
						echo '</tr>';
					}
				?>
			</table>

			<br />
			<img src="/rip/images/sample.jpg" /><br />
			Htaccess Test (Image call sample)
		</div>		
	</div>
</center>
