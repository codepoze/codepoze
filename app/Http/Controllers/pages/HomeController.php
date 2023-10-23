<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Product;
use App\Models\Testimony;
use App\Models\Visitors;
use Illuminate\Support\Facades\Response;

class HomeController extends Controller
{
    public function index()
    {
        $product_paid = Product::without('toBased')->whereHas('toPrice', function ($query) {
            $query->whereJenis('paid');
        })->limit(4)->get();
        $product_free = Product::without('toBased')->whereHas('toPrice', function ($query) {
            $query->whereJenis('free');
        })->limit(4)->get();
        $testimony    = Testimony::inRandomOrder()->whereStatus('1')->limit(3)->get();

        $data = [
            'product_paid' => $product_paid,
            'product_free' => $product_free,
            'testimony'    => $testimony
        ];

        return Template::pages(__('menu.home'), 'home', 'view', $data);
    }

    public function visitor()
    {
        $ip = get_visitor_IP();

        $curl_ip = curl_init('https://ipinfo.io/' . $ip . '/json?token=' . env('IPINFO_KEY'));
        curl_setopt($curl_ip, CURLOPT_RETURNTRANSFER, TRUE);
        $res_ip  = curl_exec($curl_ip);
        $info_ip = json_decode($res_ip, true);

        $visitors = Visitors::whereIp($ip)->first();

        if ($visitors === null) {
            $visitors = new Visitors();
            $visitors->ip       = $ip;
            $visitors->city     = $info_ip['city'];
            $visitors->country  = $info_ip['country'];
            $visitors->region   = $info_ip['region'];
            $visitors->city     = $info_ip['city'];
            $visitors->loc      = $info_ip['loc'];
            $visitors->org      = $info_ip['org'];
            $visitors->timezone = $info_ip['timezone'];
            $visitors->save();

            $response = [
                'status'  => true,
                'message' => 'New',
            ];
        } else {
            $response = [
                'status'  => true,
                'message' => 'Old',
            ];
        }

        return Response::json($response);
    }
}
