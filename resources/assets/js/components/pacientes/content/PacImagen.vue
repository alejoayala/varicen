<template>
  <!-- Tabla de contenido -->
  <div class="col-lg-9 col-md-9 col-sm-8">
      <div class="row">
          <div class="col-md-12">
            <div class="x_panel">
                <div class="x_content">
                  <div class="col-md-12">
                    <div class="row">
                        <!--<button class="btn btn-primary btn-sm"><i class="fa fa-cloud-upload"></i> Subir Imagen</button>-->
                        <file-upload-images :accept="accept" :extensions="extensions" :multiple="multiple" :name="name" @upload-complete="actualizame"></file-upload-images>                   
                        <div class="clearfix"></div>
                    </div>
<!--                     <div class="title_left">
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group pull-left top_search">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Buscar ...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                          </span>
                        </div>
                      </div>
                    </div> -->
                  </div>
                  <div class="clearfix"></div>
                  <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-4 col-xs-6" v-for="archivo in archivos" :key="archivo.name">
                            <a class="example-image-link" :href="archivo.url.replace('localhost','localhost:8000')" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                                <img class="thumbnail img-responsive" :src="archivo.url.replace('localhost','localhost:8000')">
                            </a>
                        </div>
<!--                         <div class="col-lg-3 col-sm-4 col-xs-6"><a title="Image 2" href="#"><img class="thumbnail img-responsive" src="//placehold.it/600x350/2255EE"></a></div>
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
 -->                                           
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

