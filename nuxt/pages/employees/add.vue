<template>
  <div class="card mt-2">
    <div class="card-body">
      <h4>Crear un empleado</h4>
      <form @submit.prevent="save">
        <div class="mb-3">
          <label class="form-label"><b>Nombre Completo</b></label>
          <input type="text" class="form-control" placeholder="Nombre Completo"
                 autofocus v-model.trim="form.name">
          <small class="form-text text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
        </div>
        <div class="mb-3">
          <label class="form-label"><b>Sexo</b></label>
          <div class="form-group">
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" name="sex" class="form-check-input"
                       v-model="form.sex" value="Masculino">Masculino
              </label>
            </div>
            <div class="form-check-inline">
              <label class="form-check-label">
                <input type="radio" name="sex" class="form-check-input"
                       v-model="form.sex" value="Femenino">Femenino
              </label>
            </div>
            <small class="form-text text-danger" v-if="errors.sex">{{ errors.sex[0] }}</small>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-group">
            <label><b>Fecha de creación</b></label>
            <div class="input-group">
              <input class="form-control" v-model.trim="form.created_date" type="date"
                     value="2011-08-19" aria-describedby="sizing-addon2" name="created_date">
            </div>
          </div>
          <small class="form-text text-danger" v-if="errors.created_date">{{ errors.created_date[0] }}</small>
        </div>
        <div class="mb-3">
          <div class="form-group">
            <label><b>Salario</b></label>
            <input class="form-control" type="number" name="salary"
                   v-model.trim="form.salary">
          </div>
          <small class="form-text text-danger" v-if="errors.salary">{{ errors.salary[0] }}</small>
        </div>
        <div class="mb-3">
          <label class="form-label"><b>Estado</b></label>
          <div class="form-group">
            <select class='form-control' name="status" v-model.trim="form.status">
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
  data() {
    return {
      form: {
        id: '',
        name: '',
        sex: '1',
        status: '1',
        created_date: null,
        salary: '',
      },
    }
  },
  methods: {
    //Method for save an employees
    async save() {
      console.log(this.form)
      await this.$axios.$post('api/v1/employees', {
        'name': this.form.name,
        'sex': this.form.sex,
        'created_date': this.form.created_date,
        'salary': this.form.salary,
        'status': this.form.status,
      }).then((response) => {
        this.$router.back();
      }).catch(err => {
        console.log(err);
      });

    },
  },
}
</script>

<style scoped>

</style>
