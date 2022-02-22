<div class="row">
  <div class="col-12">

<div class="card">
<div class="card-body">
  @if (request('kelas_id'))
  <a href="/admin/kelas/{{request('kelas_id')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali ke kelas</a>
    <a href="/admin/tugas/create?kelas_id={{request('kelas_id')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
  @endif

  <div class="float-right">
    <form action="/admin/tugas" method="get">
    <div class="input-group input-group-sm">
        <input type="hidden" name="kelas_id" value="{{request('kelas_id')}}">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/tugas?kelas_id={{request('kelas_id')}}" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th width="100px">No</th>
      <th>Judul</th>
      <th width="150px">Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($tugas as $row)
        
    <tr>
      <td width="50px">{{$loop->iteration}}</td>
      <td><a href="/admin/tugas/{{$row->id}}"><b>{{$row->name}}</a></b> </td>
      <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/admin/tugas/{{$row->id}}/edit?kelas_id={{request('kelas_id')}}"><i class="fa fa-edit"></i> Edit</a>
                <div class="dropdown-divider"></div>
                <form action="/admin/tugas/{{$row->id}}" method="POST" id="form-delete" class="tombol-hapus">
                  @method('delete')
                  @csrf
                  <button type="submit" id="delete" class="dropdown-item"><i class="fa fa-trash"></i> Hapus</button>
                </form>
            </div>
          </div>
      </td>
    </tr>

    @endforeach

  </tbody>
</table>

  <div class="float-right">
    {{$tugas->links()}}
  </div>
</div>
</div>

  </div>
</div>

<!-- /.card-body -->


