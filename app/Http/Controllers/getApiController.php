<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class getApiController extends Controller
{
    public function index () {

        $response = Http::get('https://api.kawalcorona.com/indonesia');
        $dataFix = $response->json();
        $data = $dataFix[0];

        $response_provinsi = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $dataProvinsi = $response_provinsi->json();

        return view('report',compact('data', 'dataProvinsi'));
    }

    public function cari(Request $request) {
        $item = $request->all();

        $response = Http::post('https://api.kawalcorona.com/indonesia/provinsi');

        $provinsi_array = [];

        $dataFix = $response->json();
        foreach ($dataFix as $result1){
            foreach ($result1 as $result2){
                $provinsi_array[] = $result2;
            }
        }

        $data_collect = collect($provinsi_array);
        $data_filter = $data_collect->where('Kode_Provi', $item['provinsi']);

        $data = $data_filter->collapse()->all();


        $response_provinsi = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $dataProvinsi = $response_provinsi->json();

        return view('report',compact('data', 'dataProvinsi'));
    }

}
