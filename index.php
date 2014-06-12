<?php
	session_start();
	include_once("connect.php");
?>

<!DOCTYPE html>
<html lang = "en=GB">
<head>
	<title>Welcome to Chautari Hub</title>
	<link rel = "stylesheet" type = "text/css" href = "css/mydesign.css" />
	<meta charset = "utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <script type="text/javascript" src = "//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src = "js/slider.js"></script>
	

</head>
<body>
	<?php include_once("header.php"); ?>
	<p></p>
	<div id = "content">
			<div class = "slider">
				<ul>
					<li><img src = "images/slider-1.png" /></li>
					<li><img src = "images/slider-2.png" /></li>
					<li><img src = "images/slider-3.jpg" /></li>
					<li><img src = "images/slider-4.jpg" /></li>
					<li><img src = "images/slider-5.jpg" /></li>
				</ul>
			</div>
			<!--<img class = "circle" src = "images/slider_circle_full.png" />-->
			<script>
				var sliders = []
		 	 	$('.slider').each(function() {	
		   	 	sliders.push(new Slider(this))
		  		})
			</script>
			<div class = "slider-buttons">
			    <ul>
			      <li><a href="javascript:sliders[0].goToPrev()">.goToPrev()</a></li>
			      <li><a href="javascript:sliders[0].goToNext()">.goToNext()</a></li>
			    </ul>
			    <ul>
			  
			      <li><a href="javascript:sliders[0].goTo(0)">.goTo(0)</a></li>
			      <li><a href="javascript:sliders[0].goTo(1)">.goTo(1)</a></li>
			      <li><a href="javascript:sliders[0].goTo(2)">.goTo(2)</a></li>
			      <li><a href="javascript:sliders[0].goTo(3)">.goTo(3)</a></li>
			      <li><a href="javascript:sliders[0].goTo(4)">.goTo(4)</a></li>
			    </ul>
  			</div>
		<div class = "controller" id = "next"></div>	
		
		<div class = "clearing"></div>
		<br />
		<img src = "images/redtree.png" />
		<div class = "home-photo-title">
			<h4>Latest Photos</h4>
		</div>
			<!--needs working-->
			<?php 
				$current_url = base64_encode($_SERVER['REQUEST_URI']);
				$result = $mysqli->query("SELECT * FROM image_thumbs LIMIT 3");
				while($row = $result->fetch_object()){

					echo '<a href = "display_thumbs2_images.php?img_thumb_id='.$row->img_thumb_id.'">';
					echo '<div class = "home-middleleft">';
					echo '<img src = "image_thumbs/'.$row->image_thumb_name.'">';
					echo '<div class = "home-thumb-left">';
					echo '<h4>'.$row->thumb_heading.'</h4>';
					echo '<br />';
					echo '<p>'.$row->notes.'</p>';
					echo '</div>';
					echo '</div>';
					echo '</a>';
				
				}
			?>
			<div class = "clearing"></div><br />
			<img src = "images/yellowtree.png" />
			<div class = "home-blog-title">
				<h4>Enjoy reading our blogs!</h4>
			</div>		
			<div class = "home-blog-left"></div>
			<div class = "home-blog-right"></div>
			<div class = "home-blog-left2"></div>
			<div class = "home-blog-right2"></div>
			<img class = "blogbar" src = "images/blogbar2.png" />
			<div class = "clearing"></div>


			<br /><br />

			<div class = "home-advertise">
				<div class = "h_a_1">
					<h3>Advertise With Us!</h3>
				</div>
			</div>
	</div><!--content end-->
	<?php include_once("footer.php"); ?>
</body>
</html>