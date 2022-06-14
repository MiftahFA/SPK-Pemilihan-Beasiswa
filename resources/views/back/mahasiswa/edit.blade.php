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
						<div class="card-title">Edit Mahasiswa</div>
                        <a href="{{ route('mahasiswa.index')}}" class="btn btn-warning btn-sm ml-auto"><i class="fas fa-undo"></i>  Back</a>
					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('mahasiswa.update', $mahasiswa->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama Mahasiswa</label>
                            <input type="text" class="form-control" name="nama" value="{{$mahasiswa->nama}}">
                        </div>
                    <div class="form-group">
                        <label for="">IPK</label>
                        <select class="form-control" name="id_ipk">
                        @foreach ($ipk as $row)
                        @if ($row->id == $mahasiswa->id_ipk)
                            <option value={{$row->id}} selected='selected'>{{$row->ipk}}</option>
                        @else
                            <option value="{{$row->id}}">{{$row->ipk}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Penghasilan Orang Tua</label>
                        <select class="form-control" name="id_penghasilan">
                        @foreach ($penghasilan as $row)
                        @if ($row->id == $mahasiswa->id_penghasilan)
                            <option value={{$row->id}} selected='selected'>{{$row->penghasilan}}</option>
                        @else
                            <option value="{{$row->id}}">{{$row->penghasilan}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggungan</label>
                        <select class="form-control" name="id_tanggungan">
                        @foreach ($tanggungan as $row)
                        @if ($row->id == $mahasiswa->id_tanggungan)
                            <option value={{$row->id}} selected='selected'>{{$row->tanggungan}}</option>
                        @else
                            <option value="{{$row->id}}">{{$row->tanggungan}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Semester</label>
                        <select class="form-control" name="id_semester">
                        @foreach ($semester as $row)
                        @if ($row->id == $mahasiswa->id_semester)
                            <option value={{$row->id}} selected='selected'>{{$row->semester}}</option>
                        @else
                            <option value="{{$row->id}}">{{$row->semester}}</option>
                        @endif
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