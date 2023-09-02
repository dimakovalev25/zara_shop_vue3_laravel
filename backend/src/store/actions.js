// import axiosClient from "../axios.js";
import axios from "axios";
const axiosClient = axios.create({
    baseURL: `http://localhost:8000/api`
})

export function getUser({commit}, data) {
    return axiosClient.get('/user', data)
        .then(({data}) => {
            commit('setUser', data.user);
            return data;
        })
}
export function login({commit}, data) {
    return axiosClient.post('/login', data)
        .then(({data}) => {
            commit('setUser', data.user);
            commit('setToken', data.token)
            return data;
        })
}
export function logout({commit}) {
    return axiosClient.post('/logout')
        .then((response) => {
            commit('setToken', null)
            return response;
        })
}

/* old variant
export function getProducts({commit, state}, {url = null, search, perPage}) {
    commit('setProducts', [true])
    url = url || '/products'
    return axiosClient.get(url, {
        params: {search,per_page: perPage}
    })
        .then((response) => {
            commit('setProducts', [false, response.data])
        })
        .catch(() => {
            commit('setProducts', [false])
        })
}

export function getProducts({commit, state}, {url = null, search, per_page, sort_field, sort_direction}) {
    commit('setProducts', [true])
    url = url || '/products'
    const params = {
        per_page: state.products.limit,
    }
    return axiosClient.get(url, {
        params: {
            ...params,
            search, per_page, sort_field, sort_direction
        }
    })
        .then((response) => {
            commit('setProducts', [false, response.data])
            commit('setProducts', [false])
        })
}
export function  createProduct({commit}, product) {
    return axiosClient.post('/products', product)
}*/

export function getProducts({commit, state}, {url = null, search = '', per_page, sort_field, sort_direction} = {}) {
    commit('setProducts', [true])
    url = url || '/products'
    const params = {
        per_page: state.products.limit,
    }
    return axiosClient.get(url, {
        params: {
            ...params,
            search, per_page, sort_field, sort_direction
        }
    })
        .then((response) => {
            commit('setProducts', [false, response.data])
        })
        .catch(() => {
            commit('setProducts', [false])
        })
}
export function  createProduct({commit}, product) {

    if (product.image instanceof File) {
        const form = new FormData();
        form.append('title', product.title);
        form.append('image', product.image);
        form.append('description', product.description);
        form.append('price', product.price);
        product = form;
    }
    return axiosClient.post('/products', product)
}

export function deleteProduct({commit}, id) {
    axiosClient.delete(`/products/${id}`)
}