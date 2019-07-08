<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Signature;

class SignatureController extends Controller
{
        public function store(Request $request)
        {
             $signature = new Signature();
             $signature->file = $request->file;

             $signature->save();
             return response()->json(['success'=>'Data is successfully added']);
        }
}
