<html>
  <head>
	<?php include('bootstrap_head.html')?>
  <title>Record Tutor Session</title>
  </head>

  <body>
	<?php include('navbar.html') ?>
    <div class="container">
	<?php include('alert.php') ?>
<p>Record the GT ID and the Section ID of the student you taught.</p>
<form class="form-horizontal" method="post" action="record_tutor_session.php">
  <div class="control-group">
    <label class="control-label" for="student_id">GT ID</label>
    <div class="controls">
      <input type="text" name="student_id" id="student_id" placeholder="GT ID">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="section">Section</label>
    <div class="controls">
      <input type="text" name="section_id" id="section_id" placeholder="Section ID">

        <?php
      //<select>
        $query = sprintf("SELECT
        c.name as course_name
        FROM
        tutors t
        JOIN courses c on t.course_id=c.id
        where
        t.student_id=%d and t.authorizing_faculty_id IS NOT NULL", $_SESSION['user_id']);

        $result = mysql_query($query);

        //while ($row = mysql_fetch_array($result)) {
          //echo "<option>".$row['course_name']."</option>";
        //}
      //</select>
        ?>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Record Session</button>
    </div>
  </div>
</form>
<p>The recorded time for this session will be the current time.</p>
    </div> <!-- /container -->

    <!-- Le javascript -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
