<template>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-2">
                <img :src="image" class="img-responsive">
            </div>
            <div class="col-md-8">
                <input type="file" @change="onFileChange">
            </div>
            <div v-if="image">
                <button @click.prevent="removeImage">Remove image</button>
            </div>
            <!--<div class="col-md-2">
                <button class="btn btn-success btn-block" @click="upload">Upload</button>
            </div>-->
        </div>
    </div>
</template>
<style scoped>
    img{
        max-height: 36px;
    }
</style>
<script>
    export default{
        data(){
            return {
                image: ''
            }
        },
        props: ['fileImagen'],
        created: function() {
            this.$parent.$on('getClear', this.removeImage);
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length) {
                  this.image = null;
                  return;
                }
                this.createImage(files[0]);
                //console.log('archivo -> ' + files[0].name); // nombre del archivo
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                    this.$emit('cargaImagen', vm.image); // enviamos la imagen al componente principal
                };
                reader.readAsDataURL(file);
            },
            upload(){    // Accion para subir las imagenes al servidor
                axios.post('/upload',{image: this.image}).then(response => {

                });
            },
            removeImage: function (e) {
              this.image = '';
              $('input[type=file]').val('');
            }
        }
    }
</script>
