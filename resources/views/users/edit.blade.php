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

        <div class="">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Update User <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        @if(session('message')) {!!session('message')!!} @endif
                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#home" data-toggle="tab">General</a>
                        </li>
                        <li><a href="#profile" data-toggle="tab">Password</a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                          {{-- tab general --}}
                        <div class="tab-pane active" id="home">
                          <div class="x_content">
                                <br />
                            <form id="general" action="{{route('user.update.general',$user->id)}}" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" required="required" name="name" value="{{$user->name}}" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('name')) 
                                        {!!format_message($errors->first('name'),'danger')!!}
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" id="email" name="email" value="{{$user->email}}" required="required" class="form-control col-md-7 col-xs-12">
                                    @if ($errors->has('email')) 
                                        {!!format_message($errors->first('email'),'danger')!!}
                                    @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Level User <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        @if (Auth::user()->role->id == 1)    
                                            <select class="form-control" name="role" required>
                                                @foreach ($roles as $role)
                                                    @if ($user->role_id == $role->id)
                                                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                    @else
                                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endif
                                                @endforeach
                                                </select> @if ($errors->has('role')) {!!format_message($errors->first('role'),'danger')!!}
                                            @endif
                                        @else
                                        <input type="text" value="{{$user->role->name}}" class="form-control" required readonly>
                                        <input type="hidden" value="{{$user->role_id}}" name="role" required>
                                        @endif
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{route('user')}}" class="btn btn-primary" type="button">Kembali</a>
                                    <button type="submit" id="general" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                                </form>
                            </div>
                        </div>
                        {{-- tab password --}}
                        <div class="tab-pane" id="profile">
                                <form id="general" action="{{route('user.update.password',$user->id)}}" data-parsley-validate class="form-horizontal form-label-left" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
    
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="first-name" required="required" name="password" class="form-control col-md-7 col-xs-12">
                                        @if ($errors->has('password')) 
                                            {!!format_message($errors->first('password'),'danger')!!}
                                        @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Konfrimasi Password <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" id="password_confirmation" name="password_confirmation" required="required" class="form-control col-md-7 col-xs-12">
                                        @if ($errors->has('password_confirmation')) 
                                            {!!format_message($errors->first('password_confirmation'),'danger')!!}
                                        @endif
                                        </div>
                                    </div>
    
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="{{route('user')}}" class="btn btn-primary" type="button">Kembali</a>
                                        <button type="submit" id="general" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
        
                                 </form>
                        </div>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                  </div>
                </div>
              </div>
        </div>
    </div>
        <!-- /page content -->
  
@endsection