<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // Kira jumlah tugas untuk hari ini
        $statistikHarian = Tugas::whereDate('created_at', now()->format('Y-m-d'))->count();

        // Kira jumlah tugas untuk mingguan
        // $statistikMingguan = Tugas::whereBetween('created_at', [now()->subWeek(), now()])->count();
        $statistikMingguan = Tugas::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();

        // Kira jumlah tugas untuk bulanan
        // $statistikBulanan = Tugas::whereBetween('created_at', [now()->subMonth(), now()])->count();
        $statistikBulanan = Tugas::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->count();

        // Kira jumlah tugas untuk tahunan
        // $statistikTahunan = Tugas::whereBetween('created_at', [now()->subYear(), now()])->count();
        $statistikTahunan = Tugas::whereBetween('created_at', [now()->startOfYear(), now()->endOfYear()])->count();

        return view('template-dashboard', compact('statistikHarian', 'statistikMingguan', 'statistikBulanan', 'statistikTahunan'));

    }
}
