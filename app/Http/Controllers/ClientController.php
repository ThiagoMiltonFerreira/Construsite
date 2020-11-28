<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Services\Encrypt;
use App\Services\Messages;
use App\clientes;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class ClientController extends Controller
{
    private $modelClientes;
    public function __construct(clientes $modelClientes){
        $this->modelClientes = $modelClientes;
    }

    public function index()
    {
        return back();
    }

    public function create()
    {
        return back();
    }

    public function store(Request $request, Encrypt $encrypt)
    {
        $this->validate($request,[
            'nome_cliente'=>'required',
            'email_cliente'=>'required',
            'telefone_cliente'=>'required',
            'senha_cliente'=>'required',
            'data_nasc_cliente'=>'required',
         ]);
            
        $request = $request->all();
        $password = $encrypt->GetEncryptPassword($request['senha_cliente']);
        $request['senha_cliente'] = $password;

        try {
            $data = $this->modelClientes->create($request);
            $data = json_decode($data,true);
            $message = Messages::getMessageSucessCad();
            $title = Messages::getTitleAltClient();
        } catch (Exception $e) {
            die(Messages::getMessageErrorCad().$e->getMessage());
        }
        return view('welcome',compact('data','message','title'));
    }

    public function show($id)
    {
        return back();
    }

    public function edit($id)
    {
        return back();
    }

    public function update(Request $request, $id, Encrypt $encrypt)
    {
        $this->validate($request,[
            'nome_cliente'=>'required',
            'email_cliente'=>'required',
            'telefone_cliente'=>'required',
            'data_nasc_cliente'=>'required',
         ]);

         $request = $request->all();
         if($request['senha_cliente'] != null){
            $password = $encrypt->GetEncryptPassword($request['senha_cliente']);
            $request['senha_cliente'] = $password;
         } else {
            unset($request['senha_cliente']);
         }
         unset($request['_token']);
         unset($request['_method']);
         try {
            $data = $this->modelClientes->where('id_cliente','=',$request['id_cliente'])->update($request);
            $data = json_decode($this->modelClientes->where('id_cliente','=',$request['id_cliente'])->get()[0],true);
            $data['id'] = $request['id_cliente'];
            $message = Messages::getMessageSucessUpdate();
            $title = Messages::getTitleAltClient();
        } catch (Exception $e) {
            die(Messages::getMessageErrorUpdate().$e->getMessage());
        }
        return view('welcome',compact('data','message','title'));
    }

    public function destroy($id)
    {
        return back();
    }
}
