@extends('layouts.master')
@section('title', trans('title.subject-filter'))

@section('content')
@if(!Auth::check())
	<?php header("Location: /"); ?>
@endif

<section>
	<div class="col-md-12">
		<div class="card">
			<p>Pagina Filter</p>
		</div>
	</div>
</section>

<section>
	<div class="col-md-6">
		<div class="card">
			<p>Exemplo de Texto usando os cards</p>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<p>Exemplo de Texto usando os cards</p>
		</div>
	</div>
</section>
<section>
	<div class="col-md-3">
		<div class="card">
			<p>Exemplo</p>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card">
			<p>Exemplo</p>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card">
			<p>Exemplo</p>
		</div>
	</div>
	<div class="col-md-3">
		<div class="card">
			<p>Exemplo</p>
		</div>
	</div>
</section>
@endsection