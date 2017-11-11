@extends('admin.template.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main" >
      <!-- top tiles -->
      <div class="header-content">
        <h2><i class="fa fa-home"></i> Galeria de Imagenes <span>Alexander Ayala Suncion</span></h2>
        <div class="breadcrumb-wrapper hidden-xs">
            <span class="label">Estas en:</span>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a data-ng-href="#">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Imagenes</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div><!-- /.breadcrumb-wrapper -->
      </div>
      <br/>
      <!-- /.row -->
      <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-4">
              <div class="panel rounded shadow">
                  <div class="panel-body">
                      <div class="inner-all">
                          <ul class="list-unstyled">
                              <li class="text-center">
                                  <img class="img-circle img-bordered-primary" src="../../images/img.jpg" alt="Tol Lee">
                              </li>
                              <li class="text-center">
                                  <h4 class="text-capitalize">Alexander Ayala Suncion</h4>
                                  <p class="text-muted text-capitalize">Sede CENTRAL</p>
                              </li>
                              <li>
                                  <a href="" class="btn btn-info btn-block">Historial Clinico</a>
                              </li>
                              <li><br/></li>
                              <li>
                                  <div class="btn-group-vertical btn-block">
                                    <a href="{{ route('pacienteview') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Datos Personales</a>
                                    <!--<a href="{{ route('pacienteviewcita') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Citas</a>-->
                                    <a href="{{ route('pacienteviewhistorial') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Historial Clinico</a>
                                    <a href="{{ route('pacienteviewpresupuesto') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Presupuestos</a>
                                    <a href="{{ route('pacienteviewdocumento') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Documentos Clinicos</a>
                                    <a href="{{ route('pacienteviewimagen') }}" class="btn btn-danger"><i class="fa fa-chevron-right pull-right"></i>Imagenes y Videos</a>
                                 </div>
                              </li>
                              <li><br/></li>
                              <li>
                                  <a href="" class="btn btn-info btn-block">Facturación</a>
                              </li>
                              <li><br/></li>
                              <li>
                                <div class="btn-group-vertical btn-block">
                                    <a href="{{ route('pacienteviewpagos') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Recaudación(Pagos)</a>
                                    <a href="{{ route('pacienteviewpagoefectuado') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Pagos Recibidos</a>
                                    <a href="{{ route('pacienteviewpagoanulado') }}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i>Pagos Anulados</a>
                                </div>
                              </li>

                          </ul>
                      </div>
                  </div>
              </div><!-- /.panel -->

          </div>
          <!-- Tabla de contenido -->
          <div class="col-lg-9 col-md-9 col-sm-8">
              <div class="row">
                  <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_content">
                          <div class="page-title col-md-12">
                            <div class="pull-right">
                              <button class="btn btn-primary btn-sm"><i class="fa fa-cloud-upload"></i> Subir Imagen</button>
                            </div>
                            <div class="title_left">
                              <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Buscar ...">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="clearfix"></div>
                          <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 1" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 2" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/2255EE"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 3" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/449955/FFF"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 4" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/992233"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 5" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/2255EE"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 6" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/449955/FFF"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 8" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/777"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 9" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/992233"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 10" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/EEE"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 11" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/449955/FFF"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 12" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/DDD"></a></div>
                                <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 13" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/992233"></a></div>
                              <hr>
                              <hr>
                            </div>
                          </div>
                          <div tabindex="-1" class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                          		<button class="close" type="button" data-dismiss="modal">×</button>
                          		<h3 class="modal-title">Heading</h3>
                          	</div>
                          	<div class="modal-body">

                          	</div>
                          	<div class="modal-footer">
                          		<button class="btn btn-default" data-dismiss="modal">Close</button>
                          	</div>
                             </div>
                            </div>
                          </div>


                        </div>
                    </div>

                  </div>
              </div><!-- /.row -->

          </div>
          <!-- /. Tabla de contenido -->
      </div><!-- /.row -->


    </div>
    <!-- /page content -->

@endsection

@section('scripts')
    <script>
      $(document).ready(function() {
        $('.thumbnail').click(function(){
            $('.modal-body').empty();
          	var title = $(this).parent('a').attr("title");
          	$('.modal-title').html(title);
          	$($(this).parents('div').html()).appendTo('.modal-body');
          	$('#myModal').modal({show:true});
        });
      });
    </script>

@endsection
