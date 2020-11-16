<template>
    <div class="container">
        <h2>Profile</h2>
        <hr>
            <form action="#" method="post" @submit.prevent="store" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                    <input type="text" v-model="form.fullname" class="form-control" id="fullname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                    <input type="text" v-model="form.address" class="form-control" id="address">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="place_of_birth" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                    <input type="text" v-model="form.place_of_birth" class="form-control" id="place_of_birth">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date_of_birth" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" v-model="form.date_of_birth" class="form-control" id="date_of_birth">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone_number" class="col-sm-2 col-form-label">Nomor HP</label>
                    <div class="col-sm-10">
                    <input type="text" v-model="form.phone_number" class="form-control" id="phone_number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Photo Profil</label>
                    <div class="col-md-6" v-if="image">
                        <img :src="image" class="img-responsive" height="70" width="90">
                    </div>
                    <div class="col-sm-10">
                    <input type="file" name="photo" v-on:change="onFileChange" required>
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
                form: {
                    fullname : '',
                    address : '',
                    place_of_birth : '',
                    date_of_birth : '',
                    phone_number : '',
                    photo : '',
                },
                image : '',
                user_id : '',
              }  
            },

    methods : {
                onFileChange(e){
                    this.form.photo = e.target.files[0]
                    this.createImage(e.target.files[0]);
                },
                createImage(file) {
                    let reader = new FileReader();
                    let vm = this;
                    reader.onload = (e) => {
                        vm.image = e.target.result;
                    };
                    console.log(vm.image);
                    reader.readAsDataURL(file);
                },
                store: function(){
                    try{
                        authHeader();
                        console.log(this.form.photo)
                        let formData = new FormData();
                        formData.append('fullname', this.form.fullname);
                        formData.append('address', this.form.address);
                        formData.append('place_of_birth', this.form.place_of_birth);
                        formData.append('date_of_birth', this.form.date_of_birth);
                        formData.append('phone_number', this.form.phone_number);
                        formData.append('photo', this.form.photo);
                        console.log('>> formData >> ', formData);
                        
                        let response = axios.post('/api/profil/', formData).then(response => {
                            console.log(response.status)
                            if (response.status == 201){
                                console.log(response.data)
                                alert("Berhasil Tambah")
                            }
                            //this.$router.push({ name: "home" });
                        });
                    } catch (e){
                        console.log('e.response.data.errors')
                    }
                },
            },

    mounted(){   
                this.getProfile;
            },

    computed: {
        getProfile: function(){
            axios.get('/api/profil/'+this.$route.params.id).then(response => {
                    this.form.fullname = response.data[0].fullname;
                    this.form.address = response.data[0].address;
                    this.form.place_of_birth = response.data[0].place_of_birth;
                    this.form.date_of_birth = response.data[0].date_of_birth;
                    this.form.phone_number = response.data[0].phone_number;
                    this.image = response.data[0].photo;
                })
        },
    }
}
</script>
