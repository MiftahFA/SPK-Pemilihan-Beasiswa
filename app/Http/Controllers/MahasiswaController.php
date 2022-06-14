<?php

namespace App\Http\Controllers;

use App\Models\gapmahasiswa;
use App\Models\Ipk;
use App\Models\Mahasiswa;
use App\Models\Penghasilan;
use App\Models\Ranking;
use App\Models\Tanggungan;
use App\Models\Semester;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all()->sortBy('nama');
        $ipk = Ipk::all();
        $penghasilan = Penghasilan::all();
        $tanggungan = Tanggungan::all();
        $semester = Semester::all();
        return view('back.mahasiswa.index', [
            'mahasiswa' => $mahasiswa,
            'ipk'   => $ipk,
            'penghasilan' => $penghasilan,
            'tanggungan' => $tanggungan,
            'semester'  => $semester
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $ipk = Ipk::all();
        $penghasilan = Penghasilan::all();
        $tanggungan = Tanggungan::all();
        $semester = Semester::all();
        return view('back.mahasiswa.create', compact('ipk', 'penghasilan', 'tanggungan', 'semester'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:4'
        ]);

        // $data = $request->all();
        // Mahasiswa::create($data);

        // $data['nama'] = $request->nama;
        // $data['id_ipk'] = $request->id_ipk;
        // $data['id_penghasilan'] = $request->id_penghasilan;
        // $data['id_tanggungan'] = $request->id_tanggungan;
        // $data['id_penghasilan'] = $request->id_penghasilan;
        // $create = Mahasiswa::create($data);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->id_ipk = $request->id_ipk;
        $mahasiswa->id_penghasilan = $request->id_penghasilan;
        $mahasiswa->id_tanggungan = $request->id_tanggungan;
        $mahasiswa->id_semester = $request->id_semester;
        $mahasiswa->save();

        $gapmahasiswa = new gapmahasiswa();
        $gapmahasiswa->id = $mahasiswa->id;
        $gapmahasiswa->gap_ipk = $mahasiswa->ipk->nilai_ipk - 3;
        $gapmahasiswa->gap_penghasilan = $mahasiswa->penghasilan->nilai_penghasilan - 3;
        $gapmahasiswa->gap_tanggungan = $mahasiswa->tanggungan->nilai_tanggungan - 3;
        $gapmahasiswa->gap_semester = $mahasiswa->semester->nilai_semester - 2;
        $gapmahasiswa->save();

        $gap_ipk = $gapmahasiswa->gap_ipk;
        if ($gap_ipk == "0") {
            $bobot_ipk = 5;
        } elseif ($gap_ipk == "1") {
            $bobot_ipk = 4.5;
        } elseif ($gap_ipk == "-1") {
            $bobot_ipk = 4;
        } elseif ($gap_ipk == "2") {
            $bobot_ipk = 3.5;
        } elseif ($gap_ipk == "-2") {
            $bobot_ipk = 3;
        } elseif ($gap_ipk == "3") {
            $bobot_ipk = 2.5;
        } elseif ($gap_ipk == "-3") {
            $bobot_ipk = 2;
        } elseif ($gap_ipk == "4") {
            $bobot_ipk = 1.5;
        } else {
            $bobot_ipk = 1;
        }

        $gap_penghasilan = $gapmahasiswa->gap_penghasilan;
        if ($gap_penghasilan == "0") {
            $bobot_penghasilan = 5;
        } elseif ($gap_penghasilan == "1") {
            $bobot_penghasilan = 4.5;
        } elseif ($gap_penghasilan == "-1") {
            $bobot_penghasilan = 4;
        } elseif ($gap_penghasilan == "2") {
            $bobot_penghasilan = 3.5;
        } elseif ($gap_penghasilan == "-2") {
            $bobot_penghasilan = 3;
        } elseif ($gap_penghasilan == "3") {
            $bobot_penghasilan = 2.5;
        } elseif ($gap_penghasilan == "-3") {
            $bobot_penghasilan = 2;
        } elseif ($gap_penghasilan == "4") {
            $bobot_penghasilan = 1.5;
        } else {
            $bobot_penghasilan = 1;
        }

        $gap_tanggungan = $gapmahasiswa->gap_tanggungan;
        if ($gap_tanggungan == "0") {
            $bobot_tanggungan = 5;
        } elseif ($gap_tanggungan == "1") {
            $bobot_tanggungan = 4.5;
        } elseif ($gap_tanggungan == "-1") {
            $bobot_tanggungan = 4;
        } elseif ($gap_tanggungan == "2") {
            $bobot_tanggungan = 3.5;
        } elseif ($gap_tanggungan == "-2") {
            $bobot_tanggungan = 3;
        } elseif ($gap_tanggungan == "3") {
            $bobot_tanggungan = 2.5;
        } elseif ($gap_tanggungan == "-3") {
            $bobot_tanggungan = 2;
        } elseif ($gap_tanggungan == "4") {
            $bobot_tanggungan = 1.5;
        } else {
            $bobot_tanggungan = 1;
        }

        $gap_semester = $gapmahasiswa->gap_semester;
        if ($gap_semester == "0") {
            $bobot_semester = 5;
        } elseif ($gap_semester == "1") {
            $bobot_semester = 4.5;
        } elseif ($gap_semester == "-1") {
            $bobot_semester = 4;
        } elseif ($gap_semester == "2") {
            $bobot_semester = 3.5;
        } elseif ($gap_semester == "-2") {
            $bobot_semester = 3;
        } elseif ($gap_semester == "3") {
            $bobot_semester = 2.5;
        } elseif ($gap_semester == "-3") {
            $bobot_semester = 2;
        } elseif ($gap_semester == "4") {
            $bobot_semester = 1.5;
        } else {
            $bobot_semester = 1;
        }

        $ncf = (($bobot_ipk) + ($bobot_penghasilan)) / 2;
        $nsf = (($bobot_tanggungan) + ($bobot_semester)) / 2;
        $hasil = (0.6 * $ncf) + (0.4 * $nsf);

        $hasil_mahasiswa = new Ranking();
        $hasil_mahasiswa->id = $mahasiswa->id;
        $hasil_mahasiswa->bobot_ipk = $bobot_ipk;
        $hasil_mahasiswa->bobot_penghasilan = $bobot_penghasilan;
        $hasil_mahasiswa->bobot_tanggungan = $bobot_tanggungan;
        $hasil_mahasiswa->bobot_semester = $bobot_semester;
        $hasil_mahasiswa->ncf = $ncf;
        $hasil_mahasiswa->nsf = $nsf;
        $hasil_mahasiswa->hasil = $hasil;
        $hasil_mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Tersimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $ipk = Ipk::all();
        $penghasilan = Penghasilan::all();
        $tanggungan = Tanggungan::all();
        $semester = Semester::all();

        return view('back.mahasiswa.edit', [
            'mahasiswa' => $mahasiswa,
            'ipk' => $ipk,
            'penghasilan' => $penghasilan,
            'tanggungan' => $tanggungan,
            'semester' => $semester
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $gapmahasiswa = Gapmahasiswa::find($id);
        $hasil_mahasiswa = Ranking::find($id);

        $mahasiswa->update([
            'nama' => $request->nama,
            'id_ipk' => $request->id_ipk,
            'id_penghasilan' => $request->id_penghasilan,
            'id_tanggungan' => $request->id_tanggungan,
            'id_semester' => $request->id_semester
        ]);

        $gapmahasiswa->update([
            'id' => $mahasiswa->id,
            'gap_ipk' => $mahasiswa->ipk->nilai_ipk - 3,
            'gap_penghasilan' => $mahasiswa->penghasilan->nilai_penghasilan - 3,
            'gap_tanggungan' => $mahasiswa->tanggungan->nilai_tanggungan - 3,
            'gap_semester' => $mahasiswa->semester->nilai_semester - 2
        ]);

        $gap_ipk = $gapmahasiswa->gap_ipk;
        if ($gap_ipk == "0") {
            $bobot_ipk = 5;
        } elseif ($gap_ipk == "1") {
            $bobot_ipk = 4.5;
        } elseif ($gap_ipk == "-1") {
            $bobot_ipk = 4;
        } elseif ($gap_ipk == "2") {
            $bobot_ipk = 3.5;
        } elseif ($gap_ipk == "-2") {
            $bobot_ipk = 3;
        } elseif ($gap_ipk == "3") {
            $bobot_ipk = 2.5;
        } elseif ($gap_ipk == "-3") {
            $bobot_ipk = 2;
        } elseif ($gap_ipk == "4") {
            $bobot_ipk = 1.5;
        } else {
            $bobot_ipk = 1;
        }

        $gap_penghasilan = $gapmahasiswa->gap_penghasilan;
        if ($gap_penghasilan == "0") {
            $bobot_penghasilan = 5;
        } elseif ($gap_penghasilan == "1") {
            $bobot_penghasilan = 4.5;
        } elseif ($gap_penghasilan == "-1") {
            $bobot_penghasilan = 4;
        } elseif ($gap_penghasilan == "2") {
            $bobot_penghasilan = 3.5;
        } elseif ($gap_penghasilan == "-2") {
            $bobot_penghasilan = 3;
        } elseif ($gap_penghasilan == "3") {
            $bobot_penghasilan = 2.5;
        } elseif ($gap_penghasilan == "-3") {
            $bobot_penghasilan = 2;
        } elseif ($gap_penghasilan == "4") {
            $bobot_penghasilan = 1.5;
        } else {
            $bobot_penghasilan = 1;
        }

        $gap_tanggungan = $gapmahasiswa->gap_tanggungan;
        if ($gap_tanggungan == "0") {
            $bobot_tanggungan = 5;
        } elseif ($gap_tanggungan == "1") {
            $bobot_tanggungan = 4.5;
        } elseif ($gap_tanggungan == "-1") {
            $bobot_tanggungan = 4;
        } elseif ($gap_tanggungan == "2") {
            $bobot_tanggungan = 3.5;
        } elseif ($gap_tanggungan == "-2") {
            $bobot_tanggungan = 3;
        } elseif ($gap_tanggungan == "3") {
            $bobot_tanggungan = 2.5;
        } elseif ($gap_tanggungan == "-3") {
            $bobot_tanggungan = 2;
        } elseif ($gap_tanggungan == "4") {
            $bobot_tanggungan = 1.5;
        } else {
            $bobot_tanggungan = 1;
        }

        $gap_semester = $gapmahasiswa->gap_semester;
        if ($gap_semester == "0") {
            $bobot_semester = 5;
        } elseif ($gap_semester == "1") {
            $bobot_semester = 4.5;
        } elseif ($gap_semester == "-1") {
            $bobot_semester = 4;
        } elseif ($gap_semester == "2") {
            $bobot_semester = 3.5;
        } elseif ($gap_semester == "-2") {
            $bobot_semester = 3;
        } elseif ($gap_semester == "3") {
            $bobot_semester = 2.5;
        } elseif ($gap_semester == "-3") {
            $bobot_semester = 2;
        } elseif ($gap_semester == "4") {
            $bobot_semester = 1.5;
        } else {
            $bobot_semester = 1;
        }

        $ncf = (($bobot_ipk) + ($bobot_penghasilan)) / 2;
        $nsf = (($bobot_tanggungan) + ($bobot_semester)) / 2;
        $hasil = (0.6 * $ncf) + (0.4 * $nsf);

        $hasil_mahasiswa->update([
            'id' => $mahasiswa->id,
            'bobot_ipk' => $bobot_ipk,
            'bobot_penghasilan' => $bobot_penghasilan,
            'bobot_tanggunngan' => $bobot_tanggungan,
            'bobot_semester' => $bobot_semester,
            'ncf' => $ncf,
            'nsf' => $nsf,
            'hasil' => $hasil
        ]);

        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        $gapmahasiswa = gapmahasiswa::find($id);
        $gapmahasiswa->delete();
        $hasil_mahasiswa = Ranking::find($id);
        $hasil_mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
