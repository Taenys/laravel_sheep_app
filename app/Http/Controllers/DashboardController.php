<?php

namespace App\Http\Controllers;

use App\Spending;
use App\TraitSpending;
use Illuminate\Http\Request;
use App\User;
use App\Part;


class DashboardController extends Controller
{
    use TraitSpending;

    public function index()
    {

        $lastSpendings = Spending::orderBy('created_at', 'DESC')->take(3)->get();
        $totalSpending = $this->totalSpending();
        $totalSpendingByUser = $this->totalSpendingByUser();

        return view('back.dashboard', compact('lastSpendings','totalSpending','totalSpendingByUser')) ;
    }

    public function balance()
    {
        $totalPart = Part::sum('day');
        $totalSpending = Spending::sum('price');

        $pricePart = round($totalSpending / $totalPart, 2);

        $users = User::all();

        return view('back.balance', compact('users', 'totalSpending', 'totalPart', 'pricePart') );
    }
}
