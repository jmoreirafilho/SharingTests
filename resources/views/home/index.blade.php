@extends('layouts.master')
@section('title', trans('title.home-index'))

@section('content')
<section>
	<div class="col-md-7">
		<div class="card">
			<div class="card-title">@lang('title.home-index')</div>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="card-title">Sobre</div>
		</div>
	</div>
</section>
@endsection