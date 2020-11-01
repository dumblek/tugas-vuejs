<template>
  <div>
      anda sudah logout
  </div>
</template>

<script>
import authHeader from '../auth-header';

export default {
    data(){
        return{
            token: localStorage.getItem('user'),
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
                        
                }
            },
    mounted(){
        //console.log(`Bearer ${this.token}`);
        this.logout();
    },
}
</script>