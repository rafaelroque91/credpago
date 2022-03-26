<table class="table table-striped table-hover" id="lista-urls">    
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">URL</th>      
      <th scope="col text-center">Ação</th>    
    </tr>
  </thead>
  <tbody>
      @forelse($urls as $url)
        <tr>
        <th scope="row">{{$url->id}}</th>
        <td>{{$url->url}}</td>    
        <td align="center">      
    
        <a class="btn btn-primary" href="{{url("url/cadastro/$url->id")}}">Editar</a>
        <button class="btn btn-danger excluir" onclick="excluir_url({{$url->id}})">Excluir</button>                    
        <a class="btn btn-secondary" href="{{url("url-monitora/lista/$url->id")}}">Ver Monitoramento</a>
        </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">Nenhum registro encontrado</td>
        </tr>
        @endforelse   
  </tbody>
</table>
{{$urls->links() }}
