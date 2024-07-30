<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Editar Blog</h4></div>
                <div class="card-body">
                    <!-- -->
                    <!--
                    al presionar boton "Guardar" se llama al metodo "actualizar" 
                    del export defaul 
                    -->
                    <form @submit.prevent="actualizar">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Título</label>
                                    <!--
                                    v-model="blog.titulo"

                                    para guardar los datos que se pongan
                                    en el formulario

                                    o para

                                    llamar/mostrar a los datos del registro
                                    seleccionado para editar
                                    -->
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="blog.titulo"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-floating">
                                    <textarea
                                        class="form-control"
                                        id="floatingTextarea2"
                                        v-model="blog.contenido"
                                        style="height: 100px"
                                    ></textarea>
                                    <label for="floatingTextarea2"
                                        >Contenido</label
                                    >
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    // para componentes anidados
    name: "editar-blog",
    // data es donde se definen las variables
    data() {
        return {
            // inicializar los campos/variables de blog
            // las variables a las que se le va a asignar
            // los NUEVOS campos del registro
            blog: {
                titulo: "",
                contenido: "",
            },
        };
    },
    // es para que cada vez que se seleccione el registro para editar
    // carge/entre a/la pagina de Editar.vue
    // se ejecute el metodo "mostrarBlog" automaticamente
    mounted() {
        // buscar le registro seleccionado
        this.mostrarBlog();
    },
    // metodos
    methods: {
        async mostrarBlog() {
            // rura URl hacia la api para mostar un registro especifico

            // ${this.$route.params.id}
            // captura el id del registro seleccionado
            // que se envia desde la URL
            // "/editar/:id" => routes.js
            const url = `/api/blog/${this.$route.params.id}`;
            console.log(url); // Verifica la URL generada en consola del navegador
            await this.axios
                // peticion get hacia `/api/blog/${this.$route.params.id}`
                // lo que me lleva al metodo show del controlador
                .get(url)
                .then((response) => {
                    // response.data trae los datos de la respuesta de la API
                    // trae los datos del registro seleccionado

                    // Usamos la "desestructuración de objetos" de JavaScript para
                    // "extraer" titulo y contenido de response.data:

                    // Eso es equivalente a:
                    // const titulo = response.data.titulo;
                    // const contenido = response.data.contenido;

                    // Usamos desestructuración para extraer titulo y contenido de response.data.
                    const { titulo, contenido } = response.data;

                    // Se asignan los valores desestructurados a las propiedades
                    // del objeto blog en el componente

                    // Asignamos estos valores a las propiedades this.blog.titulo
                    // y this.blog.contenido para actualizar el estado del
                    // componente con los datos del blog que se va a editar.

                    // ponerle los datos antiguos al fomulario de editar
                    this.blog.titulo = titulo;
                    this.blog.contenido = contenido;
                    // console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async actualizar() {
            await this.axios
                // PUT|PATCH api/blog/{blog} ...Blog.update

                // ${this.$route.params.id}
                // captura el id del registro seleccionado
                // que se envia desde la URL
                // "/editar/:id"

                // , this.blog mandar los NUEVOS campos del registro
                // por medio del cuerpo de la URL
                .put(`/api/blog/${this.$route.params.id}`, this.blog)
                .then((response) => {
                    // luego de que se actualice el registro
                    // redirige a la tabla con todos los registros
                    this.$router.push({ name: "mostrarBlogs" });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
