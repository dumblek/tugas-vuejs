<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <router-link class="nav-link" exact to="/">Home <span class="sr-only">(current)</span></router-link>
          <router-link class="nav-link" to="/create">Tambah</router-link>
          <router-link class="nav-link" to="/register">Register</router-link>
          <router-link class="nav-link" to="/login">Login</router-link>
          <router-link class="nav-link" to="/logout">Logout</router-link>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  
};
</script>
