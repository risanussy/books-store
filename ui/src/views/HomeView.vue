<template>
  <div class="container pt-4">
    <div class="info"></div>
    <h1 class="mb-3">List Buku</h1>
    <router-link to="/form" class="btn btn-primary"><i class="fa-solid fa-book"></i> Tambah Buku</router-link>
    <br>
    <table class="table mt-4">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Penulis</th>
          <th scope="col">Tema</th>
          <th scope="col">Judul</th>
          <th scope="col">Harga</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody v-for="(data, index) in datas" :key="data.id">
        <tr>
          <th scope="row">{{index+1}}</th>
          <td>{{ data.nama }}</td>
          <td>{{ data.tema }}</td>
          <td>{{ data.judul }}</td>
          <td>{{ data.harga }}</td>
          <td>
            <button class="btn btn-success" @click="modal(data.id)" data-bs-toggle="modal" data-bs-target="#edit" style="margin-right: 3px;"><i class="fa-solid fa-pen-to-square"></i></button>
            <button class="btn btn-outline-danger" @click="del(data.id)"><i class="fa-solid fa-trash"></i></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="modal"  id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form @submit.prevent="edit(id)">
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
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios';

export default {
  name: 'HomeView',
  data(){
    return {
      datas: [],
      id: '',
      nama: '',
      tema: '',
      judul: '',
      deskripsi: '',
      harga: '',
    }
  },
  mounted(){
    axios.get('http://localhost:8000/api/list')
      .then(res => {
        this.datas = res.data.data
      })
  },
  methods: {
    // Ambil Semua
    list(){
      axios.get('http://localhost:8000/api/list')
        .then(res => {
          this.datas = res.data.data
        })
    },
    // Hapus Data
    del(id){
      axios.delete("http://localhost:8000/api/delete/"+ id)
        .then(res => {
          this.list()
          document.querySelector('.info').innerHTML = `
              <div class="alert alert-danger" role="alert">
                ${res.data.message}
              </div>  
          `
        })
    },
    modal(id){
      axios.get('http://localhost:8000/api/detail/' + id)
        .then(res => {
            this.id = res.data.data.id
            this.nama = res.data.data.nama
            this.tema = res.data.data.tema
            this.judul = res.data.data.judul
            this.deskripsi = res.data.data.deskripsi
            this.harga = res.data.data.harga
        })
    },
    edit(id){
      const edit = `?nama=${this.nama}&tema=${this.tema}&judul=${this.judul}&deskripsi=${this.deskripsi}&harga=${this.harga}`
      axios.put('http://localhost:8000/api/edit/' + id + edit)
        .then(res => {
            this.list()
            // untuk close otomatis modal box
            document.querySelector('#edit').classList.remove('show'); // untuk menghilangkan modal
            document.querySelector('.modal-backdrop').classList.remove('show'); // untuk menghilangkan modal
            document.querySelector('.modal-backdrop').classList.remove('modal-backdrop'); // untuk menghilangkan modal
            document.querySelector('#edit').setAttribute('aria-hidden', 'true');
            document.querySelector('#edit').style.display = 'none'

            // memunculkan info berhasil
            document.querySelector('.info').innerHTML = `
                <div class="alert alert-success" role="alert">
                  ${res.data.message}
                </div>`
        })
    }
  }
}
</script>
