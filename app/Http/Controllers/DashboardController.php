<?php

namespace App\Http\Controllers;

use App\Models\DataBalita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $jumlah_data = DataBalita::all()->count();

        return view('dashboard.index', [
            'user' => $user,
            'jumlah_data' => $jumlah_data
        ]);
    }
}
