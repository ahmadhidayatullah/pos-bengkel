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