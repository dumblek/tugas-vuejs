import Create from "../views/Create"
import Home from "../views/Home"
import Edit from "../views/Edit"
import Register from "../views/Register"
import Login from "../views/Login"
import Logout from "../views/Logout"
import Profile from "../views/Profile"

export default{
    mode: "history",
    
    linkActiveClass: "active",

    routes: [
        {
            path: '/',
            name: "home",
            component: Home
        },
        {
            path: "/create",
            name: "create",
            component: Create
        },
        {
            path: "/edit",
            name: "edit",
            component: Edit
        },
        {
            path: "/register",
            name: "register",
            component: Register
        },
        {
            path: "/login",
            name: "login",
            component: Login
        },
        {
            path: "/logout",
            name: "logout",
            component: Logout
        },
        {
            path: "/profile",
            name: "profile",
            component: Profile
        },
    ]
}