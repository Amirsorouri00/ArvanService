/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


const files = require.context('./', true, /\.vue$/i)
// console.log("sdfsfdsdfs", files.keys())
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// files.keys().map(key => console.log(key.split('/').pop().split('.')[0], files(key).default))


// console.log(require('./components/KeyGeneratorComponent.vue').default)
// console.log(require('./components/ExampleComponent.vue').default)


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('key-generator-componenet', require('./components/KeyGeneratorComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('button-counter', {
//     data: function () {
//       return {
//         count: 0
//       }
//     },
//     template: '<button v-on:click="count++">You clicked me {{ count }} times.</button>'
// })

const app = new Vue({
	el: "#app",
})

