<?php

namespace App\Http\Controllers\GM;

use App\Repository\PublicRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GmController extends Controller
{
//    public function index()
//    {
//        $gm=PublicRepository::findAll('Gm')
//    }

    public function getGM($machine)
    {
        $gm= PublicRepository::findAll('Gm');
        return view('Gm.gm',compact('gm','machine'));
    }
}
