<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    function index()
    {
        $user_id = auth()->user()->id;
        $data = [
            'tugas'    => Tugas::where('user_id', $user_id)->where('is_done', 0)->latest()->paginate(10),
            'content' => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
