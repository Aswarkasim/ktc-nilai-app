<div class="row">

   <div class="col-md-5">
     <a href="/admin/kelas/{{request('kelas_id')}}" class="btn btn-info mb-3"><i class="fa fa-arrow-left"></i> Kembali ke kelas</a>
    <div class="card p-3">
      <h5><b>List Siswa {{$tugas->name}}</b></h5>

       @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

      {{-- <form action="/admin/nilai/update?tugas_id={{$tugas->id}}" method="POST"> --}}
        @method('PUT')
        @csrf
      <table class="table">
        <thead>
          <tr>
            <td width="50px">No</td>
            <td>Nama</td>
            <td width="100px">Nilai</td>
          </tr>  
        </thead>
        <tbody>
          @foreach ($nilai as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->siswa->name}}</td>
            <td>
              @if ($tugas->is_done == 1)
              <div id="div_nilai{{$item->id}}">{{$item->nilai}}</div>
              @else
              <input type="text" id="input_nilai{{$item->id}}" name="nilai{{$item->id}}" onclick="element_change({{$item->id}})" onchange="input_nilai({{$item->id}})" value="{{$item->nilai}}" class="form-control">
              @endif
              {{-- <input type="text" name="nilai{{$item->id}}" value="{{$item->nilai}}" class="form-control"> --}}
            </td>
          </tr>

          @endforeach
        </tbody>
      </table>
      @if ($tugas->is_done == 0)
        <a href="/admin/tugas/is_done?tugas_id={{$tugas->id}}&boolean=1" class="btn btn-info">Selesai</a>
        @else
        <a href="/admin/tugas/is_done?tugas_id={{$tugas->id}}&boolean=0" class="btn btn-info">Buka Kembali</a>
      @endif
      {{-- </form> --}}
    </div>
  </div>


</div>

<script>



  function input_nilai(id){
    var nilai = $("[name='nilai"+id+"']").val();
    console.log(nilai+' adakah '+ id);

    $.ajax({
      method: 'GET',
      url: '/admin/nilai/update?id='+id+'&nilai='+nilai,
      dataType:'json',
      success: function(data){
        console.log(data);
      }
    });
  }
</script>