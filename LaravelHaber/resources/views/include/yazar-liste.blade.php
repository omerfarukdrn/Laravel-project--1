@extends('master')
@section('title')
 Yazar Listesi - Admin Paneli
@endsection
@section('css')
<link href="{{asset('/')}}assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('main')
<div class="page-wrapper">
			<div class="page-content">
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Yazar Listesi</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{route('index')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Liste</li>
							</ol>
						</nav>
					</div>
				</div>
                <hr/>
				@if(session('success'))
				<div class="alert alert-success">{{session('success')}}</div>
				@endif
                <div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Sıra No</th>
										<th>Yazar Bilgisi</th>
										<th>E-mail</th>
										<th>Telefon</th>
										<th>İşlemler</th>
									</tr>
								</thead>
                                
                                
                                
								<tbody>
                                @if($yazarlar)
                                @foreach($yazarlar as $yazar)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$yazar->adsoyad}}</td>
										<td>{{$yazar->mail}}</td>
										<td>{{$yazar->telefon}}</td>
										<td>
                                            <a href="{{route('yazar-duzenle',$yazar->id)}}" class="btn btn-info">Düzenle</a>
                                            <a href="{{route('yazar-sil',$yazar->id)}}" class="btn btn-danger">Sil</a>
                                        </td>
									</tr> 
                                    @endforeach
                                    @endif
								</tbody>
								<tfoot>
                                <tr>
										<th>Sıra No</th>
										<th>Yazar Bilgisi</th>
										<th>E-mail</th>
										<th>Telefon</th>
										<th>İşlemler</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
            </div>
</div>

@endsection
@section('js')
<script src="{{asset('/')}}assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('/')}}assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
@endsection