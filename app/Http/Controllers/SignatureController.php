<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signature;

class SignatureController extends Controller
{
        public function store(Request $request)
        {
             $signature = new Signature();
             $data_uri = $request->signature;
             $encoded_image = explode(",", $data_uri)[1];
             $decoded_image = base64_decode($encoded_image);
             $signature->file = $request->file;
             file_put_contents("signature3.png", $decoded_image);

             $signature->save();
             return response()->json(['success'=>'Data is successfully added']);
        }
}
