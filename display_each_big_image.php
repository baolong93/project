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
	if(isset($_GET['img_thumb2_id'])){
		$id = preg_replace('#[^0-9]#i','',$_GET['img_thumb2_id']);
		$current_url = base64_encode($_SERVER['REQUEST_URI']);
		$results = $mysqli->query("SELECT img_big_name FROM image_big WHERE img_thumb2_id = '$id'");
		if($results){
			while($obj = $results->fetch_object()){
				//echo '<div class = "photo-thumb">';
				echo '<img  id="swap" src = "images/'.$obj->img_big_name.'" onclick="swapImg();">';
				//echo '</div>';
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
	var oImgs = [];
	oImgs[0] = "1.jpg"
	oImgs[1] = "2.jpg"
	oImgs[2] = "6.jpg"

	for(var i=0;i<oImgs.length;i++){
	var imgs = new Image();
	imgs.src = "images/" + oImgs[i];
	}

	var x = 1;

	function swapImg(){
	var doc = document.getElementById("swap");
	doc.src = "images/" + oImgs[x];
	if(x<oImgs.length-1){
	x ++;
	}else{
	x = 0;
	}
	}

</script>
