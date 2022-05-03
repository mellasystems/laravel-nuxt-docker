<template>
    <div class="card mt-3">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist" id="myReport">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home">Usuarios</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile">Empleados</button>
        </li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="card">
            <div class="card-header">
              Usuarios
            </div>
            <div class="card-body">
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="card">
            <div class="card-header">
              Empleados
            </div>
            <div class="card-body">
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: "report",
  middleware: ['auth'],
}
</script>

<style scoped>

</style>
