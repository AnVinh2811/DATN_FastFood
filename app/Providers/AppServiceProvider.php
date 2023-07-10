<?php

namespace App\Providers;
use App\Models\product;
use App\Models\Order;
use App\Models\custommer;
use App\Models\Post;
use App\Models\category;
use App\Models\CatePost;
use App\Models\admin;
use App\Models\quanly;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
        $cate_post1=CatePost::orderBy('cate_post_id','DESC')->get();
        $category=category::orderby('category_id','desc')->get();
        $app_product = Product::all()->count();
        $app_post = Post::all()->count();
        $app_order = Order::all()->count();
        $app_admin=admin::all()->count();
        $app_cus=custommer::all()->count();
        // $app_video = Video::all()->count();
        $app_customer = Custommer::all()->count();

        $move=Order::where('order_status',4)->count();
        $destroy=Order::where('order_status',3)->count();
        $new=Order::where('order_status',1)->count();
        $process=Order::where('order_status',2)->count();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        // $cuoi=Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $get = quanly::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        $tongo=0;
        $seles=0;
        $tong=0;
        foreach($get as $g){
            $tong=$tong+$g['profit'];
            $tongo=$tongo+$g['total_order'];
            $seles=$seles+$g['sales'];
        }
        $order_count=Order::where('order_status',1)->get();
        $count=count($order_count);
        Session::put('or-nu',$count);
        $view->with('app_product', $app_product )->with('app_post', $app_post )->with('app_order', $app_order )->with('app_customer', $app_customer )->with('category',$category)->with('cate_post1',$cate_post1)->with('move',$move)->with('new',$new)->with('process',$process)->with('destroy',$destroy)->with('app_admin',$app_admin)->with('app_cus',$app_cus)->with('tong',$tong)->with('tongo',$tongo)->with('seles',$seles);

    });
    Schema::defaultStringLength(191);

}

}