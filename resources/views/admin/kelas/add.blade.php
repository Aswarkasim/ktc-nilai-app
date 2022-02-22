  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">
          <a href="/admin/kelas" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>

        @if (Request::is('admin/kelas/create'))
          <form action="/admin/kelas" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/kelas/{{$kelas->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf

         

              <div class="form-group">
                <label for="">Nama Kelas</label>
                <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($kelas) ? $kelas->name : old('name')}}" placeholder="Nama Kelas">
                @error('name')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

              <div class="form-group">
                <label for="">Tahun Ajaran</label>
                <input type="text" class="form-control  @error('tahun_ajaran') is-invalid @enderror"  name="tahun_ajaran"  value="{{isset($kelas) ? $kelas->tahun_ajaran : old('tahun_ajaran')}}" placeholder="Tahun Ajaran">
                @error('tahun_ajaran')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

            <div class="form-group">
            <label for="">Tipe Penilaian</label>
            <select name="type" class="form-control @error('type') is-invalid @enderror" id="">
              <option value="">-- Tipe Penilaian --</option>
              <option value="boolean"
              <?php 
              if(isset($kelas)) {
                if($kelas->type == 'boolean') {
                  echo 'selected';
                  }
              }else{
                if(old('type') == 'boolean') {
                  echo 'selected';
                }
              } ?> >Boolean (0/1)</option>
              <option value="persen"
              <?php 
              if(isset($kelas)) {
                if($kelas->type == 'persen') {
                  echo 'selected';
                  }
              }else{
                if(old('type') == 'persen') {
                  echo 'selected';
                }
              } ?>
              >Persen (Skala 1-100)</option>
            </select>
             @error('type')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

              <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea class="form-control  @error('desc') is-invalid @enderror" id="summernote"  name="desc" placeholder="Desckripsi">{{isset($kelas) ? $kelas->desc : old('desc')}}</textarea>
                @error('desc')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

          

     
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

<script src="/plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

