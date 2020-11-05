<template>
    <div class="container">
        <h2>Tambah Barang</h2>
        <hr>
            <form action="#" method="post" @submit.prevent="store">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" v-model="form.nama" class="form-control" id="nama">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                    <div class="col-sm-10">
                    <input type="text" v-model="form.stok" class="form-control" id="stok">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                    <textarea v-model="form.description" class="form-control" id="description"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <select v-model="form.measurement_id" class="form-control" id="measurement_id">
                            <option v-for="measurement in measurements" :key="measurement.id" :value="measurement.id">
                                {{measurement.measurement}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                    <input type="text" v-model="form.price" class="form-control" id="price">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
    </div>
</template>

<script>
import authHeader from '../auth-header';

export default {
    data () {
        return{
                measurements: [],
                form: {
                    nama : '',
                    stok : '',
                    description : '',
                    measurement_id : '',
                    price : '',
                }
              }  
            },

    mounted(){
        this.getMeasurements();
    },

    methods : {
                store: function(){
                    try{
                        authHeader();
                        let response = axios.post('/api/item', this.form).then(response => {
                            console.log(response.status)
                            console.log(response.data)
                            if (response.status == 201){
                                this.form = {
                                    nama : '',
                                    stok : '',
                                    description : '',
                                    measurement_id : '',
                                    price : '',
                                }
                                this.$router.push({ name: "home" });
                            }
                        });
                    } catch (e){
                        console.log('e.response.data.errors')
                    }
                },

                getMeasurements: function(){
                    console.log('halo')
                    axios.get('/api/measurements').then(response => {
                        console.log(response.data[0].measurement)
                        this.measurements = response.data;
                    })
                }
            },
}
</script>
