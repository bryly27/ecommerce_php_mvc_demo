<html>
<head>
	<title></title>
</head>
<body>
	<h1>Products</h1>
	<a href="">Your Cart(<?= $this->session->userdata('total_items') ?>)</a>
	<table>
		<thead>
			<tr>
				<th>Description</th>
				<th>Price</th>
				<th>Qty</th>
			</tr>
		</thead>
		<tbody>
<?php  

var_dump($this->session->userdata);

			foreach($items as $item)
			{ ?>
				<tr>
					<form action='/items/add_item/<?= $item['id'] ?>' method='post'>
						<td><?= $item['description'] ?></td>
						<td>$<?= $item['price'] ?></td>
						<td>
							<select name='quantity'>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select>
						</td>
						<td><input type='submit' value='Buy'></td>
					</form>
				</tr>
<?php	}

?>
		
		</tbody>	
	</table>
</body>
</html>