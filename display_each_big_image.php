<?php
session_start();
include_once("connect.php");
?>

<html>
<head>
	<title>Welcome to Chautari Hub</title>
	<link rel = "stylesheet" type = "text/css" href = "css/mydesign.css" />
	<meta charset = "utf-8">
</head>
<body>
	<?php include_once("header.php"); ?>
<div id = "content">
	<div class = "photo-thumb-box" >
	<div class = "photo-info" ></div><br/>
	
<?php
// 	if(isset($_GET['img_thumb2_id'])){
// 		$id = preg_replace('#[^0-9]#i','',$_GET['img_thumb2_id']);
// 		$current_url = base64_encode($_SERVER['REQUEST_URI']);
// 		$results = $mysqli->query("SELECT img_big_name FROM image_big WHERE img_thumb2_id = '$id'");
// 		if($results){
// 			while($obj = $results->fetch_object()){
// 				//echo '<div class = "photo-thumb">';
// 				echo '<img  id="swap" src = "images/'.$obj->img_big_name.'" onclick="swapImg();">';
// 				//echo '</div>';
// 		}
// 	}
// }

if(isset($_GET['img_thumb_id'])){
		$id = preg_replace('#[^0-9]#i','',$_GET['img_thumb_id']);
		$img_name = $_GET['img_name'];
		$current_url = base64_encode($_SERVER['REQUEST_URI']);
		$results = $mysqli->query("SELECT * FROM image_thumbs_2 WHERE img_thumb_id = '$id'");
		$array = array();
		echo '<img  id="swap" src = "images/'.$img_name.'" onclick="swapImg();">';
		if($results){
			while($obj = $results->fetch_object()){
				$array[] = $obj->img_name;
				
		}
	}
}
?>

</div>
<div class = "side-bar"></div>
<div class = "clearing"></div><br />
<p>Testing only</p>
</div>
<?php include_once("footer.php"); ?>
</body>
</html>

<script>
	var listImage = <?php echo json_encode($array); ?>;

	for(var i=0;i<listImage.length;i++){
	var imgs = new Image();
	imgs.src = "images/" + listImage[i];
	}

	var x = 1;

	function swapImg(){
	var doc = document.getElementById("swap");
	doc.src = "images/" + listImage[x];
	if(x<listImage.length-1){
	x ++;
	}else{
	x = 0;
	}
	}

</script>
