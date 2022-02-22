<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal-default-tugas">
  <i class="fas fa-edit"></i> Edit
</button>
 
 <div class="modal fade" id="modal-default-tugas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Lengkapi Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          @if (isset($item))
            <form action="/admin/tugas/{{isset($item) ? $item->id : ''}}" method="POST">
          @else
            <form action="/admin/tugas" method="POST">
          @endif
          @csrf
          <div class="form-group">
            <label for="">Nama Sertifikat</label>
            <input type="text" value="{{isset($item) ? $item->name : ''}}" required placeholder="Nama Setifikat" name="name" class="form-control">
          </div>

           <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            
        </form>
      </div>
     
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->