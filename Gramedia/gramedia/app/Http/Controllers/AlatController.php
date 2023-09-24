<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function viewAlats(){
        $alats = Alat::paginate(5);
        return view('viewalat', compact('alats'));
    }
}
