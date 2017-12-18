<template>
  <div class="login">

    <div class="login_wrapper">

      <div class="animate form login_form">
        <section class="login_content">
          <div class="brand" style="">
              <img src="images/logo.png" class="img-responsive" style=""/>
          </div>
          <form data-sample-validation-1 class="form-horizontal form-bordered" role="form" method="POST" v-on:submit.prevent="login">

            <h1>Acceso al Sistema</h1>
            <div>
              <input type="text" class="form-control" v-model="dataLogin.name" placeholder="DNI" required />
            </div>
            <div>
              <input type="password" class="form-control" v-model="dataLogin.password" placeholder="Password" required />
            </div>
            <div>
              <!--<a class="btn btn-danger submit" style="text-decoration:none" href="{{ route('home')}}">INGRESAR</a>-->
              <button type="submit" class="btn btn-danger submit">INGRESAR</button>
              <a class="reset_pass" href="#">Olvidaste tu password?</a>
            </div>
          </form>
          <div class="clearfix"></div>

          <div class="separator">
            <div>
              <p>Av. Canada 3690-2do.Piso - San Luis</p>
              <p>©2017 Todos los derechos reservados Varicen</p>
            </div>
          </div>

        </section>
      </div>

    </div>
  </div>
</template>
<script>
export default {
  name: 'login',
  data () {
    return {
      dataLogin: {
        name: '',
        password: ''
      },
      errors:[]
    }
  },
  methods: {
    login() {
      var url = "/api/login";
      axios.post(url, this.dataLogin).then(response => {
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
        console.log("response: ",response.data);
        //this.$store.dispatch('LOAD_PATIENTS_LIST');
        //this.errors = [];
        //$('#mymodal_patient').modal('hide');
        this.$store.dispatch('saveToken', response.data.logging)
        this.$store.dispatch('setCurrentUser', response.data.user)
        this.$router.push({ name: 'Dashboard' })
        toastr.success('Ingreso exitoso');
      }).catch(error => {
        this.errors = error.response.data.status;
        toastr.error("Hubo un error en el proceso: "+this.errors);
        console.log(error.response.status);

      });
    }
  }

}
</script>
<style>
</style>
