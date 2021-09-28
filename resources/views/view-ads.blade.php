
@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')    
<div class="card">
  <div class="card-header">
    {{$advertise->title}}
  </div>
  <style type="text/css">
      #gallery{
        display: flex;
        justify-content: center;
        border: 1px solid cyan;
        border-radius: 10px;
    }
    .card-img, .card-img-bottom, .card-img-top {
        width: 100%;
        overflow: hidden;
        height: 320px;
    }
    .container .col-md-3:hover .card img{
        transition: all 0.1s ease-in-out;
        border-radius: 15px 0 0 !important;
    }
    .container .col-md-3 .card{
        opacity: 0.7;
        transition: all 0.1s ease-in-out;
        margin-bottom: 1.2em;
    }
    .container .col-md-3:hover .card{
        opacity: 0.9;
        border: 1px solid #000;
        border-radius: 15px;
        overflow: hidden;
    }
    #other-advertize{
        position: relative;
    }
    #other-advertize small{
        right: 0;
        transition: all 0.2s;
        position: absolute;
        font-size: 14px;
        margin: auto;
        align-items: center;
        display: flex;
        top: 50%;
        transform: translateY(-50%);
        text-decoration: 2px blue solid;
        text-shadow: 2px 2px 4px gray;
    }
    #other-advertize small a{
        text-decoration: none;
    }
    #other-advertize small:hover{
        transition: all 0.2s;
        text-shadow: 3px 3px 4px gray;
        transform: translateY(-50%) translateX(-2px);
    }
    .card-title {
        border-bottom: 1px solid cyan;
        padding-bottom: 10px;
    }
    .carousel-item{
        top: 50%;
        transform: translateY(-50%);
    }
    .carousel-item img {
        height: 100%;
        padding: 3em;
        margin: auto;
    }
    .creator-info{
        display: none;
        transition: all 0.5s;
        margin-top: 1em;
        padding: 1em 0.5em;
    }
</style>
  <div class="card-body">
    <div class="row">
        <div class="col-md-7">
            <a href="#" class="btn btn-danger" id="contaact-to-creator">Contact to creator</a>
            <small><span>Category: <a href="/categories/{{$advertise->cat->id}}" class="card-title">{{$advertise->cat->title}}</a></span></small>
            <p class="creator-info card">
                Email: <abbr><a href="mailto:{{$advertise->creator? $advertise->creator->email : '#'}}">{{$advertise->creator? $advertise->creator->email :  '----'}}</a></abbr>
            </p>
            <script type="text/javascript">
                document.querySelector('#contaact-to-creator').addEventListener('click', e => {
                    document.querySelector('.creator-info').style.display = "block"
                })
            </script>
            <p class="card-text table-responsive">
                @if($advertise->specs)
                    <table class="table table-bordered table-hover table-sm table-striped">
                        <thead class="thead-dark bg-success" style="color: #fff">
                            <tr>
                                <th>Property</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    $specs = json_decode($advertise->specs);
                    $len = count($specs);
                ?>
                    @for($i = 0; $i < $len; $i++)
                        <tr>
                            <th>{{$specs[$i]->title}}</th>
                            <td>{{$specs[$i]->value}}</td>
                        </tr>
                    @endfor
                        </tbody>
                    </table>            
                @endif            
                {{$advertise->note}}
            </p>
        </div>
        <div class="col-md-5">
            <div id="gallery">
                <!-- *********************************************************** -->
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                      <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      </div>
                      <div class="carousel-inner" style="width:100%; height: 500px !important;">
                        <div class="carousel-item active" data-bs-interval="5000">
                              <?php $img = $advertise->id % 6 + 1; ?>
                              <img src='{{asset("/img/$img.jpg")}}'>
                          <div class="carousel-caption d-none d-md-block">
                          </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                              <?php $img = $advertise->id % 11 + 1; ?>
                              <img src='{{asset("/img/$img.jpg")}}'>
                          <div class="carousel-caption d-none d-md-block">
                          </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                          <?php $img = $advertise->id % 8 + 1; ?>
                          <img src='{{asset("/img/$img.jpg")}}'>
                          <div class="carousel-caption d-none d-md-block">
                          </div>
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                <!-- *********************************************************** -->
                <script type="text/javascript">
                    // var myCarousel = document.querySelector('#gallery')
                    // var carousel = new bootstrap.Carousel(myCarousel, {
                    //   interval: 2000,
                    //   wrap: false,
                    //   touch: true
                    // })

                </script>
<!--  -->
            </div>
        </div>
    </div>
  </div>
</div>
<hr>
<div class="container">
    <h2 id="other-advertize">Related advertize</h2>    
    <div class="row">
        @foreach($related as $adv)
        <div class="col-md-3">
            <div  class="card">
                <?php $img = $adv->id % 11 + 1;?>
                <a href="/advertises/{{$adv->id}}"><img class="card-img-top" src='{{asset("img/$img.jpg")}}' alt="Card image cap">
                </a>
                <div class="card-body">
                  <h5 class="card-title">{{$adv->title}}</h5>
                  <p class="card-text">{{Str::limit($adv->note, 20, $end='...')}}</p>
                  <a class="card-link" href="/advertises/{{$adv->id}}">View more info >></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection