<template>
  <div>
<!-- Navbar   -->
    <Navbar/>
    <main class="container container-fluid">
      <Nuxt keep-alive/>
    </main>
<!--    <Footer/>-->
  </div>
</template>

<script>
export default {
  name: "default",
  auth: false
}
</script>

<style scoped>

</style>
