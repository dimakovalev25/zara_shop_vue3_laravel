import axiosClient from "../axios.js";

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


//products

export  function getCategoryName(categoryId) {
    return axiosClient.get(`/api/categories/${categoryId}`)
        .then(response => {
            console.log(response.data.name);
        })
        .catch(error => {
            console.error(error);
        });
}
export function getProduct({commit}, id) {
    return axiosClient.get(`/products/${id}`)
}

export function getProducts({commit, state}, {url = null, search, perPage}) {
    commit('setProducts', [true])
    url = url || '/products'
    return axiosClient.get(url, {
        params: {search, per_page: perPage}
    })
        .then((response) => {
            commit('setProducts', [false, response.data])
        })
        .catch(() => {
            commit('setProducts', [false])
        })
}
export function createProduct({commit}, product) {

    if (product.image instanceof File) {
        const form = new FormData();
        form.append('title', product.title);
        form.append('image', product.image);
        form.append('description', product.description);
        form.append('price', product.price);
        form.append('category_id', product.category_id);
        product = form;
    }
    return axiosClient.post('/products', product)
}
export function updateProduct({commit}, product) {
    const id = product.id
    if (product.image instanceof File) {
        const form = new FormData();
        form.append('id', product.id);
        form.append('title', product.title);
        form.append('image', product.image);
        form.append('description', product.description);
        form.append('price', product.price);
        form.append('_method', 'PUT');
        product = form;
    }
    return axiosClient.post(`/products/${id}`, product)
}
export function deleteProduct({commit}, id) {
    axiosClient.delete(`/products/${id}`)
}

//categories
export function getCategory({commit}, id) {
    return axiosClient.get(`/categories/${id}`)
}

export function getCategories({commit, state}, {}) {
    commit('setCategories', [true])
    return axiosClient.get('/categories', {})
        .then((response) => {
            commit('setCategories', [false, response.data])
        })
        .catch(() => {
            commit('setCategories', [false])
        })
}

export function createCategory({commit}, category) {
    return axiosClient.post('/categories', category)
}
export function updateCategory({commit}, category) {
    return axiosClient.put(`/categories/${category.id}`, category)
}
export function deleteCategory({commit}, category) {
    axiosClient.delete(`/categories/${category.id}`)
}