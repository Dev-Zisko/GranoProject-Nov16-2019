<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ExpenseRequest;
use App\Http\Requests\BillRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\User;
use App\Category;
use App\Expense;
use App\Bill;
use App\Detail;
use Exception;

class PageController extends Controller
{
    //**************************************************************************
    //CONTROLADORA PARA LAS VISTAS
    //**************************************************************************
    public function view_index(){
        try{
            return view('grano');
        }catch(Exception $ex){
            $mensaje = "Error inesperado. Asegurese de tener conexión a internet e intente nuevamente.";
            return view('error');
        } 
    }

    public function view_error(){
        $mensaje = "Error inesperado. Asegurese de tener conexión a internet e intente nuevamente.";
        return view('error', compact('mensaje'));
    }

    public function view_login(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $users = \DB::table('users')->orderBy('apartamento', 'ASC')->paginate(30);
                $bills = \DB::table('bills')->orderBy('año', 'DESC')->orderBy('mes', 'DESC')->paginate(30);
                return view('dashboard', compact('bills', 'users'));
            }
            else if($rol == "User"){
                $iduser = Auth::user()->id;
                $bills = \DB::table('bills')->where('id_user', $iduser)->orderBy('año','DESC')->orderBy('mes', 'DESC')->paginate(30);
                return view('principal', compact('bills'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_pago($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                return view('pago', compact('bill'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_pagou($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                return view('pagou', compact('bill'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_pagoa($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                return view('pago', compact('bill'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_pagoau($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                return view('pagou', compact('bill'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_perfil(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                return view('perfil');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_categorias(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $categories = \DB::table('categories')->paginate(30);
                return view('categorias', compact('categories'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_categoriasr(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                return view('categoriasr');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_categoriasu($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $category = Category::find($newid);
                return view('categoriasu', compact('category'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_categoriasd($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $category = Category::find($newid);
                return view('categoriasd', compact('category'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_gastos(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $categories = \DB::table('categories')->paginate(30);
                $expenses = \DB::table('expenses')->paginate(30);
                return view('gastos', compact('categories', 'expenses'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_gastosr(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $categories = Category::All();
                return view('gastosr', compact('categories'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_gastosu($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $expense = Expense::find($newid);
                $categories = Category::All();
                return view('gastosu', compact('expense', 'categories'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_gastosd($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $expense = Expense::find($newid);
                $categories = Category::All();
                return view('gastosd', compact('expense', 'categories'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_facturas(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $bills = \DB::table('bills')->orderBy('año', 'DESC')->orderBy('mes', 'DESC')->paginate(30);
                $users = \DB::table('users')->orderBy('apartamento','ASC')->get();
                return view('facturas', compact('bills', 'users'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_facturasr(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $expenses = Expense::All();
                return view('facturasr', compact('expenses'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_facturasd(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $billsmes = \DB::table('bills')->select('mes')->get();
                $meses = $billsmes->unique();
                $billsaño = \DB::table('bills')->select('año')->get();
                $años = $billsaño->unique();
                return view('facturasd', compact('meses', 'años'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }


    public function view_usuarios(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $users = \DB::table('users')->orderBy('apartamento', 'ASC')->paginate(30);
                return view('usuarios', compact('users'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_usuariosr(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                return view('usuariosr');
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_usuariosu($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $user = User::find($newid);
                return view('usuariosu', compact('user'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_usuariosd($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $user = User::find($newid);
                return view('usuariosd', compact('user'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_confirmar($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $bill = Bill::find($newid);
                $user = User::find($bill->id_user);
                return view('confirmar', compact('bill', 'user'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    public function view_facturasa(){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $iduser = Auth::user()->id;
                $bills = \DB::table('bills')->where('id_user', $iduser)->orderBy('año','DESC')->orderBy('mes', 'DESC')->paginate(30);
                return view('facturasa', compact('bills'));
            }
            else{
                return view('grano');
            }
        }catch(Exception $ex){
            $mensaje = "Recuerde iniciar sesión para poder entrar en su respectiva cuenta y realizar las acciones.";
            return view('error', compact('mensaje'));
        } 
    }

    //**************************************************************************
    //CONTROLADORA PARA LAS USUARIOS
    //**************************************************************************
    public function edit_perfil(UserRequest $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                $iduser = Auth::user()->id;
                \DB::table('users')->where('id', $iduser)->update(['cedula'=>$request->cedula]);
                \DB::table('users')->where('id', $iduser)->update(['nombre'=>$request->nombre]);
                \DB::table('users')->where('id', $iduser)->update(['apellido'=>$request->apellido]);
                \DB::table('users')->where('id', $iduser)->update(['telefono'=>$request->telefono]);
                \DB::table('users')->where('id', $iduser)->update(['email'=>$request->email]);
                \DB::table('users')->where('id', $iduser)->update(['piso'=>$request->piso]);
                \DB::table('users')->where('id', $iduser)->update(['apartamento'=>$request->apartamento]);
                if($request->password != "" || $request->password != null){
                    \DB::table('users')->where('id', $iduser)->update(['password'=>Hash::make($request->password)]);  
                }
                return redirect('main');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar sus datos del perfil correctamente en el formulario. Puede que algún campo único como la cédula o el correo ya esten en uso.";
            return view('error', compact('mensaje'));
        }   
    }

    public function register_usuario(UserRequest $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $user = new User;
                $user->cedula = $request->cedula;
                $user->nombre = $request->nombre;
                $user->apellido = $request->apellido;
                $user->telefono = $request->telefono;
                $user->email = $request->email;
                $user->piso = $request->piso;
                $user->apartamento = $request->apartamento;
                $user->alicuota = $request->alicuota;
                $user->rol = $request->rol;
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect('usuarios');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del usuario correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function update_usuario(UserRequest $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('users')->where('id', $newid)->update(['cedula'=>$request->cedula]);
                \DB::table('users')->where('id', $newid)->update(['nombre'=>$request->nombre]);
                \DB::table('users')->where('id', $newid)->update(['apellido'=>$request->apellido]);
                \DB::table('users')->where('id', $newid)->update(['telefono'=>$request->telefono]);
                \DB::table('users')->where('id', $newid)->update(['email'=>$request->email]);
                \DB::table('users')->where('id', $newid)->update(['piso'=>$request->piso]);
                \DB::table('users')->where('id', $newid)->update(['apartamento'=>$request->apartamento]);
                \DB::table('users')->where('id', $newid)->update(['alicuota'=>$request->alicuota]);
                \DB::table('users')->where('id', $newid)->update(['rol'=>$request->rol]);
                if($request->password != "" || $request->password != null){
                    \DB::table('users')->where('id', $newid)->update(['password'=>Hash::make($request->password)]);  
                }
                return redirect('usuarios');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del perfil correctamente en el formulario. Puede que algún campo único como la cédula o el correo ya esten en uso.";
            return view('error', compact('mensaje'));
        }   
    }

    public function delete_usuario($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('details')->where('id_user', $newid)->delete();
                \DB::table('bills')->where('id_user', $newid)->delete();
                \DB::table('users')->where('id', $newid)->delete();
                return redirect('usuarios');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Error al eliminar el usuario.";
            return view('error', compact('mensaje'));
        }  
    }
    //**************************************************************************
    //CONTROLADORA PARA LAS CATEGORIAS
    //**************************************************************************
    public function register_categoria(CategoryRequest $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $category = new Category;
                $category->nombre = $request->nombre;
                $category->save();
                return redirect('categorias');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos de la categoría correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function update_categoria(CategoryRequest $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('categories')->where('id', $newid)->update(['nombre'=>$request->nombre]);
                return redirect('categorias');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos de la categoría correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function delete_categoria($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                $expenses = \DB::table('expenses')->where('id_category', $newid)->get();
                if(count($expenses) == 0){
                    \DB::table('categories')->where('id', $newid)->delete();
                    return redirect('categorias');
                }
                else{
                    $mensaje = "Error al eliminar la categoría. Existen gastos asociados, elimine esos gastos e intente nuevamente.";
                    return view('error', compact('mensaje'));
                }
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Error al eliminar la categoría.";
            return view('error', compact('mensaje'));
        }  
    }
    //**************************************************************************
    //CONTROLADORA PARA LOS GASTOS
    //**************************************************************************
    public function register_gasto(ExpenseRequest $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $expense = new Expense;
                $expense->nombre = $request->nombre;
                $expense->monto = $request->monto;
                $expense->id_category = $request->categoria;
                $expense->save();
                return redirect('gastos');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos de la categoría correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function update_gasto(ExpenseRequest $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('expenses')->where('id', $newid)->update(['nombre'=>$request->nombre]);
                \DB::table('expenses')->where('id', $newid)->update(['monto'=>$request->monto]);
                \DB::table('expenses')->where('id', $newid)->update(['id_category'=>$request->categoria]);
                return redirect('gastos');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del gasto correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function delete_gasto($id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('expenses')->where('id', $newid)->delete();
                return redirect('gastos');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Error al eliminar el gasto.";
            return view('error', compact('mensaje'));
        }  
    }
    //**************************************************************************
    //CONTROLADORA PARA LAS FACTURAS
    //**************************************************************************
    public function register_factura(BillRequest $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $idgastos = $request->gastos;
                $montototal = 0;
                $categories = Category::All();
                $expenses = collect();
                foreach($idgastos as $id){
                   $expense = Expense::find($id);
                   $expenses->push($expense);
                }
                foreach($expenses as $expense){
                    $montototal = $montototal + $expense->monto;
                }
                $users = User::All();
                foreach ($users as $user) {
                   $fecha = explode("-", $request->fechavencimiento);
                    $bill = new Bill;
                    $bill->mes = $request->mes;
                    $bill->año = $request->año;
                    $bill->monto = round($montototal * ($user->alicuota/100), 2);
                    $bill->total = round($montototal, 2);
                    $bill->fechavencimiento = $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0];
                    $bill->estado = "Sin Pagar";
                    $bill->id_user = $user->id;
                    $bill->save();
                    $ultima = Bill::All()->last();
                    foreach($expenses as $expense){
                        $detail = new Detail;
                        $detail->gasto = $expense->nombre;
                        $detail->monto = $expense->monto;
                        $detail->id_bill = $ultima->id;
                        foreach ($categories as $category) {
                            if($expense->id_category == $category->id){
                                $detail->categoria = $category->nombre;
                            }
                        }
                        $detail->save(); 
                    } 
                }
                return redirect('facturas');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos de la factura correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function delete_facturas(Request $request){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $bills = \DB::table('bills')->where('mes', $request->mes)->where('año', $request->año)->get();
                if(count($bills) == 0){
                    $mensaje = "Error al eliminar la factura. El mes y año no coincide con ninguna factura registrada.";
                    return view('error', compact('mensaje'));
                }
                else{
                    foreach ($bills as $bill) {
                        \DB::table('details')->where('id_bill', $bill->id)->delete();
                    }
                    \DB::table('bills')->where('mes', $request->mes)->where('año', $request->año)->delete();
                    return redirect('facturas'); 
                } 
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Error al eliminar la factura.";
            return view('error', compact('mensaje'));
        }  
    }

    //**************************************************************************
    //CONTROLADORA PARA LOS PAGOS
    //**************************************************************************
    public function register_pago(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                $newid = Crypt::decrypt($id);
                \DB::table('bills')->where('id', $newid)->update(['transferencia'=>$request->transferencia]);
                \DB::table('bills')->where('id', $newid)->update(['estado'=>"Procesando"]);
                return redirect('main');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del pago correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function register_pagou(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "User"){
                $newid = Crypt::decrypt($id);
                \DB::table('bills')->where('id', $newid)->update(['transferencia'=>$request->transferencia]);
                \DB::table('bills')->where('id', $newid)->update(['estado'=>"Procesando"]);
                return redirect('main');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del pago correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function register_pagoa(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('bills')->where('id', $newid)->update(['transferencia'=>$request->transferencia]);
                \DB::table('bills')->where('id', $newid)->update(['estado'=>"Procesando"]);
                return redirect('facturasa');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del pago correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function register_pagoau(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                \DB::table('bills')->where('id', $newid)->update(['transferencia'=>$request->transferencia]);
                \DB::table('bills')->where('id', $newid)->update(['estado'=>"Procesando"]);
                return redirect('facturasa');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del pago correctamente.";
            return view('error', compact('mensaje'));
        }  
    }

    public function update_estado(Request $request, $id){
        try{
            $rol = Auth::user()->rol;
            if($rol == "Admin"){
                $newid = Crypt::decrypt($id);
                if($request->estado == "Sin Pagar"){
                    \DB::table('bills')->where('id', $newid)->update(['transferencia'=>null]);
                    \DB::table('bills')->where('id', $newid)->update(['estado'=>"Sin Pagar"]); 
                }
                else if($request->estado == "Procesando"){
                    \DB::table('bills')->where('id', $newid)->update(['estado'=>"Procesando"]); 
                }
                else if($request->estado == "Pagada"){
                    \DB::table('bills')->where('id', $newid)->update(['estado'=>"Pagada"]); 
                }
                return redirect('main');
            }
            else{
                return view('grano');
            }  
        }catch(Exception $ex){
            $mensaje = "Asegurese de colocar los datos del pago correctamente.";
            return view('error', compact('mensaje'));
        }  
    }
    //**************************************************************************
    //CONTROLADORA PARA LOS PDFS
    //**************************************************************************
    public function generate_pdf($id) 
    {
        $newid = Crypt::decrypt($id);
        $bill = Bill::find($newid);
        $details = \DB::table('details')->where('id_bill', $newid)->orderBy('categoria', 'ASC')->get();
        $view =  \View::make('factura', compact('bill', 'details'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('factura');
    }

}
