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
						<div class="card-title">Data Mahasiswa</div>
                        <a href="{{ route('mahasiswa.create')}}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus"></i>  Tambah Mahasiswa</a>
					</div>
				</div>
				<div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-primary">
                            {{Session('success')}}
                        </div>
                    @endif
					<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama</th>
                                    <th>IPK</th>
                                    <th>Penghasilan Orang Tua</th>
                                    <th>Tanggungan</th>
                                    <th>Semester</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($mahasiswa as $row)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->ipk->ipk}}</td>
                                    <td>{{$row->penghasilan->penghasilan}}</td>
                                    <td>{{$row->tanggungan->tanggungan}}</td>
                                    <td>{{$row->semester->semester}}</td>
                                    <td>
                                        <a href="{{route('mahasiswa.edit', $row->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                        <form action="{{route('mahasiswa.destroy', $row->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
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