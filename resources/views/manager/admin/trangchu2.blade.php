@extends('manager.template.admin_layout')
@section('content')
<div class="right_col" role="main">

    <div class="row" style="display: inline-block; width: 100%;text-align: center;">
        <div class="tile_count">
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Tổng Users</span>
                <div class="count">{{$totalAdmin}}</div>
                <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span -->
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Tổng đơn hàng</span>
                <div class="count">{{$totalOrder}}</div>
                <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Tổng khách hàng</span>
                <div class="count green">{{$totalCustomer}}</div>
                <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Tổng sản phẩm</span>
                <div class="count">{{$totalProduct}}</div>
                <!-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Doanh thu tháng này</span>
                <div class="count">{{number_format($revenueByMonth,0,'.','.')}}</div>
                <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
            <div class="col-md-2 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Lợi nhuận tháng này</span>
                <div class="count">{{number_format($profit,0,'.','.')}}</div>
                <!-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> -->
            </div>
        </div>
    </div>



    <div class="thongke">
        <div class="title">
            <p class="title_thongke">THỐNG KÊ ĐƠN HÀNG THEO DOANH SỐ</p><br>
        </div>
        <form autocomplete="off">
            @csrf

            <div class="col-md-2" style="margin-left: 24px;">
                <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>
                <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="LỌC KẾT QUẢ" style="margin-top: 11px;">
            </div>

            <div class="col-md-2">
                <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>

            </div>
            <div class="col-md-2">
                <p>
                    Lọc theo:
                    <select class="dashboard-filter form-control">
                        <option>--Chọn--</option>
                        <!-- <option value="thang9">Trong tháng 9</option>-->
                        <option value="7ngay">7 ngày qua</option>
                        <option value="thangtruoc">Tháng trước</option>
                        <option value="thangnay">Tháng này</option>
                        <option value="365ngayqua">365 ngày qua</option>
                    </select>
                </p>
            </div>
        </form>
    </div>

    <div class="col-md-12" style="padding:20px 20px">
        <div id="chart1" style="height: 250px;"></div>
    </div>



    <div class="row">
        <div class="col-sm-6 ">
            <p class="title_thongke">THỐNG KÊ ĐƠN HÀNG</p>
            <div id="donut"></div>
            <div class="info">
                <table class="tile_info">
                    <tr>
                        <th class="exp">
                            <p><i class="fa fa-square pro"></i>Đơn hàng mới </p>
                        </th>
                        <th class="exp">
                            <p><i class="fa fa-square post"></i>Đơn hàng đã hủy </p>
                        </th>
                        <th class="exp">
                            <p><i class="fa fa-square or"></i>Đang vận chuyển </p>
                        </th>
                        <th class="exp">
                            <p><i class="fa fa-square cus"></i>Đơn hàng đã xử lý </p>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @endsection

    @section('script')

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">
        chart60daysorder();
        var chart = new Morris.Bar({

            element: 'chart1',
            //option chart
            lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
            parseTime: false,
            hideHover: 'auto',
            xkey: 'period',
            ykeys: [ 'sales'],
            labels: ['Doanh số' ]

        });

        function chart60daysorder() {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/days-order')}}",
                method: "POST",
                dataType: "JSON",
                data: {
                    _token: _token
                },
                success: function(data) {
                    chart.setData(data);
                }
            });
        }

        $('.dashboard-filter').change(function() {
            var dashboard_value = $(this).val();
            var _token = $('input[name="_token"]').val();
            // alert(dashboard_value);
            $.ajax({
                url: "{{url('/dashboard-filter')}}",
                method: "POST",
                dataType: "JSON",
                data: {
                    dashboard_value: dashboard_value,
                    _token: _token
                },

                success: function(data) {
                    chart.setData(data);
                }

            });

        });

        $('#btn-dashboard-filter').click(function() {
            var _token = $('input[name="_token"]').val();

            var from_date = $('#datepicker').val();
            var to_date = $('#datepicker2').val();
            // alert(to_date)
            if (from_date > to_date) {
                toastr.warning('Ngày không hợp lệ, bạn hãy chọn ngày phù hợp');
            } else {
                $.ajax({
                    url: "{{url('/filter-by-date')}}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                        _token: _token
                    },
                     error: function(data) {
                       toastr.warning('không có dữ liệu');
                     },
                    success: function(data) {
                        chart.setData(data);
                    }
                });
            }



        });
    </script>

    <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                duration: "slow"
            });
            $("#datepicker2").datepicker({
                dateFormat: "yy-mm-dd",
                duration: "slow"
            });
        });
    </script>


    @endsection