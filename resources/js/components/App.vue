<template>
    <!-- 
App.vue es el componente principal para el lado de VUE
donde se crea el footer y el nav bar
-->
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <!-- llamamos al logo de Vue -->
                    <img
                        src="https://www.svgrepo.com/show/419923/blog-blogger-blogging.svg"
                        alt=""
                        width="30"
                        height="24"
                    />
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <!-- -->
                    <!-- links del nav bar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <!-- to="/" lleva a la pagina principal -->
                            <router-link
                                exact-active-class="active"
                                to="/"
                                class="nav-link active"
                                aria-current="page"
                                >Inicio</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <!-- to="/blogs" lleva a tabla con todos los
                            registros de blog


                            
                            -->
                            <router-link
                                exact-active-class="active"
                                to="/blogs"
                                class="nav-link"
                                >Blogs</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <!-- to="/contacto" lleva a la pagina de contacto
                            con la info de contacto

                            exact-active-class="active" es para que cuando ete
                            en la pagina de contacto el boton de contacto
                            en el nav bar  resalte
                            -->
                            <router-link
                                exact-active-class="active"
                                to="/contacto"
                                class="nav-link"
                                >Contacto</router-link
                            >
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input
                            class="form-control me-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                        />
                        <button class="btn btn-outline-success" type="submit">
                            Search
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- -->
        <!-- Vue sabe que aca tiene que mostar las vistas
        "llevar a las vistas"
         router-view llamar a las rutas hacia todas las paginas (router.js)
         -->
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>
<script>
// Permite definir y exportar un objeto que contiene las opciones del componente,
// como datos, métodos, propiedades computadas, hooks
export default {};
</script>
