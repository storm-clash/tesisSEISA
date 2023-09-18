<?php
namespace app\reports;

require "../vendor/koolreport/core/autoload.php";
require "../vendor/koolreport/core/src/core/widget.php";

class brigadaReport extends \koolreport\KoolReport
{

    use \koolreport\yii2\Friendship;




    // use \koolreport\clients\Bootstrap;

    protected function setup()
    {
        $this->src("default")
            ->query("
               
               SELECT brigada.nombre as Nombre_Brigada,brigada.cantHombres as Hombres_por_Brigada, ueb.nombre as Nombre_UEB, provincia.nombre as 
                 Nombre_Provincia FROM brigada
               INNER JOIN ueb INNER JOIN provincia WHERE brigada.ueb_id=ueb.id and ueb.provincia_id=provincia.id 
               
            
            ")
            ->pipe($this->dataStore("brigada"));
    }
}