// donde se importan los componentes generales de VUE
const Home = () => import("./components/Home.vue");
const Contacto = () => import("./components/Contacto.vue");

// importar los componentes para la ruta /blog
const Mostrar = () => import("./components/blog/Mostrar.vue");
const Crear = () => import("./components/blog/Crear.vue");
const Editar = () => import("./components/blog/Editar.vue");

// export pq lo vamos a exportar y lo vamos a usar desde otro archivo
export const routes = [
    {
        name: "home",
        // la ruta de home
        // el path es la raiz
        path: "/",
        // y el componente/pagina  que se abre en esa ruta
        component: Home,
    },
    {
        // nombre del componente para leugo llamarlo desde otro archivo
        name: "contacto",
        // la ruta de contacto
        path: "/contacto",
        // y el componente/pagina  que se abre en esa ruta
        component: Contacto,
    },
    {
        // nombre del componente para leugo llamarlo desde otro archivo
        name: "mostrarBlogs",
        // la ruta de mostrar / la tabla con los regsitros de blogs
        path: "/blogs",
        // y el componente/pagina que se abre en esa ruta
        component: Mostrar,
    },
    {
        // nombre del componente para leugo llamarlo desde otro archivo
        name: "crearBlog",
        // la ruta de crear / ruta del formulario para crear
        path: "/crear",
        // y el componente/pagina  que se abre en esa ruta
        component: Crear,
    },
    {
        // nombre del componente para leugo llamarlo desde otro
        // archivo (vista Mostrar.vue)
        name: "editarBlog",
        // la ruta de editar / ruta del formulario para editar
        // hay que pasarle el id al servidor para que me traiga los datos
        // del registro que se selecciono para editar
        path: "/editar/:id",
        // y el componente que se abre en esa ruta
        component: Editar,
    },
];
