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
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
    </div>
</template>

<script>
export default {
    data () {
        return{
                newItem: '',
                form: {
                    nama : '',
                    stok : '',
                    description : ''
                }
              }  
            },

    methods : {
                store: function(){
                    try{
                        let response = axios.post('/api/item', this.form).then(response => {
                            console.log(response.status)
                            if (response.status == 201){
                                this.form = {
                                    nama : '',
                                    stok : '',
                                    description : ''
                                }
                            }
                        });
                    } catch (e){
                        console.log('e.response.data.errors')
                    }
                }
            },
}
</script>
