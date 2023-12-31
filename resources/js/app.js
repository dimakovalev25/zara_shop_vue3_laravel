import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import {get, post} from "./http.js";


Alpine.plugin(collapse)
window.Alpine = Alpine;

import {
    Carousel,
    initTE,
} from "tw-elements";

initTE({ Carousel });


document.addEventListener("alpine:init", async () => {

    Alpine.data("toast", () => ({
        visible: false,
        delay: 5000,
        percent: 0,
        interval: null,
        timeout: null,
        message: null,
        close() {
            this.visible = false;
            clearInterval(this.interval);
        },
        show(message) {
            this.visible = true;
            this.message = message;

            if (this.interval) {
                clearInterval(this.interval);
                this.interval = null;
            }
            if (this.timeout) {
                clearTimeout(this.timeout);
                this.timeout = null;
            }

            this.timeout = setTimeout(() => {
                this.visible = false;
                this.timeout = null;
            }, this.delay);
            const startDate = Date.now();
            const futureDate = Date.now() + this.delay;
            this.interval = setInterval(() => {
                const date = Date.now();
                this.percent = ((date - startDate) * 100) / (futureDate - startDate);
                if (this.percent >= 100) {
                    clearInterval(this.interval);
                    this.interval = null;
                }
            }, 30);
        },
    }));

    Alpine.store('darkMode', {
        on: false,
        toggleDarkMode() {
            this.on = !this.on
        }

    });


    Alpine.data("productItem", (product) => {
        return {
            product,
            approveUrl: '',

            locale: '',

            getLocale() {
                return axios.get('/get-session-data')
                    .then(response => {
                        const sessionData = response.data;
                        this.locale = sessionData.locale;
                        return this.locale;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            },

            addToCart(quantity = 1) {

                post(this.product.addToCartUrl, {quantity})
                    .then(result => {
                        this.$dispatch('cart-change', {count: result.count})
                        this.getLocale()
                            .then(res => {
                                if (this.locale === 'en'){
                                    this.$dispatch("notify", {
                                        message: "The item was added into the cart!",
                                    });
                                } else  {
                                    this.$dispatch("notify", {
                                        message: "Позиция добавлена в корзину!",
                                    });
                                }}
                            )
                            .catch(err => {
                                console.log(err)
                            })
                    })
                    .catch(response => {

                    })
            },

            removeAllItemsFromCart() {
                axios.delete('/remove-all-items-from-cart')
                    .then(response => {
                        this.cartItems = [];
                        this.$dispatch('cart-change', { count: 0 });
                        this.getLocale().then(res => {
                                if (this.locale === 'en') {
                                    this.$dispatch("notify", {
                                        message: "Your application has been sent, wait for a call from the manager",
                                    });
                                } else {
                                    this.$dispatch("notify", {
                                        message: "Ваша заявка   отправлена, ожидайте звонка менеджера!",
                                    });
                                }
                            }

                        );
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            async removeAllItemsFromCartAndSubmit() {
                try {
                    await axios.delete('/remove-all-items-from-cart')

                    this.cartItems = [];
                    this.$dispatch('cart-change', { count: 0 });
                    console.log('cart change!')

                    await this.getLocale().then(res => {
                        if (this.locale === 'en') {
                            this.$dispatch("notify", {
                                message: "Your application has been sent, wait for a call from the manager",
                            });
                        } else {
                            this.$dispatch("notify", {
                                message: "Ваша заявка отправлена, ожидайте звонка менеджера!",
                            });
                        }
                    });
                    setTimeout(() => {
                        this.approveUrl = this.$el.getAttribute('data-approve-url');
                        // window.location.href = this.approveUrl;
                        window.location.href = '/';

                    }, 1200);


                } catch (error) {
                    console.log(error);
                }
            },


            removeItemFromCart() {
                post(this.product.removeUrl)
                    .then(result => {
                        console.log("Removed item from cart. New count:", result.count);
                        this.$dispatch('cart-change', { count: result.count });
                        this.cartItems = this.cartItems.filter(p => p.id !== this.product.id);
                        this.getLocale()
                            .then(res => {
                                console.log("Locale:", this.locale);
                                if (this.locale === 'en'){
                                    this.$dispatch("notify", {
                                        message: "The item was removed from cart",
                                    });
                                } else  {
                                    this.$dispatch("notify", {
                                        message: "Позиция была удалена из корзины!",
                                    });
                                }
                            })
                            .catch(err => {
                                console.log(err);
                            });
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            changeQuantity() {
                post(this.product.updateQuantityUrl, {quantity: product.quantity})
                    .then(result => {
                        this.$dispatch('cart-change', {count: result.count})
                        this.getLocale()
                            .then(res => {
                                if (this.locale === 'en'){
                                    this.$dispatch("notify", {
                                        message: "The item quantity was updated",
                                    });
                                } else  {
                                    this.$dispatch("notify", {
                                        message: "Количество было изменено!",
                                    });
                                }}
                            )
                            .catch(err => {
                                console.log(err)
                            })

                    })
            },


        };
    });

});

Alpine.start();
