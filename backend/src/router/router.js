import {createRouter, createWebHistory} from "vue-router";
import Home from "../components/Home.vue";
import RequestPassword from "../components/RequestPassword.vue";
import ResetPassword from "../components/ResetPassword.vue";
import Login from "../components/Login.vue";
import AppLayout from "../components/AppLayout.vue";
import Dashboard from "../views/Dashboard.vue";
import Products from "../components/Products.vue";
// import Categories from "../components/Categories.vue";
import Orders from "../components/Orders.vue";
import Users from "../components/Users.vue";
import Customers from "../components/Customers.vue";
import Reports from "../components/Reports.vue";
import store from "../store/store.js";
import NotFound from "../components/NotFound.vue";
import Get from "../components/Get.vue";
import Logout from "../components/Logout.vue";
import Categories from "../views/Categories/Categories.vue";


const routes =[
    {
        path: '/',
        redirect: '/app'
    },

    {
        path: '/get',
        name: 'get',
        component: Get
    },
    {
        path: '/logout',
        name: 'logout',
        component: Logout
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            requiresGuest: true
        }
    },
    {
        path: '/request_password',
        name: 'request_password',
        component: RequestPassword,
        meta: {
            requiresGuest: true
        }
    },
    {
        path: "/reset_password/",
        name: "reset_password",
        component: ResetPassword,
        meta: {
            requiresGuest: true
        }
    },
    {
        path: '/app',
        name: 'app',
        component: AppLayout,
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: 'products',
                name: 'app.products',
                component: Products
            },
            {
                path: 'dashboard',
                name: 'app.dashboard',
                component: Dashboard
            },
            {
                path: 'categories',
                name: 'app.categories',
                component: Categories
            },
            {
                path: 'orders',
                name: 'app.orders',
                component: Orders
            },
            {
                path: 'users',
                name: 'app.users',
                component: Users
            },
            {
                path: 'customers',
                name: 'app.customers',
                component: Customers
            },
            {
                path: 'reports',
                name: 'app.reports',
                component: Reports
            }
        ]
    },

    {
        path: '/:pathMatch(.*)',
        name: 'notfound',
        component: NotFound,
    }
];



const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !store.state.user.token) {
        next({name: 'login'})
    } else if (to.meta.requiresGuest && store.state.user.token) {
        next({name: 'app.dashboard'})
    } else {
        next();
    }
})

export default router