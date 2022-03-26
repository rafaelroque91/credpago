<?php

namespace App\Http\Controllers;

use App\Models\UrlMonitoraUser;


class UrlMonitoraController extends Controller
{

  function getRegistros($url_id)
  {
    if (empty($url_id)){
      $monitora = UrlMonitoraUser::paginate(10);     
    } 
    else {
      $monitora = UrlMonitoraUser::where('url_id',$url_id)->paginate(10);      
    } 

    $monitora->withPath(url('url-monitora/lista'.(!empty($url_id) ? '/'.$url_id: '')));  

    return $monitora;
  }

  public function index($url_id = null)   
  {        
    $monitora = $this->getRegistros($url_id);
          
    return view('monitora-url/lista-urls',['monitora' => $monitora, 'url_id' => $url_id]);
  }

  public function refresh($url_id = null)   
  {                
    $monitora = $this->getRegistros($url_id);

    return view('monitora-url/tabela-url',compact('monitora'));
  }

  public function detalhes(UrlMonitoraUser $urlmonitora)
  {
    return urldecode($urlmonitora->response);  
  }
}
