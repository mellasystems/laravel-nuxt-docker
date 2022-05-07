<template>
  <div class="card mt-2">
    <!-- Here start the form for register employee     -->
    <div class="card-body">
      <div class="card-header">
        <h3>Lista de Empleados</h3>
        <span class=" d-md-flex justify-content-md-end">
        <NuxtLink class="btn btn-primary" type="button" to="/employees/create">Agregar</NuxtLink>
      </span>
      </div>
      <table class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Sexo</th>
          <th scope="col">Salario</th>
          <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(employee, index) in employees" :key="employee.id">
          <th scope="row">{{ employee.id }}</th>
          <td>{{ employee.name }}</td>
          <td>{{ employee.sex }}</td>
          <td>{{ employee.salary }}</td>
          <td>
            <div class="btn-group" role="group">
              <nuxt-link :to="{
                name: 'employees-id',
                path: 'employees/:id',
                params: {id: employee.id},
              }" class="btn btn-warning">Editar
              </nuxt-link>&nbsp;&nbsp;
              <a type="button" class="btn btn-danger" @click="deleteEmployee(employee.id)">Borrar</a>
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
    </div>
  </div>
</template>

<script>

export default {
  middleware: ['auth'],
  data() {
    return {
      employees: [],
      links: [],
    }
  },
  async asyncData({$axios}) {
    let {data} = await $axios.get('api/v1/employees');
    return {employees: data.data, links: data.links}
  },
  methods: {
    //Charge the links for the pagination
    async loadMore(key) {
      let {data} = await this.$axios.$get(key);
      return this.employees = {...this.employees, ...data};
      this.$nuxt.refresh();
    },
    async deleteEmployee(id) {
      await this.$axios.$delete(`api/v1/employees/${id}`).then(() => {
        this.$nuxt.refresh();
      }).catch(err => console.log(err));
    }
  },
}
</script>

<style scoped>

</style>
