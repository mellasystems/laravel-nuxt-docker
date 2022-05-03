<template>
      <div class="container col-md-6 mt-5">
        <h2 class="text-center">Iniciar sesión</h2>
        <br />
        <form @submit.prevent="submit">
<!--          <small class="form-text text-danger" v-if="errors">{{ errors.message }}</small>-->
          <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input v-model="form.email" type="email" class="form-control" placeholder="Correo electrónico"
             autofocus>
            <small class="form-text text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
          </div>
          <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input v-model="form.password" type="password" class="form-control" placeholder="Contraseña">
            <small class="form-text text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
          </div>
          <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
      </div>
</template>

<script>
export default {
  name: "login",
  mounted(){
    this.$axios.$get('sanctum/csrf-cookie').then(response => console.log(response))
      .catch( error => console.log(error));
  },
  data() {
    return {
      form: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    async submit() {
      this.$nuxt.$loading.start();
        await this.$auth.loginWith('laravelSanctum', {data: this.form })
          .then(() => {
            this.$router.push('/')
          }).catch(err => {
            console.log(err);
      });
      this.$nuxt.$loading.finish();
    }
  }
}
</script>
