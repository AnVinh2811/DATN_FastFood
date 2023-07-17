<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\attribute;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use App\Models\Visitor;
use App\Models\product;
use App\Models\Post;
use App\Models\OrderDetail;
use App\Models\custommer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {

        $totalAdmin = admin::select('id')->count();
        $totalOrder = Order::select('id')->count();
        $totalCustomer = custommer::select('id')->count();
        $totalProduct = product::select('id')->count();

        $invoices = Order::with('OrderDetail')->get();
        foreach ($invoices as $invoice) {
            //dd($invoices);
            $totalAmount = 0;
            foreach ($invoice->OrderDetail as $detail) {
                //dd($invoice->OrderDetail);
                $totalAmount += $detail->product_sales_quantity * $detail->product_price;
                if ($detail->product_size == "Lớn") {
                    $subtotal = ($totalAmount + (($totalAmount * 20) / 100));
                } elseif ($detail->product_size == "Nhỏ") {
                    $subtotal = ($totalAmount) - ($totalAmount * 20) / 100;
                } else {
                    $subtotal = ($totalAmount);
                }
                //dd($detail->product_price);
            }

            // lưu tổng tiền vào cột "total_amount" trong bảng invoices
            $invoice->total_mount = $subtotal;
            $invoice->save();
        }
        //$totalCost=product::with('orderDetail')->get();

        // dd($detail);
        $revenueByMonth = Order::where('order_status', 5)
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_mount) as revenue'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        foreach ($revenueByMonth as $ord) {

            $total = $ord->revenue;
            //dd($total);
        }

        // $totalCost = Order::join('tbl_order_details', 'tbl_order_details.order_id', '=', 'tbl_order.order_id')
        //     ->join('tbl_product', 'tbl_product.product_id', '=', 'tbl_order_details.product_id')
        //     ->select('tbl_order.*', 'tbl_order_details.product_sales_quantity', 'tbl_product.price_cost')
        //     ->get();

        // foreach ($totalCost as $item) {
        //    // dd($totalCost);
        //   $orderCost = 0;

        //   foreach ($item->orderDetail as $detail) {
        //     //dd($item->orderDetail);
        //     $orderCost += $detail->product_sales_quantity * $detail->price_cost;
        // //     $orderCost->save();

        //     $totalCost->profit = $orderCost;

        //   }
        // }
        // $profitByMonth = DB::table('tbl_order')->where('order_status', 5)
        //     ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(profit) as profit'))
        //     ->groupBy('month')
        //     ->orderBy('month')
        //     ->get();

        // foreach ($profitByMonth as $ord) {

        //     $cost = $ord->profit;
        //     //dd($cost);
        // }
        // // dd($orderCost);
        $profit = $total - 645000;

        // dump($profit);
        $viewData = array(
            'totalAdmin' => $totalAdmin,
            'totalOrder' => $totalOrder,
            'totalCustomer' => $totalCustomer,
            'totalProduct' => $totalProduct,
            'revenueByMonth' => $total,
            'profit' => $profit
        );
        return view('manager.admin.trangchu2', $viewData);
    }
    public function index()
    {
        return view('admin/index');
    }

    // public function index(){
    //     return view('manager/admin/index');
    // }

    public function filter_by_date(Request $request)
    {

        $data = $request->all();

        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Order::where('order_status', 5)
            ->whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();


        foreach ($get as $key => $val) {

            $chart_data[] = array(

                'period' => $val->order_date,
                //'order' => $val->total_order,
                'sales' => $val->total_mount,
                //'profit' => $val->profit,
                // 'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);
    }


    public function dashboard_filter(Request $request)
    {
        $data = $request->all();

        // $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        // $tomorrow = Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y H:i:s');
        // $lastWeek = Carbon::now('Asia/Ho_Chi_Minh')->subWeek()->format('d-m-Y H:i:s');
        // $sub15days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(15)->format('d-m-Y H:i:s');
        // $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->format('d-m-Y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();



        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $dauthang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->startOfMonth()->toDateString();
        $cuoithang9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(2)->endOfMonth()->toDateString();


        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['dashboard_value'] == '7ngay') {

            $get = Order::where('order_status', 5)
                ->whereBetween('order_date', [$sub7days, $now])->orderBy('order_date', 'ASC')->get();
        } elseif ($data['dashboard_value'] == 'thangtruoc') {

            $get = Order::where('order_status', 5)
                ->whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])->orderBy('order_date', 'ASC')->get();
        } elseif ($data['dashboard_value'] == 'thangnay') {

            $get = Order::where('order_status', 5)
                ->whereBetween('order_date', [$dauthangnay, $now])->orderBy('order_date', 'ASC')->get();
        } elseif ($data['dashboard_value'] == 'thang9') {

            $get = Order::where('order_status', 5)
                ->whereBetween('order_date', [$dauthang9, $cuoithang9])->orderBy('order_date', 'ASC')->get();
        } else {
            $get = Order::where('order_status', 5)
                ->whereBetween('order_date', [$sub365days, $now])->orderBy('order_date', 'ASC')->get();
        }


        foreach ($get as $key => $val) {

            $chart_data[] = array(
                'period' => $val->order_date,
                //'order' => $val->total_order,
                'sales' => $val->total_mount,
                //'profit' => $val->profit,
                //'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);
    }

    public function days_order()
    {
        $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(60)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        $get = Order::where('order_status', 5)
            ->whereBetween('order_date', [$sub60days, $now])
            ->orderBy('order_date', 'ASC')
            ->get();


        foreach ($get as $key => $val) {

            $chart_data[] = array(
                'period' => $val->order_date,
                //'order' => $val->total_order,
                'sales' => $val->total_mount,
                //'profit' => $val->profit,
                //'quantity' => $val->quantity
            );
        }

        echo $data = json_encode($chart_data);
    }

    public function show_dashboard(Request $request)
    {
        $totalAdmin = admin::select('id')->count();
        $totalOrder = Order::select('id')->count();
        $totalCustomer = custommer::select('id')->count();
        $totalProduct = product::select('id')->count();
        $product_views = Product::orderBy('product_sold', 'DESC')->take(10)->get();
        $post_views = Post::orderBy('post_views', 'DESC')->take(10)->get();

        $invoices = Order::with('OrderDetail')->get();
        foreach ($invoices as $invoice) {
            //dd($invoices);
            $totalAmount = 0;
            foreach ($invoice->OrderDetail as $detail) {
                //dd($invoice->OrderDetail);
                $totalAmount += $detail->product_sales_quantity * $detail->product_price;
                if ($detail->product_size == "Lớn") {
                    $subtotal = ($totalAmount + (($totalAmount * 20) / 100));
                } elseif ($detail->product_size == "Nhỏ") {
                    $subtotal = ($totalAmount) - ($totalAmount * 20) / 100;
                } else {
                    $subtotal = ($totalAmount);
                }
                //dd($detail->product_price);
            }

            // lưu tổng tiền vào cột "total_amount" trong bảng invoices
            $invoice->total_mount = $subtotal;
            $invoice->save();
        }
        $profit=

        // dd($detail);
        $revenueByMonth = Order::where('order_status', 5)
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(total_mount) as revenue'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        foreach ($revenueByMonth as $ord) {

            $total = $ord->revenue;
            //dd($total);
        }

        
        if ($total <= 50000) {
            $profit = $total - 35000;
        }elseif($total<=100000){
            $profit = $total - 75000;
        }elseif($total<=150000){
            $profit = $total - 95000;
        }elseif($total<=200000){
            $profit = $total - 125000;
        }elseif($total<=300000){
            $profit = $total - 235000;
        }elseif($total<=500000){
            $profit = $total - 355000;
        }elseif($total<=1000000){
            $profit = $total - 715000;
        }elseif($total<=1500000){
            $profit = $total - 635000;
        }
        // dump($profit);
        $viewData = array(
            'totalAdmin' => $totalAdmin,
            'totalOrder' => $totalOrder,
            'totalCustomer' => $totalCustomer,
            'totalProduct' => $totalProduct,
            'revenueByMonth' => $total,
            'profit' => $profit,
            'product_views' => $product_views,
            'post_views' => $post_views
        );

        return view('manager.admin.trangchu', $viewData);
    }
}
