<template>
  <!-- Tabla de contenido -->
  <div class="col-lg-9 col-md-9 col-sm-8">
      <div class="row">
          <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                  <div class="page-title">
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
                  <!-- Start sample validation 1-->
                  <div class="panel rounded shadow">

                      <div class="panel-body no-padding">
                        <file-upload-multiple :accept="accept" :extensions="extensions" :multiple="multiple" :name="name" @upload-complete="actualizame"></file-upload-multiple>
                        <div class="clearfix"></div>
                        <div class="row" style="padding-left:20px;padding-right:20px;">
                            <!-- Start table with actions -->
                            <div class="table-responsive mb-20">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Item</th>
                                        <th>Nombre Archivo</th>
                                        <th>Tamaño</th>
                                        <th>Fecha Ult.Mod.</th>
                                        <th class="text-center" style="min-width: 15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(archivo, index) in archivos" :key="archivo.name">
                                            <td class="text-center">{{ index + 1}}</td>
                                            <td>{{ archivo.name }}</td>
                                            <td>{{ archivo.size | returnFileSize }}</td>
                                            <td>{{ archivo.time | returnTime }}</td>
                                            <td class="text-center">
                                                <a data-tooltip :href="archivo.url.replace('localhost','localhost:8000')" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="ver detalle"><i class="fa fa-eye"></i></a>
                                                <a data-tooltip :href="archivo.url.replace('localhost','localhost:8000')" target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="imprimir"><i class="fa fa-print"></i></a>
                                                <a data-tooltip href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="eliminar"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div><!-- /.table-responsive -->
                        </div>

                      </div>
                  </div><!-- /.panel -->
                  <!--/ End sample validation 1 -->
                </div>
            </div>

          </div>
      </div><!-- /.row -->

  </div>
  <!-- /. Tabla de contenido -->
</template>
<script>
export default {
    name: 'pacdocumento',
    data () {
      return {
        accept: 'application/pdf',
        extensions: 'pdf',        
        multiple: true,
        name: 'file',
        archivos: [],
        datos:'hola'
      }
    },
    mounted(){ 
        this.LoadDirectory();
    },
    methods: {
        LoadDirectory: function(){
            var url ="/api/listarPDF";
            axios.get(url).then(response => {
            //console.log("response: ",response.data);
            if(typeof(response.data.errors) != "undefined"){
                this.errors = response.data.errors;
                var resultado = "";
                for (var i in this.errors) {
                    if (this.errors.hasOwnProperty(i)) {
                        resultado += "error -> " + i + " = " + this.errors[i] + "\n";
                    }
                }
                return;
            }
            this.archivos = response.data
            console.log("files del storage: ",response.data)
            this.$emit('send', this.$route.params.patient)

            }).catch(error => {
            console.log("error en el componente: ",error.response);
            this.errors = error.response.data.status;
            toastr.error("Hubo un error en el proceso: "+this.errors);
            });            
        },
        actualizame: function(){
            console.log("actualizo directory")
            this.LoadDirectory()
        }
    },
    filters:{
        returnFileSize : function(number){
            if(number < 1024) {
                return number + 'bytes';
            } else if(number > 1024 && number < 1048576) {
                return (number/1024).toFixed(1) + 'KB';
            } else if(number > 1048576) {
                return (number/1048576).toFixed(1) + 'MB';
            }
        },
        returnTime: function(number ){
            return moment.unix(number).format("DD-MM-YYYY hh:mm:ss")
        }
    }    
}
</script>
