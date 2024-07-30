<?php

namespace App\Http\Controllers;

// importar el MODELO
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // getAll (get)
    public function index()
    {
        // metodo all para traer a todos los registros
        // la variable blogs se le asignan todos los registros de la tabla Blog
        $blogs = Blog::all(['id','titulo','contenido']);
        // json pq las peticiones (req) se hacen con axios desde le cliente que es VUE
        // api rest json metodos http (get, put, patch, detete, post)

        // client (vue) nos manda la peticion por medio de la URL 

        // ya no se usa:
        // return view('students.create')

        // le manda a CLIENT la lista con todos los registros (blogs)
        return response()->json($blogs);
    }

    // ir al formulario para crear
    public function create()
    {
        // esto es lo que lleva al formulario pero eso lo vamso a hacer con VUE
    }

    // guardar
    public function store(Request $request)
    {
        // $ para variables y propiedades
        // metodo "create" del controlador Laravel
        // para crear registros en Laravel
        // peticion post

        // $request->post()
        // obtiene todos los datos enviados en la solicitud POST desde el cliente.
        // Esto incluye los datos del "formulario" para crear

        // request->post() trae todo los valores/campos que envia la api
        // client manda el objeto por medio de la api post
        // $request->post() extrae el objeto de la URL
        $blog = Blog::create($request->post());

        // no devuelva una respuesta en formato json
        // le estoy mandando el registro/objeto que se creo
        // en formato json para que la api responda

        // client (vue) nos manda la el objeto por medio del cuerpo de la URL 
        //

        // ya no se usa: 
        // redireccionar hacia la tabla
        // return redirect()->route('students.index');
        return response()->json([
            'blog'=>$blog
        ]);
    }

    // se está utilizando la inyección de modelos de Laravel. Laravel automáticamente
    // resuelve el modelo Blog basado en el parámetro de ruta {Blog}

    // Cuando la ruta contiene el parámetro {blog}, Laravel busca un modelo
    // llamado Blog (el singular y con la primera letra en mayúscula) para
    // inyectarlo automáticamente.

    // Laravel intentará buscar un modelo Blog basado en el parámetro {Blog},
    // pero como el nombre del parámetro es Blog (con mayúscula),
    // Laravel no lo reconocerá correctamente según sus convenciones.

    // mostrar solo un registro
    // public function show($id)
    public function show(Blog $blog)
    {
        // la URL nos manda el blog que quiere ver
        return response()->json($blog);
    }

    // manda al formulario editar pero eso lo hace VUE
    public function edit($id)
    {
        //
    }

    // actualizar
    // CLIENT nos manda el registro blog que quieren actualizar
    // manda todos los NUEVOS datos del registro que selecciono para editar
    // al servidor Laravel

    // Blog $blog trae los datos viejos para luego asignarle los nuevos
    // Blog correspondiente al ID que viene en la URL y lo inyectará automáticamente
    // en el método. Esto te da acceso al registro existente que deseas actualizar.
    public function update(Request $request, Blog $blog)
    {
        // save guardar los nuevos cambios
        
        // $request->post()
        // obtiene todos los datos enviados en la solicitud POST desde el cliente.
        // Esto incluye los NUEVOS datos del "formulario" editar
        // $blog->fill($request->post()->save());
        $blog->fill($request->post())->save();
        //
        return response()->json([
            'blog'=>$blog
        ]);
    }

    // eliminar
    // Blog $blog trae el registro que se quiero borrar
    public function destroy(Blog $blog)
    {
        // y lo borra
        $blog->delete();
        //
        return response()->json([
            'mensaje'=>'¡Registro eliminado correctamente!'
        ]);
    }
}
