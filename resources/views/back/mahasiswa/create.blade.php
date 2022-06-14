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
						<div class="card-title">Form Mahasiswa</div>
                        <a href="{{ route('mahasiswa.index')}}" class="btn btn-warning btn-sm ml-auto"><i class="fas fa-undo"></i>  Back</a>
					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('mahasiswa.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="">Nama Mahasiswa</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">IPK</label>
                        <select class="form-control" name="id_ipk">
                            @foreach ($ipk as $row)    
                            <option value="{{$row->id}}">{{$row->ipk}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Penghasilan Orang Tua</label>
                        <select class="form-control" name="id_penghasilan">
                            @foreach ($penghasilan as $row)    
                            <option value="{{$row->id}}">{{$row->penghasilan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggungan</label>
                        <select class="form-control" name="id_tanggungan">
                            @foreach ($tanggungan as $row)    
                            <option value="{{$row->id}}">{{$row->tanggungan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select class="form-control" name="id_semester">
                            @foreach ($semester as $row)    
                            <option value="{{$row->id}}">{{$row->semester}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                    </div>
                </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection