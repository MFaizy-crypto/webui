@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<style>
  .newPageContent {
    width: 375px;
    margin: 0 auto;
  }
  .newImage img {
    width: 100%;
  }
  .setDots {
    position: relative;
    padding: 0 0 50px;
    margin: 0 0 20px;
    border-bottom: 1px solid #c7c7c7;
  }
  .greenDots {
    position: absolute;
    right: 15px;
    bottom: 10px;
  }
  .greenDots span {
    height: 8px;
    width: 8px;
    border-radius: 50%;
    background-color: limegreen;
    display: inline-block;
    margin: 0 5px;
  }
</style>

<section class="newPage">
  <div class="newPageContent">
    <div class="newImage setDots">
    <img src="{{asset('public/web/designPics/upload-img.jpg')}}" alt="New image">
    <div class="greenDots">
      <span></span>
      <span></span>
      <span></span>
    </div>
    </div>
    <div class="newHeading setDots">
      <h2>Title</h2>
      <div class="greenDots">
      <span></span>
      <span></span>
      <span></span>
    </div>
    </div>
    <div class="newtext setDots">
      <p>Text</p>
      <div class="greenDots">
      <span></span>
      <span></span>
      <span></span>
    </div>
    </div>
  </div>
</section>

@endsection