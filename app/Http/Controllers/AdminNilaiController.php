<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminNilaiController extends Controller
{
    //

    function update()
    {
        // die('masuk bos');
        // $nilai = Nilai::where('tugas_id', request('tugas_id'))->get();

        // foreach ($nilai as $n) {
        //     $nilai_siswa = Nilai::find($n->id);
        //     $nilai_siswa->nilai = $request->nilai . $n->id;
        //     $nilai_siswa->save();
        // }

        $id = request('id');
        $nilai = Nilai::find($id);

        $nilai->nilai = request('nilai');
        $nilai->save();

        return response()->json(['success' => 'Berhasil']);

        // Alert::success('Berhasil', 'Nilai berhasil diupdate');
        // return redirect()->back();
    }
}
