<?php
use \koolreport\widgets\koolphp\Table;
use \koolreport\widgets\koolphp\Card;

?>

<html>
<head>
    <div class="report-content">
        <div class="text-center">
    <title>My Report</title>
    </div>
    </div>
</head>
<body>


<?php
Card::create(array(
        "title"=>"Contrato con Menor monto",
    "value"=>$this->src("default")->query("select monto from contrato"),
    "cssClass"=>array(
            "card"=>"bg-danger",
    )
));
?>

<?php
Card::create(array(
    "title"=>"Contrato con Mayor monto",
    "value"=>$this->src("default")->query("select max(monto) from contrato"),
    "cssClass"=>array(
        "card"=>"bg-success",
    )
));
?>

<?php
Card::create(array(
    "title"=>"Monto Total",
    "value"=>$this->src("default")->query("select sum(monto) from contrato "),
    "cssClass"=>array(
        "card"=>"bg-info",
    )
));
?>
<h5 class="text-center"> Relación de Contratos de SEISA</h5>
<?php
Table::create(array(
        "dataSource"=>$this->dataStore("cliente"),
    "headers"=>array(
            array(
            "Nombre del Cliente"=>array("colSpan"=>1),
        "Monto Ascendente del Contrato"=>array("colSpan"=>2,"color"=>"bg-info"),
            )),
    "cssClass"=>array(
            "table"=>"table-bordered table-striped table-hover",
    ),
    "class"=>array("table"=>"table table-hoover")));

?>
</body>
</html>


