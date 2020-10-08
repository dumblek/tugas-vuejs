<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Belajar VueJS</title>
</head>
<body>
    <div id='app'>
        <div class="container mt-5">
        <h1>Sistem Manajemen Barang</h1>
            <div class="input-group mb-3">
                <input type="text" v-model="newItem" @keyup.enter="addItem(newItem)" class="form-control" placeholder="Masukkan nama item" aria-label="Masukkan nama hewan" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" @click="addItem(newItem)">Tambah</button>
                </div>
            </div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in items">
                        <th scope="row">@{{index+1}}</th>
                        <td>@{{item.nama}}</td>
                        <td>@{{item.stok}}</td>
                        <td>@{{item.created_at}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" @click="plus(item)" class="btn btn-secondary mr-1">+</button>
                                <button type="button" @click="minus(item)" class="btn btn-secondary mr-1">-</button>
                                <button type="button" @click="delItem(index, item)" class="btn btn-secondary">Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
    <script>
        var templateQuis = Vue.extend({
            template: '#item-template',
            props: ['contents']  
        })

        Vue.component('item-template', {
            template: '#item-template',
            props: ['items']
        })
        
        new Vue({
            el : '#app',
            data : {
                items: [],
                newItem: ''
                
            },
            methods : {
                addItem: function(newItem){
                    // POST /someUrl
                    this.$http.post('/api/item', {nama: newItem}).then(response => {
                    this.items.push({nama:newItem, stok: 0, created_at: '2020-10-08 19:45:02'})
                    });
                    this.newItem = ''
                },
                delItem: function(index, item){
                    let konfirmasi = confirm('Apakah anda yakin ingin menghapus item?')
                    if (konfirmasi){
                    // delete /someUrl
                    this.$http.delete('/api/item/'+item.id).then(response => {
                        this.items.splice(index, 1)
                    });
                        
                    }
                },
                plus: function(item){
                    this.$http.put('/api/item/plus/'+item.id).then(response => {
                        item.stok++
                    });
                },
                minus: function(item){
                    this.$http.put('/api/item/minus/'+item.id).then(response => {
                        item.stok--
                    });
                }
            },
            mounted: function(){
                    // GET /someUrl
                    this.$http.get('/api/item').then(response => {
                    // get body data
                    this.items = response.body;
                    });
            }
        });
    </script>
</body>
</html>