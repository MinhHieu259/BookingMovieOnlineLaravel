<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ChiTietDayGhe;
use App\Models\ChiTietLichSu;
use App\Models\LichSuDat;
use App\Models\Phim;
use App\Models\Ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class MoMoPaymentController extends Controller
{
    public function MomoPayment(Request $request)
    {
        $session = session();
        $foods_array = json_decode(urldecode($request->input('foods')), true);
        $session->put('foods_array', $foods_array);

        $list_seats = json_decode(urldecode($request->input('listSeats')), true);
        $session->put('list_seats', $list_seats);

        $maPhim = $request->input('maPhim');
        $session->put('maPhim', $maPhim);

        $maPhong = $request->input('maPhong');
        $session->put('maPhong', $maPhong);

        $orderMoney = $request->input('orderMoney');
        $session->put('orderMoney', $orderMoney);

        $maSuatChieu = $request->input('maSuatChieu');
        $session->put('maSuatChieu', $maSuatChieu);

        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        $partnerCode = "MOMOBKUN20180529";
        $accessKey = "klm05TvNBzhg7h7j";
        $secretkey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
        $orderId = time() . "";
        $orderInfo = "Thanh toán qua MoMo";
        $amount = $request->input('orderMoney');
        $notifyurl = "http://localhost:8000/paymomo/ipn_momo.php"; // thong bao
        $returnUrl = route('returnMomo'); // tra ve
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

    public function PageReturnMomo(Request $request)
    {
        $session = session();
        if ($request->input('errorCode') == 0) {
            $lichSuDat = new LichSuDat();
            $lichSuDat->maLichSu = '';
            $lichSuDat->thoiGianDat = date("d/m/Y H:i:s", strtotime($request->input('responseTime')));
            $lichSuDat->tienDat = $session->get('orderMoney');
            $lichSuDat->maNguoiDung = Auth::guard('nguoidung')->user()->maNguoiDung;
            $lichSuDat->loaiThanhToan = 'momo';
            $lichSuDat->maSuatChieu = $session->get('maSuatChieu');
            $lichSuDat->save();

            $lichSuAfter = LichSuDat::where('thoiGianDat', date("d/m/Y H:i:s", strtotime($request->input('responseTime'))))
                ->where('tienDat', $session->get('orderMoney'))
                ->where('maNguoiDung', Auth::guard('nguoidung')->user()->maNguoiDung)
                ->first();

            $phim = Phim::where('maPhim', $session->get('maPhim'))->first();
            if (count($session->get('list_seats')) > 0){
                foreach ($session->get('list_seats') as $seat) {
                    $ve = new Ve();
                    $ve->maVe = '';
                    $ve->giaVe = $seat['seatPrice'] * $phim->giaVe;
                    $ve->loaiVe = $seat['seatType'];
                    $ve->tenGhe = $seat['seatName'];
                    $ve->maPhim = $session->get('maPhim');
                    $ve->maPhong = $session->get('maPhong');
                    $ve->maLichSu = $lichSuAfter->maLichSu;
                    $ve->save();

                    $chiTietDayGhe = ChiTietDayGhe::where('maSuatChieu', $session->get('maSuatChieu'))
                    ->where('tenGhe', $seat['seatName'])->first();
                    $chiTietDayGhe->trangThai = '2';
                    $chiTietDayGhe->save();
                }
            }

            if (count($session->get('foods_array')) > 0){
                foreach ($session->get('foods_array') as $food){
                    $ctLichSu = new ChiTietLichSu();
                    $ctLichSu->maChiTiet = '';
                    $ctLichSu->tenDoAn = $food['tenDoAn'];
                    $ctLichSu->giaDoAn = $food['gia'];
                    $ctLichSu->soLuong = $food['quantity'];
                    $ctLichSu->maLichSu = $lichSuAfter->maLichSu;
                    $ctLichSu->save();
                }
            }
            return redirect()->route('SendMailTicket', ['maLichSu' => base64_encode($lichSuAfter->maLichSu)]);
        } else {
            return redirect()->route('trang-chu');
        }
    }

    public function InitMomoPayNapTien(Request $request)
    {
        $session = session();
        $tienNap = $request->input('tienNap');
        $session->put('tienNap', $tienNap);

        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
        $partnerCode = "MOMOBKUN20180529";
        $accessKey = "klm05TvNBzhg7h7j";
        $secretkey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
        $orderId = time() . "";
        $orderInfo = "Nạp ".$request->input('tienNap')." vào tài khoản CineBooker";
        $amount = $request->input('tienNap');
        $notifyurl = "http://localhost:8000/paymomo/ipn_momo.php"; // thong bao
        $returnUrl = route('ReturnNapTienMomo'); // tra ve
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
        ])->post($endpoint, $data, ['helle' => 'dd']);
        $result = json_decode($response, true);

        return Redirect::away($result['payUrl']);
    }

    public function ReturnNapTienMomo(Request $request)
    {
        $session = session();
        if ($request->input('errorCode') == 0) {
            $user = Auth::guard('nguoidung')->user();
            $soDuTruoc = $user->soDu;
            $user->soDu = $session->get('tienNap') + $soDuTruoc;
            $user->save();
            return redirect()->route('NapTienView');
        } else{

        }
    }
}
