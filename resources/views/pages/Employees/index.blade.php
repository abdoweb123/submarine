@extends('layouts.master')
@section('css')
@section('title')
    الموظفون
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة الموظفين
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    @foreach(['danger','warning','success','info'] as $msg)
                        @if(Session::has('alert-'.$msg))
                            <div class="alert alert-{{$msg}} messages">
                                {{Session::get('alert-'.$msg)}}
                            </div>
                        @endif
                    @endforeach

                    {{--  button of add_modal_employee  --}}
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        إضافة موظف
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>البريد الإلكتروني</th>
                                <th>مدخل البيانات</th>
                                <th>العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>@isset($item->parent->name)  {{ $item->parent->name }} @else لا يوجد @endisset</td>
                                    <td>
                                        <div class="dropdown show">
                                            <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                العمليات
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a type="button" class="dropdown-item" style="cursor:pointer" data-toggle="modal"
                                                   data-target="#edit{{ $item->id }}" title="{{ trans('main_trans.edit') }}">
                                                   <i style="color:#a3a373" class="fa fa-edit"></i>&nbsp; تعديل</a>

                                                <a type="button" class="dropdown-item" style="cursor:pointer" data-toggle="modal"
                                                   data-target="#delete{{ $item->id }}" title="{{ trans('main_trans.delete') }}">
                                                   <i style="color:red" class="fa fa-trash"></i>&nbsp; حذف</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <!--  page of edit_modal_employee -->
                                @include('pages.Employees.edit')

                                <!--  page of delete_modal_employee -->
                                @include('pages.Employees.delete')

                            @endforeach
                        </table>

                        <div> {{$employees->links('pagination::bootstrap-4')}}</div>

                    </div>
                </div>
            </div>
        </div>


       <!--  page of add_modal_employee -->
       @include('pages.Employees.create')
    </div>



@endsection
@section('js')
    @toastr_js
    @toastr_render

    <script>
        $(document).ready(function(){
            $(".messages").delay(5000).slideUp(300);
        });
    </script>
@endsection



