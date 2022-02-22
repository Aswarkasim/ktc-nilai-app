<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSiswaController extends Controller
{
    //
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
            $siswa = Siswa::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $siswa = Siswa::where('kelas_id', $kelas_id)->latest()->paginate(10);
        }
        $data = [
            'title'   => 'Manajemen Siswa',
            'siswa' => $siswa,
            'content' => 'admin/siswa/index'
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
            'title'   => 'Tambah Siswa',
            'content' => 'admin/siswa/add'
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

        Siswa::create($data);
        Alert::success('Sukses', 'Siswa telah ditambahkan');
        return redirect('/admin/siswa?kelas_id=' . $request->kelas_id);
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
        //
        $data = [
            'title'   => 'Edit Siswa',
            'siswa'    => Siswa::find($id),
            'content' => 'admin/siswa/add'
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
        $siswa = Siswa::find($id);
        $data = $request->validate([
            'name'              => 'required',
            'kelas_id'              => 'required'
        ]);


        $siswa->update($data);
        Alert::success('Sukses', 'Siswa telah diubah');
        return redirect('/admin/siswa/' . $id . '/edit?kelas_id=' . $request->kelas_id);
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
        $siswa = Siswa::find($id);
        $kelas_id = $siswa->kelas_id;
        $siswa->delete();
        Alert::success('Sukses', 'Siswa sukses dihapus');
        return redirect('/admin/siswa?kelas_id=' . $kelas_id);
    }
}
