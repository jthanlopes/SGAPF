@extends ('site.layouts.perfil.master-perfil')

@section ('conteudo')
<!-- Middle Column -->
<div class="w3-col m7">

  <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container w3-padding">
          <h3 class="w3-opacity">Projetos</h3>
          @if(session()->has('message'))
          <div class="alert alert-{{ session()->get('message')['response'] }} alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session()->get('message')['message'] }}
          </div>
          @endif
          <hr>
          <table class="w3-table w3-centered w3-bordered table-projetos">
            <tr>
              <th>Projeto</th>
              <th>Administrador</th>
              <th>Status</th>
              <th>Ações</th>
            </tr>
            @foreach ($projetos as $projeto)
            <tr>
              <td>{{ $projeto->titulo }}</td>
              <td>{{ $projeto->empresa->nome }}</td>
              <td>{{ $projeto->status }}</td>
              <td>
                @if($projeto->pivot->aceito == 1 && $projeto->pivot->avaliado == 0)
                <a href="/freelancer/jobs-projetos/{{ $projeto->id }}" class="w3-button w3-blue w3-small" title="Visualizar o job">Ver jobs</a>
                @elseif($projeto->pivot->aceito == 1 && $projeto->pivot->avaliado == 1 && $projeto->pivot->avaliado_freela == 0)
                <a href="/freelancer/projeto/{{ $projeto->id }}/finalizar/avaliar/{{ $projeto->empresa->id }}" class="w3-button w3-blue w3-small" title="Avalia empresa">Avaliar</a>
                @elseif($projeto->pivot->aceito == 1 && $projeto->pivot->avaliado == 1 && $projeto->pivot->avaliado_freela == 1)
                --------
                @elseif($projeto->pivot->aceito == 0)
                <a href="/freelancer/jobs-projetos/{{ $projeto->id }}/aceitar" class="w3-button w3-blue w3-small" title="Aceitar convite">Aceitar convite</a>
                <a href="/freelancer/jobs-projetos/{{ $projeto->id }}/recusar" class="w3-button w3-red w3-small" title="Recusar convite">Recusar convite</a>
                @endif
              </td>
            </tr>
            @endforeach
          </table>
          @if(count($projetos) == 0)
          <div style="text-align: center; margin-top: 10px;">
            Você não está em nenhum projeto no momento.
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  <!-- End Middle Column -->
</div>
@endsection