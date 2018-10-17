<?php

function clear(){
	global $db;
	foreach ($_POST as $key => $value) {
		$_POST[$key] = mysqli_real_escape_string($db, $value);
	}
}

function save_posts(){
	global $db;
	clear();
	extract($_POST);
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$text = mysqli_real_escape_string($db, $_POST['text']);
	$query = "INSERT INTO b (name, text) VALUES ('$name', '$text')";
	mysqli_query($db, $query);
}

function get_posts(){
	global $db;
	$query = "SELECT * FROM b ORDER BY id DESC";
	$res = mysqli_query($db, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function print_arr($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}