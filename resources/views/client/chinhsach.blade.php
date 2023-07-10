@extends('client/layout_cli')
@section('content')
    <div class="ads-grid py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2 trang">
            
            <!-- tittle heading -->
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                {{$meta_title}}
               </h3>
            <div class="row">
                <!-- product left -->
                <div class="col-lg-12">
                    <div class="wrapper">
                        <!-- first section -->
                        <div class="taideptrai">
                            <div class="baophi">
                                <div class="">
                                    <div class="">
                                           {!!$chinh1->content!!}
                                    </div>
                                </div>
                            </div>  
                        </div>
                           
                    </div>
                </div>
               
            </div>
           
     </div>
 </div>




   

@stop
