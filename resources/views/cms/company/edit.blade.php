@extends('layouts.cms')
@section('content')
              <div class="panel panel-default"> 
               <div class="panel-body"> 
                <form action="{{url('/home/companies/' . $company['id'])}}" method="POST" enctype="multipart/form-data"> 
                 <input type="hidden" name="_method" value="PUT" /> 
                 <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
                 <div class="row"> 
                  <div class="col-md-7"> 
                   <div class="form-group"> 
                    <label for="exampleInputEmail1">公司名称</label> 
                    <input type="text" name="name" class="form-control" placeholder="" value="{{$company['name']}}" /> 
                   </div> 
                  </div> 
                 </div> 
                 <div class="row"> 
                   <div class="col-md-7"> 
                     <div class="form-group"> 
                      <label for="exampleInputEmail1">地址</label> 
                      <input type="text" name="addr" class="form-control" placeholder="" value="{{$company['addr']}}" /> 
                     </div> 
                   </div>
                </div>
                 <div class="row"> 
                 <div class="col-md-5"> 
                   <div class="form-group"> 
                    <label for="exampleInputEmail1">QQ</label> 
                    <input type="text" name="qq" class="form-control" placeholder="" value="{{$company['qq']}}" /> 
                   </div> 
                  </div> 
                 </div> 
                 <div class="row"> 
                 <div class="col-md-5"> 
                   <div class="form-group"> 
                    <label for="exampleInputEmail1">电话</label> 
                    <input type="text" name="tel" class="form-control" placeholder="" value="{{$company['tel']}}" /> 
                   </div>
                    </div>  
                  </div> 
                   <div class="form-group"> 
                    <button type="submit" class="btn btn-primary pull-right">提交</button> 
                  
                 </div>
                </form>
               </div>
              </div>
@endsection