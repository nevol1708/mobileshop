@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hóa đơn
                    <small>Chi tiết hóa đơn</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá thành</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hoadonchitiet as $hdct)
                        <tr class="odd gradeX" align="center">
                            <td>{{$hdct->id}}</td>
                            <td>{{$hdct->product->name}}</td>
                            <td>{{$hdct->quantity}}</td>
                            <td>{{number_format($hdct->unit_price)}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/hoadon/xoachitiet/{{$hdct->id}}"> Xóa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection