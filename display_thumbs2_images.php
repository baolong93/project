<?php
session_start();
include_once("connect.php");
?>

<html>
<head>
	<title>Welcome to Chautari Hub</title>
	<link rel = "stylesheet" type = "text/css" href = "css/mydesign.css" />
	<meta charset = "utf-8">
	<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="source/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="source/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

</head>
<body>
	<?php include_once("header.php"); ?>
<div id = "content">
	<div class = "photo-thumb-box">
<?php
	if(isset($_GET['img_thumb_id'])){
		$id = preg_replace('#[^0-9]#i','',$_GET['img_thumb_id']);
		$current_url = base64_encode($_SERVER['REQUEST_URI']);
		$results = $mysqli->query("SELECT notes, programheldby, venue, programdate FROM image_thumbs_2 WHERE img_thumb_id = '$id' LIMIT 1");
		if($results){
			while($obj = $results->fetch_object()){
				echo '<div class = "photo-info">';
				echo '<h3>'.$obj->notes.'</h3>';
				echo '<br>';
				echo '<b>Program held by</b>:&nbsp'.$obj->programheldby;
				echo '<br>';
				echo '<b>Venue</b>:&nbsp'.$obj->venue;
				echo '<br>';
				echo '<b>Date</b>:&nbsp'.$obj->programdate;
				echo '</div>';
				echo '<br />';
		}
	}
}
?>
	<!--<div class = "photo-info"></div><br />-->
<?php
	if(isset($_GET['img_thumb_id'])){
		$id = preg_replace('#[^0-9]#i','',$_GET['img_thumb_id']);
		$current_url = base64_encode($_SERVER['REQUEST_URI']);
		$results = $mysqli->query("SELECT * FROM image_thumbs_2 WHERE img_thumb_id = '$id'");
		if($results){
			while($obj = $results->fetch_object()){
				echo '<div class = "photo-thumb">';
				echo '<a href="display_each_big_image.php?img_thumb_id='.$id.'&img_name='.$obj->img_name.'"><img src = "images/'.$obj->img_name.'" height="auto" width="200px"></a>';
				echo '</div>';
		}
	}
}
?>
</div>
<div class = "side-bar"></div>
<div class = "clearing"></div><br />
</div>
<?php include_once("footer.php"); ?>
</body>
</html>
