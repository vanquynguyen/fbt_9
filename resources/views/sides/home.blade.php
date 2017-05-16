@extends('layouts.app')
@extends('layouts.footer')
@extends('layouts.bottom_block')

@section('content')
<div class="container_12">
    <div class="grid_12 " >
      <div id="slide" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#slide" data-slide-to="0" class="active"></li>
        <li data-target="#slide" data-slide-to="1"></li>
        <li data-target="#slide" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="images/slide.jpg" alt="...">
          <div class="carousel-caption">
            ...
          </div>
        </div>
        <div class="item">
          <img src="images/slide.jpg" alt="...">
          <div class="carousel-caption">
            ...
          </div>
        </div>
       
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#slide" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#slide" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
    </div>
  </div>
  <div class="content">
    <div class="container_12">
      <div class="grid_12">
        <h3>Top Destinations</h3>
      </div>
      <div class="boxes">
        <div class="grid_4">
          <figure>
            <div><img src="images/page1_img1.jpg" alt=""></div>
            <figcaption>
              <h3>Venice</h3>
              Lorem ipsum dolor site geril amet, consectetur cing eliti. Suspendisse nulla leo mew dignissim eu velite a rew qw vehicula lacinia arcufasec ro. Aenean lacinia ucibusy fase tortor ut feugiat. Rabi tur oliti aliquam bibendum olor quis malesuadivamu. <a href="#" class="btn">Details</a> </figcaption>
          </figure>
        </div>
        <div class="grid_4">
          <figure>
            <div><img src="images/page1_img2.jpg" alt=""></div>
            <figcaption>
              <h3>New York</h3>
              Psum dolor sit ametylo gerto consectetur ertori hykill holit adipiscing lity. Donecto rtopil osueremo kollit asec emmodem geteq tiloli. Aliquam dapibus neclol nami wertoli elittro eget vulpoli no
              utaterbil congue turpis in su. <a href="#" class="btn">Details</a> </figcaption>
          </figure>
        </div>
        <div class="grid_4">
          <figure>
            <div><img src="images/page1_img3.jpg" alt=""></div>
            <figcaption>
              <h3>Paris</h3>
              Lorem ipsum dolor site geril amet, consectetur cing eliti. Suspendisse nulla leo mew dignissim eu velite a rew qw vehicula lacinia arcufasec ro. Aenean lacinia ucibusy fase tortor ut feugiat. Rabi tur oliti aliquam bibendum olor quis malesuadivamu. <a href="#" class="btn">Details</a> </figcaption>
          </figure>
        </div>
        <div class="clear"></div>
      </div>
      <div class="grid_8 tab">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="active"><a href="#last-minute" role="tab" data-toggle="tab">LAST MINUTE</a></li>
          <li><a href="#hot-deals" role="tab" data-toggle="tab">HOT DEALS</a></li>
          <li><a href="#all-inclusive" role="tab" data-toggle="tab">ALL-INCLUSIVE</a></li>
         
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="last-minute">
              
          </div>
          <div class="tab-pane" id="hot-deals"></div>
          <div class="tab-pane" id="all-inclusive"></div>
          
        </div>
      </div>
      <div class="grid_4">
        <div class="newsletter_title">NewsLetter </div>
        <div class="n_container">
          <form id="newsletter" action="#">
            <div class="success">Your subscribe request has been sent!</div>
            <div class="text1">Sign up to receive our newsletters </div>
            <label class="email">
              <input type="email" value="email address" >
              <span class="error">*This is not a valid email address.</span> </label>
            <div class="clear"></div>
            <a href="#" class="" data-type="submit"></a>
          </form>
          <ul class="list">
            <li><a href="#">Fgo psu dr sit amek </a></li>
            <li><a href="#">Sem psum dr sit ametre </a></li>
            <li><a href="#">Rame sum dr sit ame </a></li>
            <li><a href="#">Bem psum dr sit ameteko </a></li>
            <li><a href="#">Nem dsum dr sit amewas </a></li>
            <li><a href="#">Vcem psum dr sit </a></li>
            <li><a href="#">Zdfem psum dr sittr amewe </a></li>
          </ul>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
@endsection
