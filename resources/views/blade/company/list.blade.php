{{--<html lang="{{ app()->getLocale() }}">--}}
@extends('blade.main.main')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-title">
                                    <div class="ibox-tools">
                                        <a href="{{url('show/company/create')}}">
                                            <button class="btn btn-sm btn-primary m-t-n-xs"><i class="fa fa-plus-square-o"></i><strong style="margin-left:5px">添加</strong></button>
                                        </a>
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-sm-5 m-b-xs">
                                            {{--<select class="form-control-sm form-control input-s-sm inline">--}}
                                                {{--<option value="0">Option 1</option>--}}
                                                {{--<option value="1">Option 2</option>--}}
                                                {{--<option value="2">Option 3</option>--}}
                                                {{--<option value="3">Option 4</option>--}}
                                            {{--</select>--}}
                                        </div>
                                        <div class="col-sm-4 m-b-xs">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-sm btn-white ">
                                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Day
                                                </label>
                                                <label class="btn btn-sm btn-white active">
                                                    <input type="radio" name="options" id="option2" autocomplete="off"> Week
                                                </label>
                                                <label class="btn btn-sm btn-white">
                                                    <input type="radio" name="options" id="option3" autocomplete="off"> Month
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <input placeholder="Search" type="text" class="form-control form-control-sm">
                                                    <span class="input-group-append">
                                                        <button type="button" class="btn btn-sm btn-primary">搜索</button>
                                                    </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>

                                                <th></th>
                                                <th>编号 </th>
                                                <th>公司名称 </th>
                                                <th>更新时间</th>
                                                <th>操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($company as $val)
                                                <tr>
                                                    <td><input type="checkbox" class="i-checks" name="input[]"></td>
                                                    <td>{{$val['id']}}</td>
                                                    <td>{{$val['company_name']}}</td>
                                                    <td>{{$val['created_at']}}</td>
                                                    <td>{{$val['updated_at']}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
@section('script')
    <script>
        $(document).ready(function(){
            var message = '{{session('message')}}';
            if(message !== '' || message !== undefined){
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success(message);
                }, 1300);
            }
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    @endsection
