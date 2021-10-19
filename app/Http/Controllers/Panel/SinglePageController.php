<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\Models\User;
use App\Models\Products;
use App\HelpersClass\Date;

class SinglePageController extends Controller
{
    public function index()
    {
        if (Auth::user()->rolename == 'admin' || Auth::user()->rolename == 'employee') { // set rolename is admin or employee to access into index page

            //Tong don hang
            $totalOrders = Orders::all()->where('id')->count();
            //Thanh vien
            $totalUsers = User::all()->where('id')->count();
            //Tong san pham
            // $totalProducts = Products::all()->where('id')->count(); 
            //Tong so comment
            // $totalCommens = Comments::all()->where('id')->count();

            //Danh sach don hang moi nhat
            $orders = Orders::all()->where('id', 'DESC');

            $listday = Date::getListDayInMonth();

            $viewData = [
                'totalOrders'   =>  $totalOrders,
                'totalUsers'    =>  $totalUsers,
                // 'totalProducts' =>  $totalProducts
                // 'totalComments' =>  $totalComments,
                'orders'        => $orders,
                'listday'       => json_encode($listday)
            ];

            return view('panel.index', compact('totalOrders','totalUsers','orders','listday'));
        } else {                                                                         // if rolename is not admin or employee then logout and show message errors
            Auth::logout();
            return redirect('/')->withErrors('These credentials do not match our records.');
        }
    }
}
