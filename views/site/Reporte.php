<?php

use \koolreport\widgets\koolphp\table;
?>

<html>
<head>
    <title>My Report</title>
</head>
<body>
<h1> It Work</h1>
<?php
Table::create(array("dataStore"=>$this->dataStore("cliente"),
    "class"=>array("table"=>"table table-hover")));

?>
</body>
</html>


