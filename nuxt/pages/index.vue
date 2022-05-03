<template>
  <div class="card mt-2" v-if="$auth.loggedIn">
    <div class="card-header">
      <h3>Dashboard</h3>
    </div>
    <div class="card-body">
      <p><b>Bienvenido </b> : {{ $auth.user.name}}</p>
    </div>
  </div>
  <div class="card mt-2" v-else>
    <div class="card-header">
      <h3>Bienvenido al CRUD de Empleados</h3>
    </div>
    <div class="card-body">
      <p>
        Para iniciar sesión en la aplicacion haga click en el boton entrar
        que esta en la parte superior derecha y coloque sus credenciales.
      </p>
    </div>
  </div>
</template>

<script>
import Default from "~/layouts/default";

export default {
  auth: false,
  name: 'IndexPage',
  components: {Default},
  middleware: 'auth',

}
</script>
