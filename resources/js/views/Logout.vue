<template>
  <div v-if="user">
      anda sudah logout : {{userInfo}}
      <br>
      username : {{nama}}
  </div>
</template>

<script>
import authHeader from '../auth-header';

export default {
    data(){
        return{
            userInfo: 'sopoh',
            nama: '',
        }
    },
    methods : {
                logout: function(){
                        authHeader();
                        
                        let response = axios.post('/api/logout').then(response => {
                            if (response.status == 200){
                                localStorage.removeItem('user');
                                console.log('berhasil logout')
                                //this.$router.push({ name: "home" });
                            }
                        });
                        
                },
                user: function(){
                            console.log('masuk');
                            authHeader();
                            axios.get('/api/user').then(response => {      
                            //     //this.userInfo =  response.data.name;
                            this.nama = response.data.name
                            })
                            console.log(this.nama);
                            // return nama;
                },
            },
    mounted() {
        this.logout();
    },
}
</script>