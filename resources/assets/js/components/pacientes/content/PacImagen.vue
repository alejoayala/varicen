<template>
  <!-- Tabla de contenido -->
  <div class="col-lg-9 col-md-9 col-sm-8">
      <div class="row">
          <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                  <div class="col-md-12">
                    <div class="row">
                        <file-upload-images :accept="accept" :extensions="extensions" :multiple="multiple" :name="name" @upload-complete="actualizame"></file-upload-images>                   
                        <div class="clearfix"></div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-4 col-xs-6" v-for="archivo in archivos" :key="archivo.name">
                            <a class="example-image-link" :href="archivo.url.replace('localhost','localhost:8000')" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                                <img class="thumbnail img-responsive" :src="archivo.url.replace('localhost','localhost:8000')">
                            </a>
                        </div>                                           
                    </div>
                  </div>
                </div>
            </div>

          </div>
      </div><!-- /.row -->

  </div>
  <!-- /. Tabla de contenido -->
</template>
<script>
export default {
    name: 'pacimagen',
    data () {
      return {
        accept: 'image/png,image/jpg,image/gif,image/jpeg',
        extensions: 'pdf',        
        multiple: true,
        name: 'file',
        archivos: [],
        //datos:'hola',
        dataFile: {
            file:''
        }        
      }
    },
    mounted() {
        this.LoadDirectory(); 
    
    },
    updated(){
      this.getMenuClick()

    },    
    methods: {
        LoadDirectory: function(){
            var url ="/api/listarImages/"+ this.$route.params.patient
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
            //console.log("files del storage: ",response.data)
            this.$emit('sendimg', this.$route.params.patient)

            }).catch(error => {
            //console.log("error en el componente: ",error.response);
            this.errors = error.response.data.status;
            toastr.error("Hubo un error en el proceso: "+this.errors);
            });            
        },
        actualizame: function(){
            //console.log("actualizo directory")
            this.LoadDirectory()
        },
        getMenuClick: function(){ 
            lightbox.option({
                'albumLabel': "Imagen %1 de %2"
            }) 
        }
    }
}
</script>
<style scoped>
  .modal-dialog {width:600px;}
  .thumbnail {margin-bottom:6px;}
</style>

