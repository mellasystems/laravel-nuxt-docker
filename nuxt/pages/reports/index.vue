<template>
    <div class="card mt-3">
      <!-- Nav tabs -->
      <div>
        <b-tabs content-class="mt-3" fill>
          <b-tab title="Usuarios" v-model="users" lazy>
            <ul v-for="(user, index) in users" :key="user.id">
              <li>
                {{user.name}} - {{user.email}}
              </li>
            </ul>
          </b-tab>
          <b-tab title="Empleados" active v-model="employees" lazy>
            <ul v-for="(employee, index) in employees" :key="employee.id">
              <li class="list-group-item">{{index +1 }} - {{ employee.name }}</li>
            </ul>
          </b-tab>
        </b-tabs>
      </div>
    </div>
</template>

<script>
export default {
  name: "report",
  middleware: ['auth'],
  data(){
    return{
      users: [],
      employees: [],
    }
  },
  methods: {
    async getAllEmployees(){
      await this.$axios.$get('api/v1/reports/employees').then((result) => {
        this.employees = result.data
      });
    }
  },
  async asyncData({$axios}) {
    let {data} = await $axios.get('api/v1/users');
    return {users: data}
  },
  mounted() {
    this.getAllEmployees();
  }
}
</script>

<style scoped>

</style>
