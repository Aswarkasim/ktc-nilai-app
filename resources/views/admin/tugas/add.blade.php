
<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/tugas/create'))
          <form action="/admin/tugas" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/tugas/{{$tugas->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf
          <input type="hidden" name="kelas_id" value="{{request('kelas_id')}}">
              <div class="form-group">
                <label for="">Nama Tugas</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($tugas) ? $tugas->name : old('name')}}" placeholder="Nama Kelas">
                @error('name')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>
          <a href="/admin/tugas?kelas_id={{request('kelas_id')}}" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>

         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>


