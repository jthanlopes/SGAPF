@extends ('site.layouts.perfil.master-perfil')

@section ('conteudo')
<!-- Middle Column -->
<div class="w3-col m7">

  <div class="w3-row-padding">
    <div class="w3-col m12">
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container w3-padding form-news">
          <h3 class="w3-opacity">Adicionar integrante ao job</h3>
          <hr>
          <table class="w3-table w3-centered w3-bordered table-projetos">
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Ações</th>
            </tr>
            @foreach ($freelancers as $freelancer)
            <tr>
              <td><a href="/empresa/pesquisa/perfil-freelancer/{{ $freelancer->id }}" title="Ver perfil">{{ $freelancer->nome }}</a></td>
              <td>{{ $freelancer->email }}</td>
              <td>
                <a href="/empresa/projeto/{{ $projeto->id }}/job/{{ $job->id }}/integrante/{{ $freelancer->id }}/add" class="w3-button w3-blue w3-small" title="Adicionar integrante">Adicionar</a></td>
              </tr>
              @endforeach
              @foreach ($produtoras as $produtora)
              <tr>
                <td><a href="/empresa/pesquisa/perfil-produtora/{{ $produtora->id }}" title="Ver perfil">{{ $produtora->nome }}</a></td>
                <td>{{ $produtora->email }}</td>
                <td>
                  <a href="/empresa/projeto/{{ $projeto->id }}/job/{{ $job->id }}/integrante-produtora/{{ $produtora->id }}/add" class="w3-button w3-blue w3-small" title="Adicionar integrante">Adicionar</a></td>
                </tr>
                @endforeach
              </table>
              @if(count($freelancers) == 0 && count($produtoras) == 0)
              <div style="text-align: center;">
                Primeiramente adicione integrantes ao projeto.
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      <!-- End Middle Column -->
    </div>
    @endsection