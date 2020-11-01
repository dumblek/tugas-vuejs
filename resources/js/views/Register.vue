<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form method="POST" action="#" @submit.prevent="store">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>
                                
                                <div class="col-md-6">
                                    <input id="name" type="text" name="name" v-model="form.name" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" v-model="form.email" required autocomplete="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" name="password" v-model="form.password" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</template>

<script>
export default {
    data () {
        return{
                password_confirmation : '',
                form: {
                    name : '',
                    email : '',
                    password : '',
                }
              }  
            },

    methods : {
                store: function(){
                    //console.log(this.password_confirmation);
                    if(this.password_confirmation !== this.form.password){
                        return alert('password bedo lik');
                    }
                    try{
                        let response = axios.post('/api/register', this.form).then(response => {
                            console.log(response.data)
                            if (response.status == 200){
                                this.form = {
                                    name : '',
                                    email : '',
                                    password : ''
                                };
                                this.password_confirmation = '';
                                this.$router.push({ name: "home" });
                            }
                        });
                    } catch (e){
                        console.log('e.response.data.errors')
                    }
                }
            },
}
</script>
