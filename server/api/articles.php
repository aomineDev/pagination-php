<?php
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json; charset=UTF-8');

	require_once '../conex.php';				

	$articles = [];
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$offset = ($page - 1) * 5;
	$nextPage = $page + 1;
	$prevPage = $page - 1;

  $query = mysql_query("SELECT * FROM paginacion LIMIT 5 offset $offset") or die(mysql_error());

	while($article = mysql_fetch_object($query)){
		array_push($articles, $article);
	}

	http_response_code(200);
	echo json_encode($articles);
?>
