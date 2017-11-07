<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rota da home-page do site
Route::get('/', 'HomeController@home')->name('home.page');
// Visualizar todos os eventos
Route::get('/eventos', 'Noticia\NoticiaController@noticiasViewHome')->name('eventos.page');
// Visualizar um único evento
Route::get('/eventos/evento-view/{noticia}', 'Noticia\NoticiaController@noticiaView')->name('evento.view');
// Rota do formulário de contato com o admin
Route::get('/contato', function () {return view('site.contato');})->name('contato.page');

// Rotas de empresa
Route::prefix('empresa')->group(function () {
	// Rota de perfil da empresa
  Route::get('/', 'Empresa\EmpresaController@perfil');
	// Rotas de logout
  Route::get('/perfil', 'Empresa\EmpresaController@perfil')->name('empresa.perfil');
  // Abre o formulário de cadastro da empresa
  Route::get('/novo', 'Empresa\EmpresaRegisterController@registroView')->name('empresa.registro-view');
  // Salvar formulário
  Route::post('/novo', 'Empresa\EmpresaRegisterController@novo')->name('empresa.novo');
  // Confirmação de conta da empresa
  Route::get('/confirmaConta/{token}', 'Empresa\EmpresaRegisterController@confirmaConta')->name('empresa.confirma-conta');
  // Abre o formulário de login da empresa
  Route::get('/login', 'Empresa\EmpresaLoginController@loginView')->name('empresa.login-view');
  // Submete o formulário de login
  Route::post('/login', 'Empresa\EmpresaLoginController@login')->name('empresa.login');
	// Rotas de logout
  Route::get('/logout', 'Empresa\EmpresaLoginController@logout')->name('empresa.logout');
  // Abrir formulário de editar perfil
  Route::get('/editar-perfil', 'Empresa\EmpresaController@editarPerfil')->name('empresa.editar-perfil.view');
  //
  Route::post('/editar-perfil/informacoes-pessoais', 'Empresa\EmpresaController@editarInfomacoes');
  //
  Route::post('/editar-perfil/endereco', 'Empresa\EmpresaController@editarEndereco')->name('empresa.editar.endereco');
  // Rotas do projeto
  Route::get('/projetos', 'Empresa\Projeto\ProjetoController@projetosView')->name('projetos.view');
  // Pesquisar por projeto
  Route::post('/projetos/pesquisar', 'Empresa\Projeto\ProjetoController@projetosPesquisar')->name('projetos.view.pesquisar');
  // Exibir formulário para cadastrar um novo projeto
  Route::get('/projeto/novo/', 'Empresa\Projeto\ProjetoController@novoProjeto')->name('projeto.show-form-novo');
  // Submeter e criar um novo projeto
  Route::post('/projeto/novo/', 'Empresa\Projeto\ProjetoController@criarProjeto')->name('projeto.novo');
  // Visualizar um projeto
  Route::get('/projeto/{projeto}', 'Empresa\Projeto\ProjetoController@viewProjeto')->name('view.projeto');
  // Abrir formulário para editar um projeto
  Route::get('/projeto/editar/{projeto}', 'Empresa\Projeto\ProjetoController@editarProjetoView')->name('view.projeto-editar');
  // Submeter e atualizar projeto
  Route::post('/projeto/editar/', 'Empresa\Projeto\ProjetoController@editarProjeto')->name('projeto.editar');
  // Rotas de jobs
  // Abrir formulário de criação do Job
  Route::get('/projeto/{projeto}/job/novo', 'Empresa\Job\JobController@novoForm')->name('job.novo.form');
  // Salvar Job
  Route::post('/projeto/job/novo', 'Empresa\Job\JobController@novo')->name('job.novo');
  //
  Route::get('/projeto/{projeto}/job/{job}', 'Empresa\Job\JobController@jobView')->name('job.view');
  // Abrir formulário de editar job
  Route::get('/projeto/job/editar/{job}', 'Empresa\Job\JobController@editarJobView')->name('view.job-editar');
  //
  Route::post('/projeto/job/editar', 'Empresa\Job\JobController@editarJob')->name('job.editar');
  // Finalizar job
  Route::get('/projeto/{projeto}/job/finalizar/{job}', 'Empresa\Job\JobController@finalizarJob')->name('job.finalizar');
  // Reabrir job
  Route::get('/projeto/{projeto}/job/reabrir/{job}', 'Empresa\Job\JobController@reabrirJob')->name('job.reabrir');
  // Mostrar integrantes para add ao job
  Route::get('/projeto/{projeto}/job/{job}/integrante/novo', 'Empresa\Job\JobController@novoFormIntegrantes')->name('job.add.integrantes.form');
  // Adicionar freelancer ao job
  Route::get('/projeto/{projeto}/job/{job}/integrante/{freelancer}/add', 'Empresa\Job\JobController@addFreelancer')->name('job.add.integrante');
  // Remover freelancer e produtora do job
  Route::get('/projeto/{projeto}/job/{job}/integrante/{freelancer}/remover', 'Empresa\Job\JobController@removerFreelancer')->name('job.remover-freelancer');
  //
  Route::post('/projeto/{projeto}/job/{job}/conhecimento/add', 'Empresa\Job\JobController@addConhecimento')->name('job.conhecimento.add');
  //
  Route::get('/projeto/{projeto}/job/{job}/conhecimento/{conhecimento}/remover', 'Empresa\Job\JobController@removerConhecimento')->name('job.conhecimento.remover');
  // Rotas para adicionar membros ao projeto
  // Abrir formulário de adição de membros
  Route::get('/projeto/{projeto}/integrante/novo', 'Empresa\Projeto\ProjetoController@novoFormIntegrantes')->name('integrante.novo.form');
  // Pesquisar por membros
  Route::post('/projeto/{projeto}/integrante/pesquisar', 'Empresa\Projeto\ProjetoController@pesquisarIntegrantes')->name('integrante.pesquisar.form');
  // Adicionar freelancer e produtora ao projeto
  Route::get('/projeto/{projeto}/integrante/addFreelancer/{freelancer}', 'Empresa\Projeto\ProjetoController@addFreelancer')->name('integrante.add-freelancer.form');
  Route::get('/projeto/{projeto}/integrante/addProdutora/{empresa}', 'Empresa\Projeto\ProjetoController@addProdutora')->name('integrante.add-produtora.form');
  // Remover freelancer e produtora ao projeto
  Route::get('/projeto/{projeto}/integrante/remover/{freelancer}', 'Empresa\Projeto\ProjetoController@removerFreelancer')->name('integrante.remover-freelancer.form');
  Route::get('/projeto/{projeto}/integrante/remover-produtora/{empresa}', 'Empresa\Projeto\ProjetoController@removerProdutora')->name('integrante.remover-produtora.form');
  //
  // Rotas de pesquisa de usuários
  // Abrir formulário de pesquisa
  Route::get('/pesquisar', 'Empresa\Pesquisa\PesquisaController@pesquisarView')->name('pesquisa.form.usuarios');
  // Subemeter fomulário de pesquisa
  Route::post('/pesquisar', 'Empresa\Pesquisa\PesquisaController@pesquisar')->name('pesquisa.usuarios');
  // Visualizar perfil de uma produtora
  Route::get('/pesquisa/perfil-produtora/{produtora}', 'Empresa\Pesquisa\PesquisaController@viewPerfilProdutora')->name('view.perfil-produtora');
  // Visualizar perfil de um freelancer
  Route::get('/pesquisa/perfil-freelancer/{freelancer}', 'Empresa\Pesquisa\PesquisaController@viewPerfilFreelancer')->name('view.perfil-freelancer');
  // Visualizar perfil/conhecimentos de um freelancer
  Route::get('/pesquisa/perfil-freelancer/conhecimentos/{freelancer}', 'Empresa\Pesquisa\PesquisaController@viewConhecimentosFreelancer')->name('view.conhecimentos-freelancer');
  // Rotas de notícias e eventos
  // Submeter e criar uma nova notícia
  Route::post('/noticias/novo/', 'Empresa\Noticia\NoticiaController@criarNoticia')->name('noticia.novo');
  // Excluir notícia/evento
  Route::get('/noticia/excluir/{noticia}', 'Empresa\Noticia\NoticiaController@excluirNoticia')->name('noticia.excluir');
  // Rotas de conhecimentos
  //
  Route::get('/conhecimentos', 'Empresa\Conhecimento\ConhecimentoController@conhecimentosView')->name('tecnologias.view');
  //
  Route::post('/conhecimento/add', 'Empresa\Conhecimento\ConhecimentoController@addConhecimento')->name('conhecimento.add');
  //
  Route::get('/conhecimento/excluir/{conhecimento}', 'Empresa\Conhecimento\ConhecimentoController@excluirConhecimento')->name('conhecimento.excluir');

  // Rotas pra gerar PDFs
  // PDF do projeto
  Route::get('/projeto/{projeto}/pdf', 'pdfController@pdfProjeto')->name('pdf.projeto');
  // PDF do job
  Route::get('/job/{job}/pdf', 'pdfController@pdfJob')->name('pdf.job');
});


