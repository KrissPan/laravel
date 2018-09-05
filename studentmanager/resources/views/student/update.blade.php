@extends('common.layout')
@section('content')
    <!--自定义内容区域-->
    @include('common.validator')
    <div class="panel panel-default">
        <div class="panel-heading">新增学生</div>
        <div class="panel-body">
            @include('student._form')


        </div>
    </div>
@stop