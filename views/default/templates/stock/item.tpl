<center>
	<div class="wrapper">

		<div class="label bg_green color_white">templates/stock/item.tpl</div>
		
		<div class="contents">
			<h1>A Single Item</h1>
			
			<table border=1 cellpadding=15>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>Stock</th>
					<th>Per Price</th>
					<th>Purchased</th>
				</tr>
				<?php
					echo '<tr>';
					echo '<td>'.$item["id"].'</td><td>'.$item["name"].'</td><td>'.$item["desc"].'</td><td>'.$item["stock"].'</td><td>'.$item["price"].'</td><td>'.$item["purchased"].'</td>';
					echo '</tr>';
				?>
			</table>

		</div>
		
	</div>
</center>
