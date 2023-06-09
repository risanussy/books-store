<template>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark"  data-bs-theme="dark">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="../assets/logo.png" alt="Bootstrap" width="30">
          Books Store
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link class="nav-link active" aria-current="page" to="/">Home</router-link> 
            </li>
            <li class="nav-item">
              <router-link class="nav-link" to="/form">Tambah</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
</template>    

<script>
    export default {
        name: 'NavbarRoot',
    }
</script>