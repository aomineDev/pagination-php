<?php
  require_once 'conex.php';

  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($page - 1) * 5;
  $nextPage = $page + 1;
  $prevPage = $page - 1;

  $query = mysql_query("SELECT * FROM paginacion LIMIT 5 offset $offset") or die(mysql_error());
?>
