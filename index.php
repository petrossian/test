<?php 
	include 'db.php';
	$category = "Heren";
	$query = "SELECT * FROM subcategories WHERE 1";
	$row = $conn->query($query);
	$subcategories = $row->fetch_all(MYSQLI_ASSOC);
	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$post_subcategories = $_POST['subcategory'];

		foreach ($post_subcategories as $key => $subcategory) {
			if ($key == count($post_subcategories)-1) {
				$subcategory_id = $subcategory;
				$query = "INSERT INTO products (category_id, name) VALUES ('$subcategory_id', '$name')";
				$res = $conn->query($query);
			}
		}
	}
?>
<!DOCTYPE html>
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
	<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
		<fieldset>
			<legend>Add New Product</legend>
			<input type="text" name="name" placeholder="Product Name">
			<br>
			<p><b>Categories</b></p>
			<span><b><i><?=$category?></i></b></span>
			<input type="checkbox" name="category" value="<?=$category?>">
			<hr>
			<br>
			<div style="display: flex;width: 100%;flex-wrap: wrap;">
				<p><b>Subategories</b></p>
				<hr>
				<?php
					foreach ($subcategories as $key => $subcategory) {
						?>
							<span style="border:1px solid grey;padding: 2px;margin: 5px;">
								<?=$subcategory['name']?>
								<input type="checkbox" name="subcategory[]" value="<?=$subcategory['id'] ?>">
							</span>
						<?php
					}
				?>
			</div>
			<br>
			<input type="submit" name="submit">
		</fieldset>
	</form>
</body>
</html>