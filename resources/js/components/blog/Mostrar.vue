<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <!-- router-link es un  botton (<a />)
            que lleva al formulario de crear

            name: 'crearBlog', => routes.js
            envia al componente Crear.vue

            fas fa-plus-circle el (+)
            -->
            <router-link :to="{ name: 'crearBlog' }" class="btn btn-success"
                ><i class="fas fa-plus-circle"></i
            ></router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Contenido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--
                        v-for="blog in "blogs"" :key="blog.id"

                        return response()->json($"blogs"); de BlogController
                        y el BlogController se trae desde "export default"

                        key="blog.id" cada registro tiene su llave que es el id del
                        registro
                        -->
                        <tr v-for="blog in blogs" :key="blog.id">
                            <td>{{ blog.id }}</td>
                            <td>{{ blog.titulo }}</td>
                            <td>{{ blog.contenido }}</td>
                            <td>
                                <!-- llamamos al componente para Editar     -->
                                <!-- router-link es un  botton (<a />)
                                que lleva al formulario de editar

                                name: 'editarBlogs', => routes.js
                                envia al componente Editar.vue

                                params: { id: blog.id },
                                pasarle el id a al editarBlog(Editar.vue) para que
                                me muestre solo los datos del registro seleccionado 
                                para editar en el fromulario de editar
                                -->
                                <router-link
                                    :to="{
                                        name: 'editarBlog',
                                        params: { id: blog.id },
                                    }"
                                    class="btn btn-info"
                                    ><i class="fas fa-edit"></i
                                ></router-link>
                                <!--
                                borrrar

                                @click="borrarBlog(blog.id)"
                                no me envia a ninguna pagina como "router-link"
                                pero se llama el metodo borrarBlog "export default"
                                y en borrarBlog se va a hacer la peticion delete
                                y va a llamar al metodo distroy del controlador

                                se le pasa el id del registro que se selcciono
                                para eliminar "blog.id" para que el metodo 
                                destroy/borrarBlog sepa que registro eliminar
                                -->
                                <a
                                    type="button"
                                    @click="borrarBlog(blog.id)"
                                    class="btn btn-danger"
                                    ><i class="fas fa-trash"></i
                                ></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
// aqui es donde se le hacen las peticiones a la api/servidor/URL
export default {
    // identificar el componente en las herramientas de desarrollo de Vue.
    // le estoy dando un indetificador a esta pagina

    // En Vue.js, un componente es una unidad de código que encapsula
    // su propio template, script y estilo. Al definir el nombre
    // del componente (name: "blogs") es un .vue con script

    // rutas nombradas
    // path: '/blogs',
    // name: 'Blogs',
    // component: () => import('./components/Blogs.vue')

    // En algunos casos, cuando un componente se utiliza dentro de sí mismo (recursión)
    // o cuando se referencia "UN COMPONENTE DENTRO DE OTRO" en un árbol de componentes
    // anidados, el nombre ayuda a identificar y utilizar correctamente el componente.

    // name: "blogs" no es obligatorio para que tu componente funcione,
    // proporciona claridad, mejora la depuración y puede ser útil en
    // escenarios más avanzados como enrutamiento y recursión.
    name: "blogs",
    // la lista blogs es donde se va guardar los registros que me
    // traiga la api/servidor

    // data es donde se definen las variables
    data() {
        return {
            blogs: [],
        };
    },
    // created/mounted
    mounted() {
        // se llama al método mostrarBlogs para cargar los blogs desde el
        // servidor cuando el componente se monta.

        // mostrarBlogs es un metodo que llama al metodo index
        // aqui lo estamos llamando
        // lo llamamos apenas arranque/ejecute VUE/ la "pagina"
        this.mostrarBlogs();
    },
    // metodos
    methods: {
        // aqui lo estamos creando
        async mostrarBlogs() {
            await this.axios
                // la ruta /api/blog con GET hace referencia a index del controlador
                .get("/api/blog")
                .then((response) => {
                    // response.data son los registros de la db
                    // el metodo index devuelve los registros

                    // this.blogs es la lista que va aguardar los registros
                    // que devuelve la api
                    this.blogs = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    // si hay error al hacer la peticion
                    // que se mantenga vacio la lista
                    this.blogs = [];
                });
        },
        borrarBlog(id) {
            // muestra una ventana de confirmación para eliminar un registro.
            // Si el usuario confirma, se hace una petición DELETE
            if (confirm("¿Confirma eliminar el registro?")) {
                this.axios
                    // la rutaa /api/blog/${id} con delete hace refencia
                    // a destroy del controlador
                    .delete(`/api/blog/${id}`)
                    .then((response) => {
                        // actualizar la tabla luego de borrar un registro
                        this.mostrarBlogs();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
