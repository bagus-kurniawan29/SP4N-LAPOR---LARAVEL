<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
{
    $allLaporans = Laporan::with('user')->latest()->get(); 
    return view('admin.dashboard', compact('allLaporans'));
}
}
