<?php

function get_all_users() {
	/*
	 * Esta función realiza una llamada al API, obtiene y muestra los todos los usuarios,
	 * adicionalmente genera un enlace para consultar los posts de cada usuario.
	 */
	$source = "https://jsonplaceholder.typicode.com/users/";
	$json_file = file_get_contents($source);
	$object = json_decode($json_file, true);
	echo "<h1>Users</h1><br>";
	foreach($object as $value) {
		$name = $value["name"];
		$id = $value["id"];
		echo "<a href=\"posts.php?id=$id\">$name</a>";
		echo "<br>";
	}
}


function get_posts_by_id($user_id) {
	/*
	 * Recibe como argumento el ID de un usuario y regresa los post realizados por
	 * el usuario.
	 */
	$source = "https://jsonplaceholder.typicode.com/posts/";
	$json_file = file_get_contents($source);
	$object = json_decode($json_file, true);
	$username = get_username_by_id($user_id);
	echo "<h1>Posts by $username</h1><br>";
	foreach($object as $value) {
		if ($value["userId"] == $user_id) {
			$post_comment_id = $value["id"];
			echo "<b>Title:</b> ".$value["title"]."<br>";
			echo "<b>Body:</b> ".$value["body"]."<br>";
			echo "<a href=\"comments.php?id=$post_comment_id\">View comments</a>";
			echo "<br><br>";	
		}
	}
}


function get_comments_by_post_id($post_id) {
	/*
	 * Recibe como argumento el ID de un post, obtiene todos los comentarios
	 * del post en cuestión.
	 */
	$source = "https://jsonplaceholder.typicode.com/comments";
	$json_file = file_get_contents($source);
	$object = json_decode($json_file, true);
	echo "<h1>Comments on post #$post_id</h1><br>";
	foreach($object as $value) {
		if ($value["postId"] == $post_id){
			echo "<b>Name:</b> ".$value["name"]."<br>";
			echo "<b>E-mail:</b> ".$value["email"]."<br>";
			echo "<b>Body:</b> ".$value["body"]."<br>";
			echo "<br>";	
		}
	}
	echo "<a href='javascript:history.back(1);'>Back</a>";
	echo "  ";
	echo "<a href='/'>Home</a>";

}


function get_username_by_id($id) {
	/*
	 * Recibe como argumento el ID de un usuario, retorna el nombre
	 * del usuario en cuestión.
	 */
	$source = "https://jsonplaceholder.typicode.com/users/".$id;
	$json_file = file_get_contents($source);
	$object = json_decode($json_file, true);
	return $object['name'];
}


?>
