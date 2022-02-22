<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $cari = request('cari');

        if ($cari) {
            $kelas = Kelas::where('user_id', $user_id)->where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $kelas = Kelas::where('user_id', $user_id)->latest()->paginate(10);
        }

        if (auth()->user()->role == 'admin') {
            $content = 'admin/kelas/index';
        } else {
            $content = 'admin/kelas/index_user';
        }
        $data = [
            'title'   => 'Manajemen Kelas',
            'kelas' => $kelas,
            'content' => $content
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
            'title'   => 'Tambah Kelas',
            'content' => 'admin/kelas/add'
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
            'type'              => 'required',
            'tahun_ajaran'      => 'required|min:3',
            'desc'              => 'required|min:3',
        ]);
        $data['user_id']    = auth()->user()->id;


        Kelas::create($data);
        Alert::success('Sukses', 'Kelas telah ditambahkan');
        return redirect('/admin/kelas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //kerjakan ini
        // $tugas = Tugas::get();
        // $data = [
        //     'title'   => 'Detail Kelas',
        //     'tugas'     => $tugas,
        //     'kelas_id' => $id,
        //     'content' => 'admin/kelas/detail'
        // ];
        // return view('admin/layouts/wrapper', $data);
        return redirect('/admin/siswa?kelas_id=' . $id);
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
            'title'   => 'Edit Kelas',
            'kelas'    => Kelas::find($id),
            'content' => 'admin/kelas/add'
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
        $kelas = Kelas::find($id);
        $data = $request->validate([
            'name'              => 'required',
            'type'              => 'required',
            'tahun_ajaran'      => 'required|min:3',
            'desc'              => 'required|min:3',
        ]);
        $data['user_id']    = auth()->user()->id;


        $kelas->update($data);
        Alert::success('Sukses', 'Kelas telah diubah');
        return redirect('/admin/kelas/' . $id . '/edit');
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
        $kelas = Kelas::find($id);
        $kelas->delete();
        Alert::success('Sukses', 'Kelas sukses dihapus');
        return redirect('/admin/kelas');
    }
}
