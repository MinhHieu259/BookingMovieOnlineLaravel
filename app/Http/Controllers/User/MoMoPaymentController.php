<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class MoMoPaymentController extends Controller
{
    public function MomoPayment(Request $request)
    {
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        $partnerCode = "MOMOBKUN20180529";
        $accessKey = "klm05TvNBzhg7h7j";
        $secretkey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
        $orderId = time() . "";
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_GET['orderMoney'];
        $notifyurl = "http://localhost:8000/paymomo/ipn_momo.php"; // thong bao
        $returnUrl = "http://localhost:8000/dat-lich/thanh-toan/momo-return"; // tra ve
        $extraData = "merchantName=MoMo Partner";
        $requestId = time() . "";
        $requestType = "captureMoMoWallet";

        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
        $signature = hash_hmac("sha256", $rawHash, $secretkey);

        $data = [
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        ];
        $response = Http::timeout(5)->withHeaders([
            'Content-Type' => 'application/json',
            'Content-Length' => strlen(json_encode($data)),
        ])->post($endpoint, $data);
        $result = json_decode($response, true);

        return Redirect::away($result['payUrl']);
    }
}
