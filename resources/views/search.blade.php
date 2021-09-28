
@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection
<style type="text/css">
	.card-img, .card-img-bottom, .card-img-top {
		width: 100%;
		overflow: hidden;
		height: 320px;
	}
	.fluid-container .col-md-3:hover .card img{
		transition: all 0.2s ease-in-out;
		border-radius: 15px 0 0 !important;
	}
	.fluid-container .col-md-3{
		transition: all 0.2s ease-in-out;
		margin-bottom: 1.2em;
		min-height: 100%;
	}
	.fluid-container .col-md-3:hover .card{
		border: 1px solid #000;
		border-radius: 15px;
		overflow: hidden;
	}
	#pagination{
		position: absolute;
		bottom: 0;
		margin: auto;
	}
    .card-title {
        border-bottom: 1px solid cyan;
        padding-bottom: 10px;
    }
</style>
@section('content')
    <div class="row">
    	<h2 class="">Search phrase: "{{Request::input('search-field')}}"</h2>
    	<hr>
	    @if(count($advertises) > 0)
    	@foreach($advertises as $adv)
    	<div class="col-md-3">
    		<div  class="card">
    			<?php $img = $adv->id % 11 + 1;?>
			    <a href="/advertises/{{$adv->id}}"><img class="card-img-top" src='{{asset("img/$img.jpg")}}' alt="Card image cap"></a>
			    <div class="card-body">
			      <h5 class="card-title">{{$adv->title}}</h5>
			      <p class="card-text">{{Str::limit($adv->note, 20, $end='...')}}</p>
			    </div>
			    <div class="card-body">
			      <a class="card-link" href="/advertises/{{$adv->id}}">View more info >></a>
			    </div>
			</div>
    	</div>
    	@endforeach
    	<div id="pagination" class="col-md-12 text-center">{{ $advertises->links() }}</div>
    	@else
    		<h2>Opps...No thing! :(</h2>
    	@endif
    </div>
@endsection