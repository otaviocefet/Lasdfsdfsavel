@extends('painel.templates.template')

@section('content')

<div class="relatorios">
	<div class="container">
		<ul class="relatorios">
			<li class="col-md-6 text-center">
				<a href="{{url('/painel/estilos')}}">
				<img src="{{url('assets/painel/imgs/estilos-laramusic.png')}}" alt="Estilos" class="img-menu">
					<h1>123</h1>
				</a>
			</li>
			<li class="col-md-6 text-center">
				<a href="{{url('/painel/albuns')}}">
					<img src="{{url('assets/painel/imgs/albuns-laramusic.png')}}" alt="Albuns" class="img-menu">
					<h1>423</h1>
				</a>
			</li>
			<li class="col-md-6 text-center">
				<a href="{{url('/painel/musicas')}}">
					<img src="{{url('assets/painel/imgs/music-laramusic.png')}}" alt="Musicas" class="img-menu">
					<h1>3534</h1>
				</a>
			</li>
			<li class="col-md-6 text-center">
				<a href="{{url('/painel/usuarios')}}">
					<img src="{{url('assets/painel/imgs/perfil-laramusic.png')}}" alt="Meu Perfil" class="img-menu">
					<h1>90</h1>
				</a>
			</li>
		</ul>
	</div>
</div><!--Relatorios-->

@endsection