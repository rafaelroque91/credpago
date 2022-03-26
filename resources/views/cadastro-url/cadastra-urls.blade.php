<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Cadastro de Urls') }}
    </h2>
  </x-slot>

  <div class="py-12">        
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            {{Form::model($urlUser,['method' => 'POST','route' => 'url-salvar'])}}                        
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
              <!-- Name -->
              <div>                
              {{ Form::hidden('id', null, array('id' => 'id')) }}
                <label for="url">URL (ex: http://www.google.com)</label>
              {{ Form::input('urlUser','url', null, array('class' => 'form-control' , 'id' => 'urlUser' , 'placeholder' => 'Insira a URL', 'required')) }}                                
            </div>          
            <div class="pt-4"> 
              <div class="col text-center">                
                <a class="btn btn-primary" href="{{route('url-lista')}}">Voltar</a>
                <input class="btn btn-secondary"  type="submit" value="Salvar URL"></input>                   
              </div>
            </div>  
            {{Form::close()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>