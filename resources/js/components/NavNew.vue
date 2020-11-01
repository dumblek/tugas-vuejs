<template>
  <div>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
      <a href class="navbar-brand" @click.prevent>bezKoder</a>
      <div class="navbar-nav mr-auto">
        <li class="nav-item">
          <router-link to="/" class="nav-link">
            <font-awesome-icon icon="home" />Home
          </router-link>
        </li>
        <li class="nav-item">
          <router-link v-if="username" to="/user" class="nav-link">User</router-link>
        </li>
      </div>

      <div v-if="!username" class="navbar-nav ml-auto">
        <li class="nav-item">
          <router-link to="/register" class="nav-link">
            <font-awesome-icon icon="user-plus" />Sign Up
          </router-link>
        </li>
        <li class="nav-item">
          <router-link to="/login" class="nav-link">
            <font-awesome-icon icon="sign-in-alt" />Login
          </router-link>
        </li>
      </div>

      <div v-if="username" class="navbar-nav ml-auto">
        <li class="nav-item">
          <router-link to="/profile" class="nav-link">
            <font-awesome-icon icon="user" />
            {{ username }}
          </router-link>
        </li>
        <li class="nav-item">
          <a class="nav-link" href @click.prevent="logout">
            <font-awesome-icon icon="sign-out-alt" />LogOut
          </a>
        </li>
      </div>
    </nav>

    
  </div>
</template>

<script>
import authHeader from '../auth-header';

export default {
    data(){
        return{
            username: '',
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
            },
    mounted() {
        this.currentUser;
    },
    computed: {
        currentUser: function(){
                            console.log('masuk');
                            authHeader();
                            axios.get('/api/user').then(response => {      
                            //     //this.userInfo =  response.data.name;
                            this.username = response.data.name
                            })
                            console.log(this.username);
                            // return nama;
                },
    }
//   computed: {
//     currentUser() {
//       return this.$store.state.auth.user;
//     },
//     showAdminBoard() {
//       if (this.currentUser && this.currentUser.roles) {
//         return this.currentUser.roles.includes('ROLE_ADMIN');
//       }

//       return false;
//     },
//     showModeratorBoard() {
//       if (this.currentUser && this.currentUser.roles) {
//         return this.currentUser.roles.includes('ROLE_MODERATOR');
//       }

//       return false;
//     }
//   },
//   methods: {
//     logOut() {
//       this.$store.dispatch('auth/logout');
//       this.$router.push('/login');
//     }
//   }
};
</script>