export default {
    test: 'test',
    user: {
        token: sessionStorage.getItem('TOKEN'),
        // token: 123,
        data: {},
    },
    products: {
        loading: false,
        data: [],
        links: [],
        from: null,
        to: null,
        page: 1,
        limit: null,
        total: null
    }
}