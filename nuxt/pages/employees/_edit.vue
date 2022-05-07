<template>
  <div class="card mt-2">
    <div class="card-body">
      <h4>Actualizando el empleado: {{name}}</h4>
      <form @submit.prevent="update">
        <div class="mb-3">
          <label class="form-label"><b>Nombre Completo</b></label>
          <input type="text" class="form-control" placeholder="Nombre Completo"
                 autofocus v-model="name">
          <small class="form-text text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
        </div>
        <div class="mb-3">
          <label class="form-label"><b>Sexo</b></label>
          <div class="form-group">
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" name="sex" class="form-check-input"
                       v-model="sex" value="Masculino">Masculino
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" name="sex" class="form-check-input"
                        v-model="sex" value="Femenino">Femenino
              </label>
            </div>
            <small class="form-text text-danger" v-if="errors.sex">{{ errors.sex[0] }}</small>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-group">
            <label><b>Fecha de creación</b></label>
            <div class="input-group">
              <input class="form-control" type="date" v-model="created_date"
                     aria-describedby="sizing-addon2" name="created_date">
            </div>
          </div>
          <small class="form-text text-danger" v-if="errors.created_date">{{ errors.created_date[0] }}</small>
        </div>
        <div class="mb-3">
          <div class="form-group">
            <label><b>Salario</b></label>
            <input class="form-control" type="number" name="salary"
                   v-model="salary">
          </div>
          <small class="form-text text-danger" v-if="errors.salary">{{ errors.salary[0] }}</small>
        </div>
        <div class="mb-3">
          <label class="form-label"><b>Estado</b></label>
          <div class="form-group">
            <select class='form-control' name="status" v-model="status">
              <option value='1'>Seleccionar</option>
              <option :value="true">Activo</option>
              <option :value="false">Inactivo</option>
            </select>
            <small class="form-text text-danger" v-if="errors.sex">{{ errors.status[0] }}</small>
          </div>
        </div>
        <div class="m-t-20 text-center">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Guardar
            </button>
            <NuxtLink class="btn btn-danger" to="/employees">Cancelar
            </NuxtLink>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  middleware: ['auth'],
  props: {
  },
  data() {
    return {
      name: '',
      status: 1,
      id: '',
      created_date: null,
      salary: '',
      sex: 1,

    }
  },
  methods: {
    //Method for update an employees
    async update(){
      await this.$axios.patch('api/v1/employees/'+this.$route.params.edit, {
        'name': this.name,
        'sex': this.sex,
        'created_date': this.created_date,
        'salary': this.salary,
        'status': this.status,
      }).then((response) => {
        this.$router.push('/employees');
        this.$nuxt.refresh();
      }).catch(err => {
        console.log(err);
      });
    },
    getEmployeeById(){
      let id = this.$route.params.edit;
      this.$axios.$get(`api/v1/employees/${id}`).then((response) => {
        {
          this.name= response.data.name;
          this.sex= response.data.sex;
          this.status=  response.data.status;
          this.created_date= response.data.created_date;
          this.salary= response.data.salary;
        }
      });
    }
  },
  mounted() {
    this.getEmployeeById();
  }
}
</script>

<style scoped>

</style>
