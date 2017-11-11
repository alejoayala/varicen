<template>
  <div class="col-lg-3 col-md-3 col-sm-4">
      <div class="panel rounded shadow">
          <div class="panel-body">
              <div class="inner-all">
                  <ul class="list-unstyled">
                      <li class="text-center">
                          <img class="img-circle img-bordered-primary" src="images/img2.jpg" alt="Tol Lee">
                      </li>
                      <li class="text-center">
                          <h4 class="text-capitalize">Ernesto Cota Condori</h4>
                          <p class="text-muted text-capitalize">Sede CENTRAL</p>
                      </li>
                      <li>
                          <a href="" class="btn btn-info btn-block">Datos Generales</a>
                      </li>
                      <li><br/></li>
                      <li>
                          <div class="btn-group-vertical btn-block">
                            <router-link :to="{ name: 'MedDatos'}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Datos Personales</router-link>
                            <router-link :to="{ name: 'MedTurno'}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Turnos</router-link>
                            <router-link :to="{ name: 'MedCita'}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Citas Programadas</router-link>
                         </div>
                      </li>
                      <li><br/></li>
                      <li>
                          <a href="" class="btn btn-info btn-block">Facturación</a>
                      </li>
                      <li><br/></li>
                      <li>
                          <div class="btn-group-vertical btn-block">
                            <router-link :to="{ name: 'MedProduccion'}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Produccion</router-link>
                            <router-link :to="{ name: 'MedPagorecibido'}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Pagos Recibidos</router-link>
                            <router-link :to="{ name: 'MedBalance'}" class="btn btn-default"><i class="fa fa-angle-double-right pull-left"></i> Balance</router-link>
                          </div>
                      </li>

                  </ul>
              </div>
          </div>
      </div><!-- /.panel -->

  </div>
</template>
<script>
export default {
    name: 'medmenu',
    data () {
      return {}
    }
}
</script>
