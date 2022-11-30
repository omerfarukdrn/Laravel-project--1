@extends('master')
@section('title')
 Haber Düzenleme Sayfası - Admin Paneli
@endsection
@section('css')
 
@endsection
@section('main')
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Haber Düzenleme Sayfası</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="{{route('index')}}"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Düzenle</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<div class="row">
					<div class="col">
						@if($errors->any())
						@foreach($errors->all() as $hatalar)
						<div class="alert alert-danger">{{$hatalar}}</div>
						@endforeach
						@endif
						@if(session('success'))
						<div class="alert alert-success">{{session('success')}}</div>
						@endif
						<form action="{{route('haber-duzenle-post',$haberBilgisi->id)}}" method="post">
						@csrf
						<div class="card">
							<div class="card-body">
								<h6 class="mb-0 text-uppercase">Yeni Yazar</h6>
					            	<hr/>
								<input class="form-control form-control-lg mb-3" type="text" name="baslik" placeholder="Haber Başlığı" value="{{$haberBilgisi->baslik}}" aria-label=".form-control-lg example">
								<input class="form-control form-control-lg mb-3" type="text" name="aciklama" placeholder="Haber Açıklaması" value="{{$haberBilgisi->aciklama}}" aria-label=".form-control-lg example">
								<input class="form-control form-control-lg mb-3" type="text" name="kategori" placeholder="Kategori" value="{{$haberBilgisi->kategori}}" aria-label=".form-control-lg example">
								<input class="btn btn-success" type="submit" name="ilet" value="Güncelle">
							</div>
						</div>
						</form>
									
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
@endsection
@section('js')
 
@endsection