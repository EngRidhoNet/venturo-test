<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    public static function getMenu()
    {
        $linkApi = "http://tes-web.landa.id/intermediate/menu";
        $client = new Client();
        $response = $client->request('GET', $linkApi);
        $result = json_decode($response->getBody()->getContents(), true);
        $menu = ["makanan" => [], "minuman" => []];
        foreach ($result as $key => $value) {
            if ($value['kategori'] == 'makanan') {
                array_push($menu['makanan'], $value['menu']);
            } else {
                array_push($menu['minuman'], $value['menu']);
            }
        }
        return $menu;
    }
    public static function getTransaksi($tahun)
    {
        $linkApi = "http://tes-web.landa.id/intermediate/transaksi?tahun=$tahun";
        $data = [];
        $datamenu = Transaksi::getMenu();
        $client = new Client();
        $response = $client->request('GET', $linkApi);
        $result = json_decode($response->getBody()->getContents(), true);

        $listbulan = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        foreach ($datamenu as $kategori => $menu) {
            $data[$kategori] = [];
            foreach ($menu as $jenisMenu) {
                foreach ($listbulan as $bulan) {
                    $data[$kategori][$jenisMenu][$bulan] = 0;
                }
            }
        }

        $listMakanan = $datamenu['makanan'];
        $listMinuman = $datamenu['minuman'];
        $listmenu = array_merge($listMakanan, $listMinuman);

        $totalmenu = [];
        foreach ($listmenu as $menu) {
            $totalmenu[$menu] = 0;
        }
        $totalBulan = [];
        foreach ($listbulan as $bulan) {
            $totalBulan[$bulan] = 0;
        }
        $total = 0;
        foreach ($result as $key => $value) {
            $bulan = date("M", strtotime($value['tanggal']));
            $totalmenu[$value['menu']] += $value['total'];
            $totalBulan[$bulan] += $value['total'];
            $total += $value['total'];
            if (in_array($value['menu'], $listMakanan)) {
                $data['makanan'][$value['menu']][$bulan] += $value['total'];
            } else {
                $data['minuman'][$value['menu']][$bulan] += $value['total'];
            }
        }
        $allData = [
            'data' => $data,
            'totalmenu' => $totalmenu,
            'totalBulan' => $totalBulan,
            'total' => $total
        ];
        return $allData;
    }
}
