<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\UrlUser;
use Exception;
use Illuminate\Http\Request;

class UrlCadastroController extends Controller
{
  public function index() 
  {             
    $urls = UrlUser::paginate(10);
    $urls->withPath(route('url-lista'));  
    
    return view('cadastro-url/lista-urls',compact('urls'));
  }

  public function delete(Request $request)
  {
    try {                       
      $url = UrlUser::find($request->id);     
      $url->delete();      
      return response()->json(['success' => true,'msg' => 'Url excluída com sucesso!','dados' => $this->refresh()->render()]);    
    }
    catch(Exception $e){
      return response()->json(['success' => false,'msg' => $e->getMessage()]);  
    }                   
  }

  public function refresh()
  {                    
    $urls = UrlUser::paginate(10);
    $urls->withPath(route('url-lista'));  
                
    return view('cadastro-url/tabela-url',compact('urls'));
  }

  public function salvar(UrlRequest $request) 
  {       
    try {    
      $data = $request->all();
      UrlUser::updateOrCreate(['id' => $request->id],$data);
      return redirect()->route('url-lista')->with('message', 'Rota '.($request->id ? ' alterada ' : ' cadastrada ') . ' com sucesso!'); 
    }
    catch(Exception $e){
      return response()->json(['success' => false,'msg' => $e->getMessage()]);  
    }           
  }

  public function cadastrar(UrlUser $urlUser)
  {       
    return view('cadastro-url/cadastra-urls',compact('urlUser'));           
  }
 
}