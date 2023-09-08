/*module.exports = {
    // options...
    devServer: {
        proxy: 'http://localhost:8000/api/posts',
    }
}*/


module.exports = {
    devServer: {
        proxy: {
            '^/posts': {
                target: 'http://localhost:8000/api',
                ws: true,
                changeOrigin: true
            },
        }
    }
}