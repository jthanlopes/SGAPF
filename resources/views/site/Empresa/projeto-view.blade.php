@extends ('site.layouts.perfil.master-perfil')

@section ('conteudo')
<!-- Middle Column -->
<div class="w3-col m7">

  <div class="w3-row-padding projeto-view">
    <div class="w3-col m12">
      @if(session()->has('message'))
      <div class="alert alert-{{ session()->get('message')['response'] }} alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message')['message'] }}
      </div>
      @endif
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container w3-padding">
          <a href="{{ route('projetos.view') }}" class="link-voltar">voltar para os projetos</a>
          <h3 class="w3-opacity">{{ $projeto->titulo }} <span class="opt-projeto">[<a href="/empresa/projeto/editar/{{ $projeto->id }}">Editar projeto</a>]</span></h3>
          <p class="w3-opacity">Descrição: {{ $projeto->descricao }}</p>
          <p class="w3-opacity">Status: {{ $projeto->status }}</p>
          <p class="w3-opacity">Data de criação: {{ $projeto->created_at->format('d/m/Y') }}</p>
          <p class="w3-opacity">Número de integrantes: {{ count($freelancers) + count($produtoras) }}</p>
          <p class="w3-opacity">Número de jobs: {{ count($jobs) }}</p>
          <a href="">Gerar relatório do projeto</a>
          <hr>
          <h4 class="w3-opacity">Gerenciar Equipe <span class="opt-projeto">[<a href="/empresa/projeto/{{ $projeto->id }}/integrante/novo">Adicionar integrante</a>]</span></h4>
          <table class="w3-table w3-centered w3-bordered table-projetos">
            <tr>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Ações</th>
            </tr>
            <tr>
              @foreach ($freelancers as $freelancer)            
              <td>{{ $freelancer->nome }}</td>
              <td>{{ $freelancer->email }}</td>
              <td><a href="" class="w3-button w3-blue w3-small" title="Enviar e-mail para o freelancer">Enviar E-mail</a>
                <a href="/empresa/projeto/{{ $projeto->id }}/integrante/remover/{{ $freelancer->id }}" class="w3-button w3-red w3-small" title="Remover freelancer">Remover</a></td>              
                @endforeach
              </tr>
              <tr>
              @foreach ($produtoras as $produtora)            
              <td>{{ $produtora->nome }}</td>
              <td>{{ $produtora->email }}</td>
              <td><a href="" class="w3-button w3-blue w3-small" title="Enviar e-mail para a produtora">Enviar E-mail</a>
                <a href="/empresa/projeto/{{ $projeto->id }}/integrante/remover-produtora/{{ $produtora->id }}" class="w3-button w3-red w3-small" title="Remover produtora">Remover</a></td>          
                @endforeach
              </tr>
            </table>
            @if(count($freelancers) == 0 && count($produtoras) == 0)
            <div></div>            
            <div style="text-align: center;">
              Adicione os integrantes que participarão deste projeto.
            </div>
            @endif
            <hr>
            <h4 class="w3-opacity">Jobs do Projeto <span class="opt-projeto">[<a href="/empresa/projeto/{{ $projeto->id }}/job/novo">Criar job</a>]</span></h4>
            <table class="w3-table w3-centered w3-bordered table-projetos">
              <tr>
                <th>Título</th>
                <th>Status</th>
                <th>Ações</th>
              </tr>
              @foreach ($jobs as $job)
              <tr>
                <td>{{ $job->titulo }}</td>
                <td>{{ $job->status }}</td>
                <td><a href="/empresa/projeto/{{ $projeto->id }}/job/{{ $job->id }}" class="w3-button w3-blue w3-small" title="Visualizar e editar o projeto">Visualizar</a>
                  @if( $job->status == "Aberto")
                  <a href="/empresa/projeto/{{ $projeto->id }}/job/finalizar/{{ $job->id }}" class="w3-button w3-red w3-small" title="Finalizar o projeto">Finalizar</a>
                  @else
                  <a href="/empresa/projeto/{{ $projeto->id }}/job/reabrir/{{ $job->id }}" class="w3-button w3-red w3-small" title="Finalizar o projeto">Reabrir</a>
                  @endif
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End Middle Column -->
  </div>
  @endsection