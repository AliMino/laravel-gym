<?php

namespace App\Http\Controllers;

use App\PurchasedPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RevenueController extends Controller
{
    public function index() {
        $totalSum = 0;
        $packages = $this->getPackages();
        foreach($packages as $package) {
            $totalSum += $package->price_cent;
        }
        $totalSum /= 100;
        return view('revenue.index', ["totalSum" => $totalSum]);
    }

    public function dataTable(){
        return datatables($this->getPackages())->toJson();
    }

    private function getPackages() {
        if(auth()->user()->getRole()->name == "admin") {
            return PurchasedPackage::all();
        } else if(auth()->user()->getRole()->name == "city manager") {
            return auth()->user()->city->purchasedPackages();
        } else if(auth()->user()->getRole()->name == "gym manager") {
            return auth()->user()->gym->purchasedPackages();
        }
    }
}
