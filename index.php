<?php

header("Content-type: text/html; charset=utf-8");
error_reporting(-1);
require_once 'connect.php';
require_once 'funcs.php';

if(!empty($_POST)){
	save_posts();	
	header("Location: {$_SERVER['PHP_SELF']}");
	exit;
}

$posts = get_posts();
// print_arr($opsts);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>2ch/b/</title>


<style>
	
	.post{
		border: 1px solid #ccc;
		padding: 10px;
		margin-bottom: 20px;
	}

</style>

</head>
<body>

	<form action="index.php" method="post">
		<p>
			<label for="name">Имя:</label><br>
			<input type="text" name="name" id="name">
		</p>
		<p>
			<label for="text">Текст:</label><br>
			<textarea name="text" id="text"></textarea>
		</p>
		<button type="submit">Написать</button>
	</form>
	
	<hr>

	<?php if(!empty($posts)): ?>
		<?php foreach($posts as $post): ?>
			<div class="post">
				<p>Автор: <?=$post['name']?> | Дата: <?=$post['date']?></p>
				<div><?=nl2br(htmlspecialchars($post['text']))?></div>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>

</body>
</html>