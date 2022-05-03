<template>
  <!-- Here start the form for register employee     -->
  <div class="card-body">
    <form @submit.prevent="save">
      <div class="mb-3">
        <label class="form-label">Nombre Completo</label>
        <input type="text" class="form-control" placeholder="Nombre Completo"
               autofocus v-model="form.name" name="name">
        <small class="form-text text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
      </div>
      <div class="mb-3">
        <label class="form-label">Sexo</label>
        <div class="form-group">
          <select class='form-control' name="sex">
            <option :value='null'>Seleccionar</option>
            <option v-for='sex in sexes'
                    :value="sex.key" v-text="sex.value">
            </option>
          </select>
          <small class="form-text text-danger" v-if="errors.sex">{{ errors.sex[0] }}</small>
        </div>
      </div>
      <div class="mb-3">
        <div class="form-group">
          <label>Fecha de creación</label>
          <div class="input-group">
            <input class="form-control" v-model="form.created_date" type="date"
                   value="2011-08-19" aria-describedby="sizing-addon2" name="created_date">
          </div>
        </div>
        <small class="form-text text-danger" v-if="errors.created_date">{{ errors.created_date[0] }}</small>
      </div>
      <div class="mb-3">
        <div class="form-group">
          <label>Salario </label>
          <input class="form-control" type="number" name="salary"
                 v-model="form.salary">
        </div>
        <small class="form-text text-danger" v-if="errors.salary">{{ errors.salary[0] }}</small>
      </div>
      <div class="m-t-20 text-center">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Guardar
          </button>
          <button type="button" class="btn btn-danger">Cancelar
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  middleware: ['auth'],
  props: {
    isModalVisible: true
  },
  data() {
    return {
      form: {
        name: '',
        sex: '',
        status: null,
        createdDate: null,
        salary: 0,
      },
      sexes: [
        {value: 'Masculino', key: 'masculine'}, {value: 'Femenino', key: 'femenine'}
      ],
    }
  },

  methods: {
    async save() {
      await this.$axios.$post('api/v1/employees', this.form);
      this.$router.push('/employee');
    }
  }
}
</script>

<style scoped>

</style>
