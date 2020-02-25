<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PixelController extends Controller
{
    function form(){
        return view('form');
    }

    function upload(Request $request){

        $image= $request->file('img');
        $name= $image->getClientOriginalName();
        $path= $image->getRealPath();
        $size= getimagesize($path);

        //largura
        $width= $size[0];
        //altura
        $heigth= $size[1];

        echo("Name image: $name <br>");
        echo("Dimensions: $width x $heigth <br>");
        echo("Number of pixels: ".$width*$heigth."<br>");
        

        $img= imagecreatefromjpeg($path);
        $r= 255;
        $g= 255;
        $b= 255;
        $count= 0;

        for ($x = 0; $x < $width; $x++) {

            for ($y = 0; $y < $heigth; $y++) {
                $pxlCor = ImageColorAt($img,$x,$y);
                
                $a= ($pxlCor >> 16) & 0xFF;
                $b= ($pxlCor >> 8) & 0xFF;
                $c= $pxlCor & 0xFF;
     
                if($r == $a & $g == $b & $b == $c) $count++;
            }
        }

        echo("Number of white pixels: $count<br>");

    }
}
