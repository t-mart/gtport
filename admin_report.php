<?php 
session_start();
include_once('database.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('bootstrap_head.html');?>
  </head>
  <body>
<div class="container">
      <?php include('navbar.html');?>
      <table id="student_report" class="table table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Average Grade</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $result = mysql_query("SELECT
              GROUP_CONCAT(deriv.course_code
                  separator ', ') as course_codes,
              deriv.course_name as course_name,
              AVG(deriv.avg_grade) as average_grade
          FROM
              (SELECT
                  CONCAT(d.abbreviation, cd.code) as course_code,
                      c.name as course_name,
                      AVG(gw.weight) AS avg_grade
              FROM
                  `sections-students` ss
              JOIN sections s ON ss.section_id = s.id
              JOIN courses c ON s.course_id = c.id
              JOIN grade_weights gw ON gw.letter = ss.grade
              JOIN `courses-departments` cd ON c.id = cd.course_id
              JOIN departments d ON cd.department_id = d.id
              WHERE
                  ss.grade_mode = 'Registered' AND ss.grade IS NOT NULL
              GROUP BY cd.id
              ORDER BY c.name) deriv
          GROUP BY deriv.course_name");
          while($row = mysql_fetch_array($result)){
            echo '<tr>';
            echo "<td>".$row['course_codes']."</td>";
            echo "<td>".$row['course_name']."</td>";
            echo "<td>".$row['average_grade']."</td>";
            echo '</tr>';
          }

        ?>
        </tbody>
      </table>
</div>
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <script>
        $(document).ready(function() {
          $("#view_admin_report").addClass("active");
        });
      </script>
  </body>
</html>
<?php mysql_close($con);?>
