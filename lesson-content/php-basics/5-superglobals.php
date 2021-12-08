<?php

// https://www.php.net/manual/ru/language.variables.superglobals.php
var_dump($_SERVER);

?>
<form method="get">
    <input type="text" name="field1">
    <input type="text" name="field2">
    <input type="submit">
</form>
<?php
echo $_REQUEST["field1"];
echo "<br>";
echo $_REQUEST["field2"];
