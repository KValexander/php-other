<?php
include "connect.php";
if(!isset($_GET["id"])) return die("Error");
$id = $_GET["id"];
$sql = sprintf("SELECT * FROM `posts` WHERE `ID`='%d'", $id);
if(!$result = $connect->query($sql)) return die("Error ". $connect->error);
$article = $result->fetch_assoc();

preg_match_all("#\[\[.*?\]\]#", $article["content"], $images, PREG_PATTERN_ORDER);
$content = $article["content"];
foreach($images[0] as $val) {
	$img_id = preg_replace("#\[|\]#", "", $val);
	if(!$result = $connect->query("SELECT `content` FROM `posts` WHERE `ID`='$img_id' AND `parent`='$id'")) return die("Error");
	if($path = $result->fetch_assoc())
		$content = str_replace($val, sprintf('<div class="img"><img src="%s" /></div>', $path["content"]), $content);
	else $content = str_replace($val, "", $content);
}

$data = sprintf("
	<h1>%s</h1>
	%s
", $article["title"], $content);

include "header.php";
echo $data;
?>
