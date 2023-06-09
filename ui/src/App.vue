<template>
  <NavbarRoot />
  <router-view/>
</template>

<script>
  import NavbarRoot from "./components/NavbarRoot.vue";

  export default {
    name: "App",
    components: {
      NavbarRoot
    }
  }
</script>
