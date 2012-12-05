<?php 
session_start();
include_once('database.php');?>
<html>
  <head>
		<?php include('bootstrap_head.html');?>
	<script>
		var search = function(){
			$.get('tutor_search/search.php',{course_code : $('#course_code').val(), keyword : $('#keyword').val()}, function(data){
				$('#results').html(data);
			});
		}
	</script>
  </head>
  <body>
  <div class="container">
		<?php include('navbar.html')?>
		<form class="form-inline">
			<input id="course_code" type="text" class="input" placeholder="Course Code">
			-OR-
			<input id="keyword" type="text" class="input" placeholder="Keyword">
			<button class="btn btn-primary" onclick="search();return false;">Search</button>
		</form>
		<div id="results">
		</div>
	</div>
		<script>
			$(document).ready(function() {
				$("#tutoring").addClass("active");
			});
			$("#keyword").keypress(function(){
				$("#course_code").val('');
			});
			$("#course_code").keypress(function(){
				$("#keyword").val('');
			});
		</script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php mysql_close($con);?>
