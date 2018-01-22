<template>
  <!-- page content -->
  <div class="right_col" role="main">
    <!-- header-content -->
    <div class="header-content">
      <h2><i class="fa fa-edit"></i> Empresa <span>Datos Generales</span></h2>
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
                  <a href="#">Empresa</a>
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
              <!-- form de atencion medica -->
              <div class="container-fluid">
                <form data-sample-validation-1 class="form-horizontal form-bordered" role="form">
                    <div class="form-body">
                        <div class="form-group text-center">
                            <label for="">Logo de la Empresa </label>
                            <div class="row">
                                <div class="container-Photo center-block">
                                    <div>
                                        <img class="img-Photo pl-0" :src="image" >
                                    </div>
                                    <div class="col-md-12 pl-0 pr-0 mt-5 text-center" v-if="!image">
                                        <label for="file-upload" class="custom-file-upload">
                                            <i class="fa fa-folder-open"></i> Seleccionar
                                        </label>
                                        <input id="file-upload" type="file" @change="onFileChange"/>
                                    </div>
                                    <div class="col-md-12 pl-0 pr-0 text-center" v-if="image"> 
                                        <button type="button" class="btn btn-danger mt-5 mb-10" @click.prevent="removeImage"><i class="fa fa-remove"></i> Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.form-group -->                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" v-model="dataCompany.name">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Razón Social <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" v-model="dataCompany.business_name">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">RUC <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" v-model="dataCompany.RUC">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Dirección <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" v-model="dataCompany.address">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Telefono <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control input-sm" v-model="dataCompany.telephone">
                            </div>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email <span class="asterisk">*</span></label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control input-sm" v-model="dataCompany.email">
                            </div>
                        </div><!-- /.form-group -->
                    </div><!-- /.form-body -->
                  <div class="col-md-12 pt-20 mb-10 mt-0 pr-20 separator">
                      <div class="pull-right pr-10">
                          <button type="button" class="btn btn-primary active" @click.prevent="updateCompany"><i class="fa fa-cloud-upload"></i> Actualizar Datos</button>
                      </div>
                  </div><!-- /.form-footer -->                    
                </form>
              </div>
              <!-- /. form de atencion medica -->
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
</template>
<script>
import { mapState , mapGetters } from 'vuex'
export default {
    name: 'conempresa',
    data () {
      return {
          image: '',
          dataCompany: {
              name:'',
              business_name:'',
              RUC:'',
              address:'',
              telephone:'',
              email:'',
              logo_img:'',
              image:''
          }
      }
    },
    created(){
        this.$store.dispatch('LOAD_COMPANY_LIST').then(() => {          
            this.dataCompany = this.company[0]
            if(this.dataCompany.logo_img != null){
                this.image = '/images/'+this.dataCompany.logo_img
            }
            //console.log('compania: ',this.dataCompany)
        }) 
    },
    computed: {
        ...mapState([ 'company' ,'user_system']),      
    },    
    methods:{
        onFileChange(e) {
            let files = e.target.files || e.dataTransfer.files
            if (!files.length) {
                this.image = null
                return
            }
            this.createImage(files[0])
            //console.log('archivo -> ' + files[0].name); // nombre del archivo
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.image = e.target.result
                vm.dataCompany.image = vm.image
                //this.$emit('cargaImagen', vm.image); // enviamos la imagen al componente principal
            }
            reader.readAsDataURL(file)
        },
        removeImage: function (e) {
            this.image = ''
            this.dataCompany.image = ''
            $('input[type=file]').val('')
        },
        updateCompany: function(){
            var url = '/api/company/1';
            toastr.options.closeButton = true;
            toastr.options.progressBar = true;
            axios.put(url, this.dataCompany).then(response => {
                if(typeof(response.data.errors) != "undefined"){
                    this.errors = response.data.errors;
                    var resultado = "";
                    for (var i in this.errors) {
                        if (this.errors.hasOwnProperty(i)) {
                            resultado += "error -> " + i + " = " + this.errors[i] + "\n";
                        }
                    }
                    toastr.error(resultado);
                    return;
                }
                this.errors = [];
                toastr.success('se actualizaron los datos correctamente');
            }).catch(error => {
                this.errors = error.response.data.status;
                toastr.error("Hubo un error en el proceso: "+this.errors);
                console.log(error.response.status);
            });
        }, 
             
    }
}
</script>
<style scoped>
    .container-Photo {
        width: 600px;
        height: 150px;
    }

    .img-Photo {
        width: 600px;
        height: 150px;
        padding: 3px;
    }

    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 8px 12px;
        cursor: pointer;
        background-color:rgb(67, 83, 131);
        color:white;
        /*width: 100%;*/
    }    
</style>
