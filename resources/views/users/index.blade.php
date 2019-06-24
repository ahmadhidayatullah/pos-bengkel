@extends('layouts.template')
@section('content')
    <!-- page content -->
    <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Users <small></small></h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>List Data <small>Users</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                  Pada table ini akan muncul data-data user yang ada!
                </p>
                <table id="datatable" class="table table-striped table-bordered">
                    @if(session('message')) {!!session('message')!!} @endif
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Level User</th>
                      <th>Tgl Buat</th>
                      <th>Action</th>
                    </tr>
                  </thead>
 

                  <tbody>
                    @foreach ($data as $item)    
                      <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->role->name}}</td>
                        <td>{{ date('d M Y',strtotime($item->created_at)) }}</td>
                        <td>
                            <a href="{{route('user.edit',$item->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            {{-- <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a> --}}
                            <a data-href="{{route('user.delete',$item->id)}}" data-toggle="modal" data-target="#confirm-delete" class="btn btn-danger btn-xs"
                                title="Hapus"><i class="fa fa-trash-o"></i> Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- /page content -->
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Hapus</h4>
                </div>
                <div class="modal-body">
                  <p>Ingin Menghapus Data Ini ?</p>
                </div>
                <div class="modal-footer">
                  <form action="" method="post" class="act-ok">
                    <button type="button" class="btn btn-default inline" data-dismiss="modal">Batal</button>
                    <input type="submit" name="submit" value="Hapus" class="btn btn-danger btn-ok"> {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection
@section('js')

<script type="text/javascript">
  $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.act-ok').attr('action', $(e.relatedTarget).data('href'));
    });

</script>
@endsection