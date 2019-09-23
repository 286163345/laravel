{{--<html lang="{{ app()->getLocale() }}">--}}
@extends('blade.main.main')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content bottom-padding">
                    <div class="mx-auto col-md-6">
                        {!! form($form) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
