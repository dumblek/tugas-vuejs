export default function authHeader() {
    let user = localStorage.getItem('user')
    
    if (user) {
            axios.defaults.headers.common["Authorization"] = "Bearer " + user;
    } else {
      return {};
    }
  }