@extends('layouts.default')

@section('content')
    
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Gap Mahasiswa</div>
        
					</div>
				</div>
				<div class="card-body">
                    
					<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Gap IPK</th>
                                    <th>Gap Penghasilan Orang Tua</th>
                                    <th>Gap Tanggungan</th>
                                    <th>Gap Semester</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($gapmahasiswa as $row)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->gap_ipk}}</td>
                                    <td>{{$row->gap_penghasilan}}</td>
                                    <td>{{$row->gap_tanggungan}}</td>
                                    <td>{{$row->gap_semester}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12" class="text-center">Data Masih Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection