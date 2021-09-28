
@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection
<style type="text/css">
	body{
    	height: unset;
	}
</style>
@section('content')
    <div class="row" style="position: relative;">
    	@isset($categories)
    	<div class="col-md-6">
    		<h2 style="display: flex; align-items: center; justify-content: center; gap: 5px"><span>Categories: </span>
		    	<select id="categories" class="form-control" style="display: inline;" onchange="getAdvertizeCategory(event)">
		    		<optgroup>
		    			<option value="-2">Please select a category</option>
		    			<option value="-1">All categories</option>
		    		</optgroup>
	    			@foreach($categories as $cat)
		    			<option value="{{$cat->id}}">{{$cat->title}}</option>
		    		@endforeach
		    	</select>
    		</h2>
	    </div>
	    <hr>
	    <div class="clearfix"></div>
	    <script type="text/javascript">
	    	window.onload = 
	    	() => {
	    		const path = document.location.pathname.split('/');
	    		if(path[2]){
	    			const id = path[2]
	    			document.querySelector(`select#categories option[value='${id}']`).setAttribute('selected', true)
	    		}
	    	};
	    	function getAdvertizeCategory(e){
	    		const id = e.target.value;
	    		if(id == -1)
	    			window.location.href = "/";
	    		else if(id !== -2)
	    			window.location.href = "/categories/" + id;
	    	}
	    </script>
	    @endisset
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
    		<div id="pagination" class="text-center">{{ $advertises->links() }}</div>
    	@else
    		<h2>Opps...No thing! :(</h2>
    	@endif
    </div>
@endsection