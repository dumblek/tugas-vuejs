<template>
    <div class="container">
        <h1>Sistem Manajemen Barang</h1>
        <hr>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Modifikasi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col" v-if="username">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in items" :key="item.id">
                        <th scope="row">{{index+1}}</th>
                        <td>{{item.nama}}</td>
                        <td>{{item.stok}}</td>
                        <td>{{item.measurement}}</td>
                        <td>{{item.price}}</td>
                        <td>{{item.description}}</td>
                        <td>{{item.user}}</td>
                        <td>{{item.created_at}}</td>
                        <td v-if="username">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" @click="plus(item)" class="btn btn-secondary mr-1">+</button>
                                <button type="button" @click="minus(item)" class="btn btn-secondary mr-1">-</button>
                                <button type="button" @click="delItem(index, item)" class="btn btn-secondary mr-1">Delete</button>
                                <router-link :to="{name:'edit', params:{id : item.id}}"><button type="button" class="btn btn-secondary">Edit</button></router-link>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table> 
        </div>
</template>

<script>
import authHeader from '../auth-header';

export default {
    data () {
        return{
                items: [],
                username: '',
              }  
            },

    methods : {
                delItem: function(index, item){
                    let konfirmasi = confirm('Apakah anda yakin ingin menghapus item?')
                    if (konfirmasi){
                    // delete /someUrl
                    axios.delete('/api/item/'+item.id).then(response => {
                        this.items.splice(index, 1)
                    });
                        
                    }
                },
                plus: function(item){
                    axios.put('/api/item/plus/'+item.id).then(response => {
                        item.stok++
                    });
                },
                minus: function(item){
                    axios.put('/api/item/minus/'+item.id).then(response => {
                        item.stok--
                    });
                },
                
            },

    mounted(){
        axios.get('/api/item').then(response => {     
            this.items = response.data.data;
        })
        this.currentUser;
    },

    computed: {
        currentUser: function(){
                            authHeader();
                            axios.get('/api/user').then(response => {      
                              this.username = response.data.name
                            })
                },
    },
}
</script>
