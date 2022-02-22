
<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/siswa/create'))
          <form action="/admin/siswa" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/siswa/{{$siswa->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf
          <input type="hidden" name="kelas_id" value="{{request('kelas_id')}}">
              <div class="form-group">
                <label for="">Nama Siswa</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($siswa) ? $siswa->name : old('name')}}" placeholder="Nama Kelas">
                @error('name')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>
          <a href="/admin/siswa?kelas_id={{request('kelas_id')}}" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>

         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>


