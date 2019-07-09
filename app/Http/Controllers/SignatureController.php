<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signature;
use Illuminate\Support\Facades\Storage;


class SignatureController extends Controller
{
        public function store(Request $request)
        {
             $filename = date('mdYHis') . "signature.png";
             $signature = new Signature();
             $signature->file = $filename;
             $signature->save();
             $data_uri = $request->signature;
             $encoded_image = explode(",", $data_uri)[1];
             $decoded_image = base64_decode($encoded_image);
             file_put_contents($filename, $decoded_image);
        }
}
