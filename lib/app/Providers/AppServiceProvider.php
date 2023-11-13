<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Models\Model\Category;
use App\Models\Model\bill;
use App\Models\Model\Product;
use App\Models\Model\stock;
use Illuminate\Support\Facades\DB;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
       

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        $data['categories'] = Category::all()->take(4);
        $data['product'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->orderByRaw ('CHAR_LENGTH (prod_name)')->get ();
        $data['stock'] = stock::all();
        view()->composer('*', function($view) {
            if(Auth::check()){
            $data['count'] = bill::where('bill_cus',Auth::user()->cus_id)->where('bill_sta',4)->count();
            $data['sum'] = bill::where('bill_cus',Auth::user()->cus_id)->where('bill_sta',4)->sum('bill_total');
            view()->share($data);
            }
        });
        
        view()->share($data);
    }
}
