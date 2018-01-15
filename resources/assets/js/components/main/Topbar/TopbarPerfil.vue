<template>
    <div>
        <li class="" v-if="user_system">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img :src="'/images/'+ user_system.user.employee.photo" alt="">{{user_system.user.employee.name}} {{user_system.user.employee.lastname}}
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a @click.prevent="loadForm"> Cambio de contraseña<i class="fa fa-key pull-right"></i></a></li>
            <li><a @click.prevent="logout"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a></li>
          </ul>
        </li>
        <!-- Formulario modal-->
        <modal name="Formpassword" :width="'25%'" :height="'auto'" :scrollable="true" :clickToClose="false">

            <div class="container">
              <div class="row title-form">
                  <h3 class="pull-left h3-title">Cambio de contraseña</h3>
                  <div class="pull-right close-form" @click="$modal.hide('Formpassword')"><i class="fa fa-close"></i></div>                
              </div>
              <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="changePassword">
                  <div class="form-body">
                    <div class="col-md-12 pt-20">
                        <div class="form-group">
                            <label class="control-label">Escriba su contraseña actual <span class="asterisk">*</span></label>
                            <div class="">
                                <input type="password" class="form-control input-sm" v-model="dataPassword.antPass" required>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-label">Escriba su nueva contraseña <span class="asterisk">*</span></label>
                            <div class="">
                                <input type="password" class="form-control input-sm" v-model="dataPassword.newPass" required>
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="control-label">Repita su nueva contraseña </label>
                            <div class="">
                                <input type="password" class="form-control input-sm" v-model="dataPassword.repPass" required>
                            </div>                            
                        </div><!-- /.form-group -->                                                                                                                                                
                    </div>

                  </div><!-- /.form-body -->
                  <div class="col-md-12 pt-20 mb-10 mt-0 pr-20 separator">
                      <div class="pull-right pr-10">
                          <button type="button" class="btn btn-danger active" @click="$modal.hide('Formpassword')"><i class="fa fa-reply-all"></i> Cancelar</button>
                          <button type="submit" class="btn btn-primary active"><i class="fa fa-cloud-upload"></i> Grabar</button>
                      </div>
                  </div><!-- /.form-footer -->
              </form>
            </div>

        <!-- /. modal -->        
      </modal>

    </div>
          

</template>
<script>
import { mapState, mapGetters } from 'vuex'
export default {
  name: 'topbarperfil',
  data () {
    return {
      dataPassword:{
        antPass:'',
        newPass:'',
        repPass:''
      }
    }
  },
  computed: {
      ...mapState(['user_system']),
  },  
  methods: {
    logout() {
      //this.$router.push({ name: 'login' })
      this.$store.dispatch('LOGOUT').then(() => {
        this.$store.dispatch('LOAD_PROFILE_USER')
        this.$router.push({ name: 'login' })
      })
    },
    loadForm: function(){
      this.dataPassword = {
        antPass:'',
        newPass:'',
        repPass:''
      }      
      this.$modal.show('Formpassword')
    },
    changePassword: function()
    {
        var url = '/api/users/'+this.user_system.user.id;
        toastr.options.closeButton = true;
        toastr.options.progressBar = true;
        axios.put(url, this.dataPassword).then(response => {
          if(typeof(response.data.errors) != "undefined"){
              this.errors = response.data.errors;
              var resultado = "";
              for (var i in this.errors) {
                if (this.errors.hasOwnProperty(i)) {
                    resultado += "error -> " + i + " = " + this.errors[i] + "\n";
                }
              }
              //toastr.error(resultado);
              toastr.error("Hubo un error en el proceso: verifique los datos ingresados ");
              return;
          }
          this.$modal.hide('Formpassword');
          this.errors = [];
          toastr.success('se realizo el cambio de clave correctamente');
        }).catch(error => {
          this.errors = error.response.data.status;
          this.$modal.hide('Formpassword');
          toastr.error("Hubo un error en el proceso: "+this.errors);
          console.log(error.response.status);
        });

    },
  }  
}
</script>
<style scoped>
  .title-form {
    background-color: #347c7c;
    color: white;
    margin:0;
    padding:0
  }

  .h3-title {
    margin:10px 0 10px 20px;
  }

  .close-form {
    margin:15px;
    border-radius: 50%;
    cursor: pointer;
  }

  .img-thumbs {
    max-width: 35px;
  }

  .separator {
    border-top: 1px solid #CCC7B8;
  }
</style>
