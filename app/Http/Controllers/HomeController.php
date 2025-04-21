<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Admin Section
        if ($user->role == 'admin') {
            $users = User::with('wallets')->get(); // ✅ pakai wallets
            $mutasi = Wallet::with('user')->where('status', 'done')->latest()->get();

            return view('home', compact('users', 'mutasi'));
        }

        // Bank Section
        if ($user->role == 'bank') {
            $wallet = Wallet::where('status', 'done')->get();
            $credit = $wallet->sum('credit');
            $debit = $wallet->sum('debit');
            $saldo = $credit - $debit;

            $users = User::where('role', 'siswa')->with('wallets')->get(); // ✅ pakai wallets
            $request_payment = Wallet::where('status', 'process')->orderBy('created_at', 'DESC')->get();

            $mutasi = Wallet::with('user')
                ->whereIn('status', ['done', 'rejected'])
                ->orderBy('created_at', 'DESC')
                ->get();
            
            $allMutasi = Wallet::where('status', 'done')->count();

            return view('home', compact('saldo', 'users', 'request_payment', 'mutasi', 'allMutasi'));
        }

        // Siswa Section
        if ($user->role == 'siswa') {
            $wallets = Wallet::where('user_id', $user->id)->where('status', 'done')->get();
            $credit = $wallets->sum('credit');
            $debit = $wallets->sum('debit');
            $saldo = $credit - $debit;

            $mutasi = Wallet::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            $users = User::where('role', 'siswa')->where('id', '!=', $user->id)->get();

            return view('home', compact('saldo', 'mutasi', 'users'));
        }

        return redirect()->route('home');
    }

    public function exportPdf()
    {
        $user = Auth::user();

        if (!in_array($user->role, ['admin', 'bank'])) {
            abort(403, 'Unauthorized action.');
        }

        if ($user->role == 'admin') {
            $mutasi = Wallet::with('user')->where('status', 'done')->orderBy('created_at', 'desc')->get();
        } else {
            $mutasi = Wallet::with('user')->whereIn('status', ['done', 'rejected'])->orderBy('created_at', 'desc')->get();
        }

        $pdf = PDF::loadView('transactions.pdf', compact('mutasi'));

        return $pdf->download('mutasi-transactions.pdf');
    }

    public function exportSiswaPdf($id)
    {
        $siswa = User::findOrFail($id);

        $mutasi = Wallet::where('user_id', $id)
            ->where('status', 'done')
            ->orderBy('created_at', 'desc')
            ->get();

        $credit = $mutasi->sum('credit');
        $debit = $mutasi->sum('debit');
        $saldo = $credit - $debit;

        $pdf = PDF::loadView('transactions.laporan_siswa_pdf', compact('siswa', 'mutasi', 'saldo'));

        return $pdf->download('laporan-transaksi-' . $siswa->name . '.pdf');
    }
}
