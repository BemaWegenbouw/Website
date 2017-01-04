<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-blank";
require_once("../inc/engine.php");

$uid = $_SESSION["uid"];
?>
<?php
if (isset($_POST) && !empty($_POST)) {
    foreach ($_POST as $key => $value) {
        if ($value == 'true') {
            $declaration->approveFree($key);
        }
        if ($value == 'false') {
            $declaration->denyFree($key);
        }
    }
}
?>

<script language="javascript">
    window.location.href = "admin_declaration.php"
</script>



include("../inc/parts/staff-footer.php");

?>