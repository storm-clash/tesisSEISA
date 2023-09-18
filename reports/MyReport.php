<?php
namespace app\reports;

require "../vendor/koolreport/core/autoload.php";

class MyReport extends \koolreport\KoolReport
{

    use \koolreport\yii2\Friendship;
   // use \koolreport\clients\Bootstrap;

    protected function setup()
    {
        $this->src("default")
            ->query("
               
               SELECT cliente.nombreCliente, contrato.monto FROM contrato 
               INNER JOIN cliente WHERE cliente.idcliente=contrato.cliente_idcliente 
               
               
               Order BY cliente.nombreCliente
               
               
               
               
            ")
            ->pipe($this->dataStore("cliente"));
    }
}