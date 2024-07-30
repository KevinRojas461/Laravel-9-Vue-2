<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Crear Blog</h4></div>
                <div class="card-body">
                    <!-- -->
                    <!-- no lleva action=" página a la que se envían
                     los datos del formulario" -->

                    <!--
                    al presionar boton "Guardar" se llama al metodo "crear" 
                    del export defaul 
                    -->
                    <form @submit.prevent="crear">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Título</label>
                                    <!--
                                    v-model es para asignar este campo
                                    a titulo

                                    para que lo que se pongo en este campo
                                    sea de titulo

                                    los datos que tenemos que capturar del formulario
                                    para mandarlos al controlador

                                    para guardar los datos que se pongan
                                    en el formulario
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
    name: "crear-blog",
    // data es donde se definen las variables
    data() {
        return {
            // inicializar los campos/variables de blog
            // las variables a las que se le va a asignar
            // los campos del formulario
            blog: {
                titulo: "",
                contenido: "",
            },
        };
    },
    methods: {
        // metodos
        async crear() {
            await this.axios
                // this.blog pasar el objeto con los campos
                // que se pusieron en el el formulario
                // en el cuerpo de la URL

                // enviarle los datos que capturemos en el formulario
                .post("/api/blog", this.blog)
                .then((response) => {
                    // que luego de que se cree el registro
                    // devuelva a la tabla

                    // mostrarBlogs => routes.js
                    this.$router.push({ name: "mostrarBlogs" });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
