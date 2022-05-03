<template>
    <div class="card mt-2">
      <!-- Here start the form for register employee     -->
      <div class="card-body">
        <template>
          <div class="card-header">
            <h3>Lista de Usuarios</h3>
          </div>
          <table class="table">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo Electronico</th>
              <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(user, index) in users" :key="user.id">
              <th scope="row">{{ user.id }}</th>
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
              <td>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-info">Editar</button>&nbsp;&nbsp;
                  <button type="button" class="btn btn-danger">Borrar</button>
                </div>
              </td>
            </tr>
            </tbody>
          </table>
          <nav>
            <ul class="pagination justify-content-center">
              <li class="page-item" v-for="(key, value) in links">
                <a @click="loadMore(key)" class="page-link" href="#">{{ value }}</a></li>
            </ul>
          </nav>
        </template>
        <!-- end list of Users     -->
      </div>
    </div>
</template>
<script>

export default {
  middleware: ['auth'],
  data() {
    return {
      users: [],
      links: [],
    }
  },
  async asyncData({$axios}) {
    let {data} = await $axios.get('api/v1/users');
    return {users: data, links: data.links}
  },
  methods: {
    //Charge the links for the pagination
    async loadMore(key) {
      let {data} = await this.$axios.$get(key);
      return this.users = {...this.users, ...data}
      this.$nuxt.refresh();
    },

  },
}
</script>

<style scoped>

</style>
