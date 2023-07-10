@extends('manager.template.admin_layout')
@section('content')

<div class="right_col" role="main">
<div class="">
<div class="clearfix"></div>
<div class="row">
<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Quản lý sản phẩm</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    
                    
                    <table class="table table-striped table-bordered" >
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Duyệt</th>
                          <th>Tên người gửi</th>
                          <th>Bình luận</th>
                          <th>Ngày gửi</th>
                          <th>Sản phẩm</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php $i=0; ?>
                        @foreach($comment as $key => $comm)
                        <?php $i++ ?>
                        <tr>
                          <td>{{$i}}</td>
                          <td>
                              @if($comm->comment_status==1)
                                <input type="button" data-comment_status="0" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-primary btn-xs comment_duyet_btn" value="Duyệt" >
                              @else 
                                <input type="button" data-comment_status="1" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="btn btn-danger btn-xs comment_duyet_btn" value="Bỏ Duyệt" >
                              @endif
                            
                            </td>
                            <td>{{ $comm->comment_name }}</td>

                            <td>{{ $comm->comment }}
                              <style type="text/css">
                                ul.list_rep li {
                                  list-style-type: decimal;
                                  color: blue;
                                  margin: 5px 40px;
                              }
                              </style>
                              <ul class="list_rep">
                                Trả lời : 
                                @foreach($comment_rep as $key => $comm_reply)
                                  @if($comm_reply->comment_parent_comment==$comm->comment_id)
                                    <li> {{$comm_reply->comment}}</li>
                                  @endif
                                
                                @endforeach

                              </ul>
                              @if($comm->comment_status==0)
                              <br/><textarea class="form-control reply_comment_{{$comm->comment_id}}" rows="5"></textarea>
                              <br/><button class="btn btn-default btn-xs btn-reply-comment" data-product_id="{{$comm->comment_product_id}}"  data-comment_id="{{$comm->comment_id}}">Trả lời bình luận</button>
                              
                              @endif
                             

                            </td>
                            <td>{{ $comm->comment_date }}</td>
                            <td><a target="_blank" href="{{URL::to('/detail/'.$comm->product->product_id)}}">{{ $comm->product->product_name }}</a></td>
                                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="Pagination d-flex justify-content-center">
                    {!! $comment->links() !!}
                  </div>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
          </div>
      </div>
  </div>
@endsection