@extends('admin.template.main')

@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
      <!-- header-content -->
      <div class="header-content">
        <h2><i class="fa fa-user"></i> Pacientes <span>Listado General</span></h2>
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
                    <a href="#">Pacientes</a>
                    <i class="fa fa-angle-right"></i>
                </li>
            </ol>
        </div>
        <!-- /.breadcrumb-wrapper -->
      </div>
      <!-- /.header-content -->
      <br/>
      <div class="">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

              <div class="x_content">
                <div class="page-title">

                  <div class="title_left">
                    <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar Paciente...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="clearfix"></div>

                <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Paciente </th>
                        <th class="column-title">DNI </th>
                        <th class="column-title">Sede </th>
                        <th class="column-title">Telefono</th>
                        <th class="column-title">Celular </th>
                        <th class="column-title no-link last"><span class="nobr">Acción</span>
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td>
                            <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                            <span>Alexander Ayala Suncion</span>
                        </td>
                        <td class=" ">10230090</td>
                        <td class=" ">San Luis </td>
                        <td class=" ">2932098 </td>
                        <td class=" ">996048894</td>
                        <td class=" last">
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalle"><i class="fa fa-eye"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      <tr class="odd pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td>
                            <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                            <span>Alexander Ayala Suncion</span>
                        </td>
                        <td class=" ">10230090</td>
                        <td class=" ">San Luis </td>
                        <td class=" ">2932098 </td>
                        <td class=" ">996048894</td>
                        <td class=" last">
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalle"><i class="fa fa-eye"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td>
                            <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                            <span>Alexander Ayala Suncion</span>
                        </td>
                        <td class=" ">10230090</td>
                        <td class=" ">San Luis </td>
                        <td class=" ">2932098 </td>
                        <td class=" ">996048894</td>
                        <td class=" last">
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalle"><i class="fa fa-eye"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      <tr class="odd pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td>
                            <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                            <span>Alexander Ayala Suncion</span>
                        </td>
                        <td class=" ">10230090</td>
                        <td class=" ">San Luis </td>
                        <td class=" ">2932098 </td>
                        <td class=" ">996048894</td>
                        <td class=" last">
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalle"><i class="fa fa-eye"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td>
                            <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                            <span>Alexander Ayala Suncion</span>
                        </td>
                        <td class=" ">10230090</td>
                        <td class=" ">San Luis </td>
                        <td class=" ">2932098 </td>
                        <td class=" ">996048894</td>
                        <td class=" last">
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalle"><i class="fa fa-eye"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      <tr class="odd pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td>
                            <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                            <span>Alexander Ayala Suncion</span>
                        </td>
                        <td class=" ">10230090</td>
                        <td class=" ">San Luis </td>
                        <td class=" ">2932098 </td>
                        <td class=" ">996048894</td>
                        <td class=" last">
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalle"><i class="fa fa-eye"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td>
                            <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                            <span>Alexander Ayala Suncion</span>
                        </td>
                        <td class=" ">10230090</td>
                        <td class=" ">San Luis </td>
                        <td class=" ">2932098 </td>
                        <td class=" ">996048894</td>
                        <td class=" last">
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalle"><i class="fa fa-eye"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      <tr class="odd pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td>
                            <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                            <span>Alexander Ayala Suncion</span>
                        </td>
                        <td class=" ">10230090</td>
                        <td class=" ">San Luis </td>
                        <td class=" ">2932098 </td>
                        <td class=" ">996048894</td>
                        <td class=" last">
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalle"><i class="fa fa-eye"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td>
                            <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                            <span>Alexander Ayala Suncion</span>
                        </td>
                        <td class=" ">10230090</td>
                        <td class=" ">San Luis </td>
                        <td class=" ">2932098 </td>
                        <td class=" ">996048894</td>
                        <td class=" last">
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalle"><i class="fa fa-eye"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                      <tr class="odd pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td>
                            <img src="images/no-image-35x35.png"  class="img-circle img-bordered-theme" alt="">
                            <span>Alexander Ayala Suncion</span>
                        </td>
                        <td class=" ">10230090</td>
                        <td class=" ">San Luis </td>
                        <td class=" ">2932098 </td>
                        <td class=" ">996048894</td>
                        <td class=" last">
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ver detalle"><i class="fa fa-eye"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                          <a data-tooltip href="{{ route('pacienteview')}}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content -->

@endsection
