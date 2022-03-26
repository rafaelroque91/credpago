<table class="table table-striped table-hover" id="lista-urls">    
  <thead>
    <tr>      
      <th scope="col">URL</th>      
      <th scope="col">Status Code</th>    
      <th scope="col">Data/hora</th>    
      <th scope="col">Ação</th>    
    </tr>
  </thead>
  <tbody>
    @forelse($monitora as $m)
      <tr>
        <td>{{$m->url->url}}</td> 
        <td>{{$m->status_code}}</td>    
        <td>{{$m->created_at}}</td>                      
        <td><a class="btn btn-secondary" target="_blank" href="{{url("url-monitora/detalhes/$m->id")}}">Ver Conteúdo</a></td>                      
      </tr>
    @empty
      <tr>
        <td colspan="4">Nenhum registro encontrado</td>
      </tr>
    @endforelse   
  </tbody>
</table>
{{$monitora->links() }}
