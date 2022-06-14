@extends('layouts.default')

@section('content')
    
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
				<h5 class="text-white op-7 mb-2">Sistem Pendukung Keputusan Pemilihan Beasiswa</h5>
			</div>
			<div class="ml-md-auto py-2 py-md-0">
				{{-- <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a> --}}
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		{{-- <div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small">
								<i class="fas fa-user-graduate"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Mahasiswa</p>
								<h4 class="card-title">???</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Tujuan Sistem Pendukung Keputusan</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
					<p>Sistem pendukung keputusan ini dibuat untuk membantu pihak Universitas untuk mengetahui mahasiswa yang berprestasi dan membutuhkan beasiswa dan Menghasilkan data mahasiswa yang mendapatkan beasiswa secara akurat, dan tepat.</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection