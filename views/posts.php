<?php
require('../functions/functions.php');
?>
<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<head>
	<title>
		Consulta de usuarios
	</title>
</head>
<body>
	<?php
	if (isset($_GET["id"])) {
		get_posts_by_id($_GET["id"]);
	} else {
		echo "<a href='/''>Go Home</a>";
	}
?>
</body>
</html>