// Rotas de freelancer
Route::prefix('freelancer')->group(function () {
  Route::get('/', 'Freelancer\FreelancerController@perfil');
  // Rotas de logout
  Route::get('/perfil', 'Freelancer\FreelancerController@perfil')->name('freelancer.perfil');

  // Abre o formulário de cadastro do freelancer
  Route::get('/novo', 'Freelancer\FreelancerRegisterController@registroView')->name('freelancer.registro-view');

  // Salvar formulário
  Route::post('/novo', 'Freelancer\FreelancerRegisterController@novo')->name('freelancer.novo');

  // Confirmação de conta do freelancer
  Route::get('/confirmaConta/{token}', 'Freelancer\FreelancerRegisterController@confirmaConta')->name('freelancer.confirma-conta');

  // Abre o formulário de login do freelancer
  Route::get('/login', 'Freelancer\FreelancerLoginController@loginView')->name('freelancer.login-view');

  // Submete o formulário de login
  Route::post('/login', 'Freelancer\FreelancerLoginController@login')->name('freelancer.login');

  // Rotas de logout
  Route::get('/logout', 'Freelancer\FreelancerLoginController@logout')->name('freelancer.logout');
  // Rotas de conhecimentos do freelancer
  //
  Route::get('/conhecimentos', 'Freelancer\Conhecimento\ConhecimentoController@conhecimentosView')->name('tecnologias.view.freelancer');
  //
  Route::post('/conhecimento/add', 'Freelancer\Conhecimento\ConhecimentoController@addConhecimento')->name('conhecimento.add.freelancer');
  //
  Route::get('/conhecimento/excluir/{conhecimento}', 'Freelancer\Conhecimento\ConhecimentoController@excluirConhecimento')->name('conhecimento.excluir.freelancer');
  // Rotas de notícias e eventos
  // Submeter e criar uma nova notícia
  Route::post('/noticias/novo/', 'Freelancer\Noticia\NoticiaController@criarNoticia')->name('noticia.novo.freelancer');
  // Excluir notícia/evento
  Route::get('/noticia/excluir/{noticia}', 'Freelancer\Noticia\NoticiaController@excluirNoticia')->name('noticia.excluir.freelancer');
  // Rotas dos jobs
  // Visualizar todos os jobs
  Route::get('/jobs', 'Freelancer\Job\JobController@jobsView')->name('jobs.view.freelancer');
  // Visualizar os jobs por projeto
  Route::get('/jobs-projetos', 'Freelancer\Job\JobController@jobsViewProjeto')->name('jobs.projeto.view');
  // Visualizar os jobs por projeto
  Route::get('/jobs-projetos/{projeto}', 'Freelancer\Job\JobController@jobsView')->name('jobs.projeto.pesquisa');
  // Rotas grupos
  // Abrir formulário de cadastro de grupo
  Route::get('/grupos', 'Freelancer\Grupo\GrupoController@gruposView')->name('grupos.view');
  // Abrir formulário de cadastro de grupo
  Route::get('/grupos/add', 'Freelancer\Grupo\GrupoController@novoGrupo')->name('grupo.novo');
  // Submeter e criar novo grupo
  Route::post('/grupos/add', 'Freelancer\Grupo\GrupoController@criarGrupo')->name('grupo.criar');
  // View grupo
  Route::get('/grupo/{grupo}', 'Freelancer\Grupo\GrupoController@grupoView')->name('grupo.view');
});

Auth::routes();