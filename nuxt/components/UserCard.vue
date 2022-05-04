<template>
  <b-card class="mx-auto" max-wdth="400">
    <b-card-title>{{userName}}</b-card-title>
    <b-card-sub-title>{{userEmail}}</b-card-sub-title>
    <b-card-text>{{userCreatedAt}}</b-card-text>
  </b-card>
</template>
<script>
export default {
  middleware: ['auth'],
  props: ['userName', 'userEmail', 'userCreatedAt'],
}
</script>

<style scoped>

</style>
