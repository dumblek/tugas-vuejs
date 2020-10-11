<template>
    <div class="container">
        <h2>Edit Barang</h2>
        <hr>
            <form action="#" method="post" @submit.prevent="update">
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
                    <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
    </div>
</template>

<script>
export default {
    data () {
        return{
                form: {
                    nama : '',
                    stok : '',
                    description : ''
                }
              }  
            },

    methods : {
                update: function(){
                    try{
                        let response = axios.put('/api/item/'+this.$route.params.id, this.form).then(response => {
                            console.log(response.status)
                            if (response.status == 200){
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
    mounted(){
                    axios.get('/api/item/'+this.$route.params.id).then(response => {
                    this.form.nama = response.data.nama;
                    this.form.stok = response.data.stok;
                    this.form.description = response.data.description;
                })
            },
}
</script>
