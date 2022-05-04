<template>
  <b-card class="mx-auto" max-wdth="400">
    <b-card-title>{{employeeName}}</b-card-title>
    <b-card-sub-title>{{employeeEmail}}</b-card-sub-title>
    <b-card-text>{{employeeSex}}</b-card-text>
    <b-card-text>{{employeeStatus}}</b-card-text>
    <b-card-text>{{employeeSalary}}</b-card-text>
    <b-card-actions>
      <v-spacer></v-spacer>
      <slot name="button"></slot>
    </b-card-actions>
  </b-card>
</template>
<script>
export default {
  middleware: ['auth'],
  props: ['employeeName', 'employeeEmail', 'employeeSex', 'employeeStatus', 'employeeSalary'],
}
</script>

<style scoped>

</style>
