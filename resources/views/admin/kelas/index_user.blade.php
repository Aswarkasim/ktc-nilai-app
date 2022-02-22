

<div class="row">
  <div class="col-md-12">

  <a href="/admin/kelas/create" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a>

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/kelas" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>


  <div class="row">
    @foreach ($kelas as $item)
        
    <div class="col-md-3">
      <a href="/admin/kelas/{{$item->id}}">
        <div class="card-list rounded p-2">
          <p class="nama-judul mt-3"><b> {{$item->name}} </b></p>
        </div>
      </a>
    </div>
    @endforeach
  </div>

  <div class="float-right">
    {{$kelas->links()}}
  </div>


  </div>
</div>

<!-- /.card-body -->


