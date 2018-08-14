@extends('adminlte::page')


@section('title', 'e-ljp')

@section('content_header')
    <h1>Penonton</h1>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('penontons.create') }}"> Tambah Jumlah Penonton</a>
    </div></br>
    
@stop

@section('content')
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Kategori</th>
                  <th>Judul Film</th>
                  <th>Tanggal Tayang</th>
                  <th>Jumlah Penonton</th>
                  <!-- <th>Poster</th> -->
                  <th>Status</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($penontons as $film)
                @if(Auth::user()->id == $film->id_bioskop)
                <tr>
                  <td>{{ ++$i}}</td>
                  <td>{{$film->kategori}}</td>
                  <td>{{$film->film}}</td>
                  <td>{{$film->tgl_tayang}}</td>
                  <td>{{$film->jml_penonton}}</td>
                  <!-- <td><img src="/img/{{$film->poster}}" class="img-responsive" width="100" hight="100"/></td> -->
                  <td>
                  @if($film->status == 0)
                  <!-- <a href="#" value="{{ route('kirim',$film->id) }}" class="btn btn-sm btn-info modalMd" 
                    title="Show Data" data-toggle="modal" data-target="#modalMd">
                    <i class="fa fa-send"></i><span> test</span></a>

                    <a href="#" type="button" class="btn btn-default btn-sm" 
                      data-id="{{$film->id_bioskop}}"
                      data-kat="{{$film->kategori}}"
                      data-judul="adaf"
                      data-jml="a"
                      data-toggle="modal" data-target="#modal-default">
                      <i class="fa fa-send"></i><span> Kirim</span></a> -->
                       
                  <a href="{{ route('penontons.show',$film->id) }}" type="button" class="btn btn-info btn-sm"><i class="fa fa-send"></i><span> Kirim</span></a>
                    
                  @else
                  <i class="fa fa-check"></i> Terkirim
                  @endif
                  </td>
                  <td align="center">
                  @if($film->status == 0)
                    <form action="{{ route('penontons.destroy',$film->id) }}" method="POST">
                        <!-- <a class="btn bg-primary btn-sm" href="{{ route('penontons.show',$film->id) }}"><i class="fa fa-eye"></i></a> -->
                        <a class="btn bg-navy btn-sm" href="{{ route('penontons.edit',$film->id) }}"><i class="fa fa-edit"></i></a>
                        @csrf

                        @method('DELETE')
  
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                  @else
                  @endif
                  </td>
                </tr>
                @else
                @endif
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
              {!! $penontons->links() !!}
              </ul>
            </div>

            <div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="modalMdTitle"></h4>
                      </div>
                      <div class="modal-body">
                          <div class="modalError"></div>
                          <div id="modalMdContent"></div>
                      </div>
                  </div>
              </div>
            </div>

            <div class="modal fade" id="modal-default">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Default Modal</h4>
                  </div>
                  <div class="modal-body">
                    <p>One fine body&hellip;</p>
                    <div id="id"></div>
                    <input type="text" class="form-control" id="jml" name="jml" >
                    <div id="judul"></div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

          </div>
          
@stop

@section('adminlte_js')
<script>
  $('modal-default').on('show', function(e) {
      var link     = e.relatedTarget(),
          modal    = $(this),
          id = link.data("id"),
          kat = link.data("kat");
          judul = link.data("judul");
          jml = link.data("jml");

      modal.find("#id").val(id);
      modal.find("#kat").val(kat);
      modal.find("#judul").val(judul);
      modal.find("#jml").val(jml);
  });

//   $(document).on('ajaxComplete ready', function () {
//     $('.modalMd').off('click').on('click', function () {
//         $('#modalMdContent').load($(this).attr('value'));
//         $('#modalMdTitle').html($(this).attr('title'));
//     });
// });

      //data table
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
</script>
@stop