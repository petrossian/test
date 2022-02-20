<?php 
	include "db.php";
	$query = "SELECT * FROM products";
	$row = $conn->query($query);
	$products = $row->fetch_all(MYSQLI_ASSOC);
?>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Test</title>
</head>
<body>
	<nav>
		<b>Navbar</b>&nbsp;
		<a href="/">Home</a>&nbsp;
		<a href="/products.php">Products</a>
	</nav>
	<wbr>
	<table style="border:1px solid silver;">
		<tr style="border:1px solid silver;">
		    <th style="border:1px solid silver;">ID</th>
		    <th style="border:1px solid silver;">Category Id</th>
		    <th style="border:1px solid silver;">Name</th>
		</tr>
		<?php
			foreach ($products as $key => $product) {
				?>
					<tr>
					    <td style="border:1px solid silver;"><?=$product['id']?></td>
					    <td style="border:1px solid silver;"><?=$product['category_id']?></td>
					    <td style="border:1px solid silver;"><?=$product['name']?></td>
					</tr>
				<?php
			}
		?>
	</table>
</body>
</html>