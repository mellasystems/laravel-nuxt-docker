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
import Navbar from "@/components/Navbar";
export default {
  name: "default",
  auth: false,
  components: {
    Navbar
  }
}
</script>

<style scoped>

</style>
