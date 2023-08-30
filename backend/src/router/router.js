import {createRouter, createWebHistory} from "vue-router";
import Home from "../components/Home.vue";
import RequestPassword from "../components/RequestPassword.vue";
import ResetPassword from "../components/ResetPassword.vue";
import Login from "../components/Login.vue";
import AppLayout from "../components/AppLayout.vue";
import Dashboard from "../views/Dashboard.vue";

const routes =[
    {
        path: '/home',
        name: 'home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/request_password',
        name: 'request_password',
        component: RequestPassword
    },
    {
        path: "/reset_password/",
        name: "reset_password",
        component: ResetPassword
    },
    {
        path: '/app',
        name: 'app',
        component: AppLayout,
        children: [
            {
                path: 'dashboard',
                name: 'app.dashboard',
                component: Dashboard
            }
        ]
    },
];



const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router