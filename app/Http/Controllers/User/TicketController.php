<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function InformationTicket($maLichSu)
    {

        return view('components.user.LichChieu.dat-ve-thanh-cong');
    }
}
