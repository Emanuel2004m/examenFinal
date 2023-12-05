<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
	ob_start();

    //Constantes datos de encabezado
    const NOMBRE_EMPRESA = "LP TRES S.A.";
    const  DIRECCION_EMPRESA = "CAAGUAZU (colectora sur) Km 180";
    const  TELEFONO_EMPRESA = "0522 44444";
    const  EMAIL_EMPRESA = "lptres@dominio.com";

  	//Variables por REQUEST
    $fecha = $_REQUEST['fecha'];
    $idUsuario = $_SESSION['idUsuario'];
    $idCliente = $_REQUEST['idCliente'];
    $idFormaPago = $_REQUEST['idFormaPago'];
    
    //base de datos - tabla FACTURAS
    include_once ($_SERVER['DOCUMENT_ROOT'].'/proyectoVeterinaria/routes.php');
    require_once(CONTROLLER_PATH.'facturaController.php');
    $object = new facturaController();
    $cliente = $object->listcliente($idCliente);
    $numero = $object->insert($fecha,$idUsuario,$idCliente,$idFormaPago);
    
    //base de datos - tabla auxiliar JSON
    require_once ('../detalle/insert.php');
	$JSONdetalle = new detalleFactura();
	$sesion = $_SESSION['usuario'];
    $arrDetalles = $JSONdetalle->getDetalles($sesion);
    $count = 0;
    foreach ($arrDetalles as $detalle) { $count++; }

	if ( $count == 0 ) {
		echo "<script>alert('No hay articulos agregados a la factura')</script>";
		exit();
	}
    
    //library HTML2PDF
	require_once ROOT_PATH . 'vendor/autoload.php';

use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Html2Pdf;
		
    //get the HTML/PHP
        include('doc/factura_html.php');
        $content = ob_get_clean();
	//ob_end_clean();

    try {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('real');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('factura_'.$sesion.'_'.$_COOKIE["PHPSESSID"].'.pdf');
    }
    catch(Html2PdfException $e) {
        echo $e;
        exit;
    }
?>