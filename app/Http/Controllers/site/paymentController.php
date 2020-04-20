<?php

namespace App\Http\Controllers\site;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\payment;
use App\Product;
use App\User_product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use SoapClient;

class paymentController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['CheckPhone','auth']);
    }



    public function payment()
    {
        $request = \request('price');
        $MerchantID = '3344580e-a501-11e8-a09b-005056a205be'; //Required

        $CallbackURL = 'http://127.0.0.1:8000/product/callBack/'; // Required

        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $request,
                'Description' => 'buy from dushop',
                'CallbackURL' => $CallbackURL,
            ]
        );

//Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
            payment::create([
                'user_id' => auth()->user()->id,
                'code' => str::random(40),
            ]);
            return redirect('https://www.zarinpal.com/pg/StartPay/' . $result->Authority);
//برای استفاده از زرین گیت باید ادرس به صورت زیر تغییر کند:
//Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority.'/ZarinGate');
        } else {
            echo 'ERR: ' . $result->Status;
        }
    }





    public function callBack()
    {

        $MerchantID = '3344580e-a501-11e8-a09b-005056a205be';
        $Authority = $_GET['Authority'];
        $payment = payment::where('user_id', auth()->user()->id)->first();
        $payment->upadate([
            'authority' => $Authority,
            'success' => 1
        ]);
        if ($_GET['Status'] == 'OK') {

            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $MerchantID,
                    'Authority' => $Authority,
                ]
            );

            if ($result->Status == 100) {
                return redirect(route('factor'));
            } else {
                echo 'Transaction failed. Status:' . $result->Status;
            }
        } else {
            echo 'Transaction canceled by user';
        }
    }
}
