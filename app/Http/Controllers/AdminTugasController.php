<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Tugas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari = request('cari');
        $kelas_id = request('kelas_id');

        if ($cari) {
            $tugas = Tugas::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $tugas = Tugas::where('kelas_id', $kelas_id)->latest()->paginate(10);
        }
        $data = [
            'title'   => 'Manajemen Tugas',
            'tugas' => $tugas,
            'content' => 'admin/tugas/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'title'   => 'Tambah Tugas',
            'content' => 'admin/tugas/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name'              => 'required',
            'kelas_id'          => 'required'
        ]);
        $data['user_id']    = auth()->user()->id;
        $data['is_done']    = 0;

        Tugas::create($data);
        Alert::success('Sukses', 'Tugas telah ditambahkan');
        return redirect('/admin/tugas?kelas_id=' . $request->kelas_id);
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
        $tugas = Tugas::find($id);
        $kelas_id = $tugas->kelas_id;
        $siswa = Siswa::where('kelas_id', $kelas_id)->get();

        // die('masuk');
        foreach ($siswa as $item) {
            $cek = Nilai::where('tugas_id', $id)->where('siswa_id', $item->id)->first();
            if (!$cek) {
                $data_nilai = [
                    'tugas_id'  => $id,
                    'siswa_id'  => $item->id,
                    'nilai'     => 0
                ];
                Nilai::create($data_nilai);
            }
        }

        $nilai = Nilai::with('siswa')->where('tugas_id', $id)->get();
        $data = [
            'title'   => 'Detail Tugas',
            'tugas'    => $tugas,
            'nilai'    => $nilai,
            'content' => 'admin/tugas/detail'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [
            'title'   => 'Edit Tugas',
            'tugas'    => Tugas::find($id),
            'content' => 'admin/tugas/add'
        ];
        return view('admin/layouts/wrapper', $data);
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
        //
        //
        $tugas = Tugas::find($id);
        $data = $request->validate([
            'name'              => 'required',
            'kelas_id'              => 'required'
        ]);

        $data['is_done']    = $tugas->is_done;


        $tugas->update($data);
        Alert::success('Sukses', 'Tugas telah diubah');
        return redirect('/admin/tugas/' . $id . '/edit?kelas_id=' . $request->kelas_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tugas = Tugas::find($id);
        $kelas_id = $tugas->kelas_id;
        $tugas->delete();
        Alert::success('Sukses', 'Tugas sukses dihapus');
        return redirect('/admin/tugas?kelas_id=' . $kelas_id);
    }

    function is_done()
    {
        $tugas_id = request('tugas_id');
        $boolean = request('boolean');
        $tugas = Tugas::find($tugas_id);
        $data = [
            'is_done' => $boolean
        ];
        $tugas->update($data);
        return redirect('/admin/tugas/' . $tugas_id);
    }
}
