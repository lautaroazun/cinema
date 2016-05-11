<?php
namespace Cinema\Http\Controllers;
use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\Http\Controllers\Controller;
use Session;
use Redirect;
use Cinema\User;  //TRAEMOS EL MODELO USER
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $users = User::paginate(5); //guarda en una variable todos los usuarios(los saca del modelo) en forma paginada, despues se renderiza en la vista

        return view('usuario.index',compact('users'));  // le enviamos la informacion a la vista (le enviamos la variable users)
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
          User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']), //encriptamos el pass
           ]);

          //creamos el usuario con los datos que trae el request que almacena los datos de los txts.
         //request es la informacion que nos es lanzada
        //otra forma: User::create([$request->all()])

        return redirect('/usuario')->with('message','usuario almacenado correctamente');
        //redireeccionamos a la vista usuario con un mensaje para esa vista


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =User::find($id);
        return view('usuario.edit',['user'=>$user]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user =User::find($id);
        $user->fill($request->all());  //aqui es importante guardar los atributos igual que los nombres de las clases de html
        $user->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/usuario');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->destroy($id);
        Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/usuario');
    }
}