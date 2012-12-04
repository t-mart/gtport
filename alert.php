<?php
session_start();

if (isset($_SESSION['error_alerts']))
{
  echo('<div class="alert alert-error">');
  echo('<ul>');
  foreach ($_SESSION['error_alerts'] as $err)
  {
    echo('<li>' . $err . '</li>');
  }
  echo('</ul></div>');
  unset($_SESSION['error_alerts']);
}

if (isset($_SESSION['success_alerts']))
{
  echo('<div class="alert alert-success">');
  echo('<ul>');
  foreach ($_SESSION['success_alerts'] as $err)
  {
    echo('<li>' . $err . '</li>');
  }
  echo('</ul></div>');
  unset($_SESSION['success_alerts']);
}
?>
