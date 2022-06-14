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
						<div class="card-title">Ranking Mahasiswa</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>Bobot IPK</th>
                                    <th>Bobot Penghasilan Orang Tua</th>
                                    <th>Bobot Tanggungan</th>
                                    <th>Bobot Semester</th>
                                    <th>NCF (60%)</th>
                                    <th>NSF (40%)</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($hasil_mahasiswa as $row)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$row->hasil_mahasiswa->nama}}</td>
                                    <td>{{$row->bobot_ipk}}</td>
                                    <td>{{$row->bobot_penghasilan}}</td>
                                    <td>{{$row->bobot_tanggungan}}</td>
                                    <td>{{$row->bobot_semester}}</td>
                                    <td>{{$row->ncf}}</td>
                                    <td>{{$row->nsf}}</td>
                                    <td>{{$row->hasil}}</td>
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