<template>
  <div class="card mt-2">
    <!-- Here start the form for register employee     -->
    <div class="card-body">
      <template v-if="!isFormVisible">
        <div class="card-header">
          <h3>Lista de Empleados</h3>
          <span class=" d-md-flex justify-content-md-end">
        <button class="btn btn-primary" type="button" @click="openForm('employee', 'store', employees)">Agregar</button>
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
                <button type="button" class="btn btn-info" @click="openForm('employee', 'update', employee)">Editar
                </button>&nbsp;&nbsp;
                <button type="button" class="btn btn-danger" @click="deleteEmployee(employee.id)">Borrar</button>
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
      <!-- end list of employees     -->

      <!--     <Employee is-modal-visible="false" v-else/>-->
      <template v-else>
        <div class="card-body">
          <!--          <h5></h5>-->
          <form @submit.prevent="save">
            <div class="mb-3">
              <label class="form-label">Nombre Completo</label>
              <input type="text" class="form-control" placeholder="Nombre Completo"
                     autofocus v-model.trim="form.name">
              <small class="form-text text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
            </div>
            <div class="mb-3">
              <label class="form-label">Sexo</label>
              <div class="form-group">
                <select class='form-control' name="sex" v-model.trim="form.sex">
                  <option value='1'>Seleccionar</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Masculino">Masculino</option>
                </select>
                <small class="form-text text-danger" v-if="errors.sex">{{ errors.sex[0] }}</small>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-group">
                <label>Fecha de creación</label>
                <div class="input-group">
                  <input class="form-control" v-model.trim="form.created_date" type="date"
                         value="2011-08-19" aria-describedby="sizing-addon2" name="created_date">
                </div>
              </div>
              <small class="form-text text-danger" v-if="errors.created_date">{{ errors.created_date[0] }}</small>
            </div>
            <div class="mb-3">
              <div class="form-group">
                <label>Salario </label>
                <input class="form-control" type="number" name="salary"
                       v-model.trim="form.salary">
              </div>
              <small class="form-text text-danger" v-if="errors.salary">{{ errors.salary[0] }}</small>
            </div>
            <div class="m-t-20 text-center">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Guardar
                </button>
                <button type="button" class="btn btn-danger" @click="closeForm">Cancelar
                </button>
              </div>
            </div>
          </form>
        </div>
      </template>
      <!-- End form for register employee     -->
    </div>
  </div>

</template>

<script>
import Employee from "@/components/forms/Employee";

export default {
  middleware: ['auth'],
  components: {
    Employee
  },
  data() {
    return {
      employees: [],
      links: [],
      isFormVisible: false,
      form: {
        id: '',
        name: '',
        sex: '',
        status: true,
        created_date: null,
        salary: '',
      },
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
      return this.employees = {...this.employees, ...data}
      this.$nuxt.refresh();
    },
    //Open form Employee
    openForm(model, action, data = []) {
      this.isFormVisible = true;
      switch (model) {
        case 'employee': {
          switch (action) {
            case 'store': {
              this.form.name = '';
              this.form.sex = '';
              this.form.created_date = null;
              this.form.salary = 0;
              this.form.status = false;
              break;
            }
            case 'update': {
              this.form.id = data.id
              this.form.name = data.name;
              this.form.sex = data.sex;
              this.form.status = true;
              this.form.created_date = data.created_date;
              this.form.salary = data.salary;
              break;
            }
          }
        }
      }
    },
    //Close form Employee
    closeForm() {
      this.isFormVisible = false;
      this.form.name = '';
      this.form.sex = '';
      this.form.created_date = null;
      this.form.salary = 0;
      this.$nuxt.refresh();
    },
    //Method for save an employee
    async save() {
      await this.$axios.$post('api/v1/employees', {
        'name': this.form.name,
        'sex': this.form.sex,
        'created_date': this.form.created_date,
        'salary': this.form.salary,
        'status': this.form.status,
      }).then((response) => {
        this.closeForm();
        this.$router.push('/employee');
        this.$nuxt.refresh();
      }).catch(err => {
        console.log(err);
      });
    },
    async update(){
      await this.$axios.$put('api/v1/employees', {
        'name': this.form.name,
        'sex': this.form.sex,
        'created_date': this.form.created_date,
        'salary': this.form.salary,
        'status': this.form.status,
        'id': this.form.id
      }).then((response) => {
        this.closeForm();
        this.$router.push('/employee');
        this.$nuxt.refresh();
      }).catch(err => {
        console.log(err);
      });
    },
    async deleteEmployee(id) {
      await this.$axios.$delete(`api/v1/employees/${id}`);
      this.$nuxt.refresh();
    }
  },
}
</script>

<style scoped>

</style>
