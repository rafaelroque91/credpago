<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Urls Cadastradas') }}
    </h2>
  </x-slot>

  <div class="py-12">            
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            @endif

            @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
            @endif   

            <div class="row">
              <div class="col text-center">
                <a class="btn btn-secondary" href="{{url("url/cadastro")}}">Adicionar URL</a>
              </div>
              <div class="col text-center">
                <button class="btn btn-primary" onclick="atualiza_lista()">Atualizar lista</button>
              </div>
            </div>      
          </div>   
          <div id="tabela-url">
              @include("cadastro-url/tabela-url")
          </div>
        </div>
      </div>
    </div>
  </div>    
<script>   
  function excluir_url(id){            
    swal.fire({
      title: 'Deseja realmente excluir essa URL?',  
      showCancelButton: true,
      confirmButtonText: 'Sim',
      cancelButtonText: 'Não',
    }).then((result) => {  
      if (result.isConfirmed) {
        csrf = $("[name=_token]").val();    
        $.ajax({                  
          type: "DELETE", url: "{{route('url-delete')}}", cache: false, data:{"_token": csrf,"id" : id}, success: function (data) {
            if (data.success){
              Swal.fire(data.msg, '', 'success');
              $("#tabela-url").html(data.dados);                                           
            } 
            else {
              Swal.fire(data.msg, '', 'error');                    
            }
          },
          failure: function (data) {
            Swal.fire('Falha ao excluir URL', '', 'error');               
          }
        });
      } 
    });      
  }

  function atualiza_lista(){        
    $.ajax({        
      type: "GET", url: "{{route('url-refresh')}}", cache: false, success: function (data) {
        $("#tabela-url").html(data);                                           
      }, 
      failure: function (data) {
        Swal.fire('Falha ao excluir URL', '', 'error');         
      }
    });
  }
</script>
</x-app-layout>