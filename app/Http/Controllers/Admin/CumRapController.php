<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tinh;
use Illuminate\Http\Request;

class CumRapController extends Controller
{
    public function AddNewCumRap()
    {
        $tinhs = Tinh::all();
        return view('components.admin.cum-rap.them-moi-cum-rap', compact('tinhs'));
    }

    public function ListCumRap()
    {
        return view('components.admin.cum-rap.danh-sach-cum-rap');
    }
}
