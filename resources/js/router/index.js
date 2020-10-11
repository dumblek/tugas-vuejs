import Create from "../views/Create"
import Home from "../views/Home"
import Edit from "../views/Edit"

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
    ]
}