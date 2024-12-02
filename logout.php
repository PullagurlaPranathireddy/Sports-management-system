<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
  </head>
<body>
</body>

</html>
<?php
session_unset();
session_destroy();
?>
<script>
	window.location = "index.php";
</script>