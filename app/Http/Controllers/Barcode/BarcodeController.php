<?php

namespace App\Http\Controllers\Barcode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorPNG;

class BarcodeController extends Controller
{
    //

    //fucion para generar barcode en PNG
    public function generadorCodigoBar($numeroParte){

        //Crear una instancia del generador de código de barras
        $generarcodigo=new BarcodeGeneratorPNG();

        //Generar el código de barras en formato PNG
        $barcode=$generarcodigo->getBarcode($numeroParte,$generarcodigo::TYPE_CODE_128);

       // dd($barcode);

        //Devolver la imagen en la respuesta HTTP
        return response($barcode)->header('Content-Type','image/png');
    }

}
