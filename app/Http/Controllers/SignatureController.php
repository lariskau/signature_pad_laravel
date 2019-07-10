<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signature;
use Illuminate\Support\Facades\Storage;


class SignatureController extends Controller
{
        public function store(Request $request)
        {
             // We create a variable to define the name of the file
             // Here it's the date and the extension signature.png
             $filename = date('mdYHis') . "-signature.png";
             // We store the signature file name in DB
             $signature = new Signature();
             $signature->file = $filename;
             $signature->save();
             // We decode the image and store it in public folder
             $data_uri = $request->signature;
             $encoded_image = explode(",", $data_uri)[1];
             $decoded_image = base64_decode($encoded_image);
             file_put_contents($filename, $decoded_image);
             // Text of the alter to confirm that the data is posted
             return response()->json(['success'=>'Data is successfully added']);
        }
}
