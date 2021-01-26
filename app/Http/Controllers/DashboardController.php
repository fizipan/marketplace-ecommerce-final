<?php

namespace App\Http\Controllers;

use App\User;
use App\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transactions = TransactionDetail::with('transaction.user', 'product.galleries')
                            ->whereHas('product', function($product) {
                                $product->where('users_id', Auth::user()->id);
                            });

        $revenue = $transactions->get()->reduce(function($carry, $item) {
            return $carry + $item->price;
        });

        $custumer = User::count();
        return view('pages.dashboard', [
            'transactions_count' => $transactions->count(),
            'transactions_data' => $transactions->take(3)->get(),
            'revenue' => $revenue,
            'custumer' => $custumer,
        ]);
    }
}
