<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <NuxtLink class="navbar-brand" to="/">
        <img src="@/static/mellasystems32x32.png" alt="mellasystems"/> CRUD Empleados
      </NuxtLink>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <template v-if="$auth.loggedIn">
          <ul class="navbar-nav">
            <li class="nav-item">
              <NuxtLink to="/" class="nav-link">Inicio</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink to="/employees" class="nav-link">Empleados</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink to="/users" class="nav-link">Usuarios</NuxtLink>
            </li>
            <li class="nav-item">
              <NuxtLink to="/reports" class="nav-link">Reporte</NuxtLink>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item d-flex">
              <button type="button" class="btn btn-outline-danger" @click="logout">Salir</button>
            </li>
          </ul>
        </template>
        <template v-else>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <NuxtLink to="/login" class="nav-link btn btn-outline-primary">Entrar</NuxtLink>
            </li>
          </ul>
        </template>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: 'Navbar',
  middleware: 'auth',
  computed: {},
  methods: {
    async logout() {
      this.$auth.logout();
      this.$router.push('login');
      this.$nuxt.refresh();
    }
  }
}
</script>
