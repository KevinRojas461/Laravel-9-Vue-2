// laravel-vue > resources > views > app.blade.php => es el componente principal
// para el lado de Laravel

// app.js es lo que ejecuta/envuelve toda la aplicacion de Laravel
// el laravel y app.blade.php es la pagina pricipal de Laravel

//
// require('./bootstrap');

//
import vue from "vue";
// que puedes acceder a la instancia de Vue desde cualquier parte de tu aplicación
// JavaScript en el navegador, no solo desde los módulos que han importado Vue
// explícitamente.

// Vue en una aplicación Laravel donde se podría necesitar acceso a Vue
// desde scripts externos o en diferentes partes de tu aplicación sin
// necesidad de importar Vue en cada archivo.
window.Vue = vue;

// importamos el componente principal de VUE
// dentro del componente principal de Laravel
// el componente principal de Laravel es lo que ejecuta las cosas de laravel
// el componente principal de VUE es lo que ejecuta las cosas de VUE
import App from "./components/App.vue";

// axios para hacer las peticiones (reqs)
// VueAxios es un adaptador que facilita el uso de axios
import VueAxios from "vue-axios";
import axios from "axios";

// importar y configurar el vue-router
import VueRouter from "vue-router";

// routes son las rutas de cada pagina
import { routes } from "./routes";
//
//import Vue from "vue";
// se utilizan para registrar plugins en Vue.js. Estos plugins amplían
// la funcionalidad de Vue y los hacen disponibles en "toda tu aplicación".

//
Vue.use(VueRouter);
// estás registrando el plugin VueAxios con tu instancia de Vue y pasándole
// la instancia de axios, lo que permite hacer peticiones HTTP de manera fácil
// en tu aplicación Vue.

//
Vue.use(VueAxios, axios);

// para que VUE pueda acceder a todas las rutas que llevas hacia todas las paginas
const router = new VueRouter({
    // utiliza el historial del navegador para manejar la navegación sin recargar
    // la página. Utiliza la API de historial HTML5, eliminando el hash (#)
    // de las URLs, lo que resulta en URLs más limpias y amigables.

    // Configura el enrutador para utilizar el historial del navegador.
    mode: "history",
    // definir las rutas de la aplicación
    routes: routes,
});

//
const app = new Vue({
    // app.blade.php <div id="app">
    // es para que la pagina principal de vue se ejecute dentro de la pagina principal
    // de laravel

    // Esta opción le dice a Vue que monte la instancia de Vue en
    // el elemento HTML con el ID app. En tu archivo Blade (app.blade.php)

    // Monta la aplicación Vue en el elemento con ID app.
    el: "#app",
    // Asocia el enrutador con la instancia de Vue
    router: router,
    // relacionar app.js Laravel y App.vue Vue
    // Renderiza el componente raíz App.

    // Vue utiliza para renderizar tu aplicación.
    // h(App) le dice a Vue que renderice el componente App
    // como el componente raíz de la aplicación. (App.vue)
    render: (h) => h(App),
});
