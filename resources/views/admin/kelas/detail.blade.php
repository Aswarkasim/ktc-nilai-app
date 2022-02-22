<div class="row">
  <div class="col-md-7">
    <div class="card p-3">
      <h5><b>List Tugas</b></h5>

      <a href="/admin/tugas?kelas_id={{$kelas_id}}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Tugas</a>

      <table class="table">
        <thead>
          <tr>
            <td>No</td>
            <td>Status</td>
            <td>Nama</td>
            <td>Action</td>
          </tr>  
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><i class="fa fa-spinner"></i></td>
            <td>Moving Camera</td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
                <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu" role="menu" x-placement="bottom-start">
                  <a class="dropdown-item" href="/admin/kelas//edit"><i class="fa fa-check"></i> Selesai</a>
                  <a class="dropdown-item" href="/admin/kelas//edit"><i class="fa fa-edit"></i> Edit</a>
                    <div class="dropdown-divider"></div>
                    <form action="/admin/kelas/" method="POST" id="form-delete" class="tombol-hapus">
                      @method('delete')
                      @csrf
                      <button type="submit" id="delete" class="dropdown-item"><i class="fa fa-trash"></i> Hapus</button>
                    </form>
                </div>
              </div>
              <a href="" class="btn btn-success"><i class="fas fa-sign-out-alt"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

   <div class="col-md-5">
    <div class="card p-3">
      <h5><b>List Siswa</b></h5>
      <a href="/admin/siswa?kelas_id={{$kelas_id}}" class="btn btn-primary"><i class="fas fa-list"></i> Manajemen Siswa</a>
      <table class="table">
        <thead>
          <tr>
            <td width="50px">No</td>
            <td>Nama</td>
          </tr>  
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Iswandi</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


</div>
