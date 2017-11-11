@extends('admin.template.main')

@section('content')
  <!-- page content -->
  <div class="right_col" role="main" >

    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-tasks"></i> Modulos <span>Menu del Sistema</span></h2>
      <!-- breadcrumb-wrapper -->
      <div class="breadcrumb-wrapper hidden-xs">
          <span class="label">Estas en:</span>
          <ol class="breadcrumb">
              <li>
                  <i class="fa fa-home"></i>
                  <a data-ng-href="#">Home</a>
                  <i class="fa fa-angle-right"></i>
              </li>
              <li>
                  <a href="#">Modulos</a>
                  <i class="fa fa-angle-right"></i>
              </li>
          </ol>
      </div>
      <!-- /.breadcrumb-wrapper -->
    </div>
    <!-- /.header-content -->
    <br/>
    <!-- content calendar -->
    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_content">
              <div class="page-title">
                <div class="pull-right">
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" uib-dropdown-toggle data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      Nuevo <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="#myModal" data-toggle="modal" data-target="#myModal">Módulo</a></li>
                      <li><a href="#">Menú</a></li>
                      <li><a href="#">Opción</a></li>
                    </ul>
                  </div>
                  <!--<button class="btn btn-primary" data-toggle="modal" data-target="#mymodal"><i class="fa fa-edit"></i> Nuevo </button>-->
                </div>
                <div class="title_left">
                  <h3>Menú del Sistema</h3>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-xs-3 pl-0">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left">
                  <li class="active"><a href="#home" data-toggle="tab">General</a>
                  </li>
                  <!--<li><a href="#profile" data-toggle="tab">Profile</a>
                  </li>
                  <li><a href="#messages" data-toggle="tab">Messages</a>
                  </li>
                  <li><a href="#settings" data-toggle="tab">Settings</a>
                  </li>-->
                </ul>
              </div>

              <div class="col-xs-9 pr-0">
                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="home">
                    <p class="lead">Home tab</p>
                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                      synth. Cosby sweater eu banh mi, qui irure terr.</p>
                  </div>
                  <div class="tab-pane" id="profile">Profile Tab.</div>
                  <div class="tab-pane" id="messages">Messages Tab.</div>
                  <div class="tab-pane" id="settings">Settings Tab.</div>
                </div>
              </div>

              <div class="clearfix"></div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content calendar -->
  </div>
  <!-- /page content -->
@endsection

@section('modal')
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          {!! Form::open(['route'=> 'agenda','method'=>'POST']) !!}
              <div class="form-group">
                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required'])!!}
              </div>
              <div class="form-group">
                {!! Form::label('modulo','Módulo') !!}
                {!! Form::select('modulo')!!}
              </div>


          {!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
