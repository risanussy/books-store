<template>
  <div class="container pt-4">
    <h1>Tambah Data</h1>
    <br>
    <form style="padding-right: 20%;" @submit.prevent="add()">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Penulis</label>
        <input type="text" class="form-control" id="nama" @input="e => nama = e.target.value" :value="nama" required>
      </div>
      <div class="mb-3">
        <label for="tema" class="form-label">Tema</label>
        <input type="text" class="form-control" id="tema" @input="e => tema = e.target.value" :value="tema" required>
      </div>
      <div class="mb-3">
        <label for="judul" class="form-label">Judul</label>
        <input type="text" class="form-control" id="judul" @input="e => judul = e.target.value" :value="judul" required>
      </div>
      <div class="mb-3">
        <label for="desc" class="form-label">Deskripsi</label>
        <textarea type="text" class="form-control" id="desc" @input="e => deskripsi = e.target.value" :value="deskripsi" required></textarea>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" @input="e => harga = e.target.value" :value="harga" required>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</template>

<script>
  import axios from 'axios'

  export default {
    name: "FormView",
    data(){
      return {
        nama: '',
        tema: '',
        judul: '',
        deskripsi: '',
        harga: '',
      }
    },
    methods: {
      add(){
        axios.post('http://localhost:8000/api/add', {
          nama : this.nama,
          tema : this.tema,
          judul : this.judul,
          deskripsi : this.deskripsi,
          harga : this.harga
        })
          .then(() => {
            this.nama = ''
            this.tema = ''
            this.judul = ''
            this.deskripsi = ''
            this.harga = ''

            window.location = '/'
          })

      }
    }
  }
</script>
