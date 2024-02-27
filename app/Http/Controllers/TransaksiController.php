<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index (){
        if(isset($_GET['tahun'])){
            $tahun = $_GET['tahun'];
            $alldata = Transaksi::getTransaksi($tahun);
            return view('show', compact('alldata'));
        } else {
            return view('index');
        }
    }
}
