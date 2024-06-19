<?php
  //use App\Models\Menu;

  //$menus = Menu::all();
//   @if($page->checkPersonal($page->slug))
?>

@extends('layouts.frontent')

@section('content')

<div class="row">
  <div class="col-lg-9">
      <div class="page-header-title">
          <h1>{{$page->title}}</h1>
      </div>
      <div class=""  >
                
          <!-- CONTENT -->
          <?=$page->content?>
      </div>
  </div>
  <div class="col-lg-3 ">
      <ul class="menu">
        @foreach($menu->submenus($id) as $submenu)
          <li><a href="/views/{{$id}}/{{$menu->getSlug($submenu->page_id)}}">{{ $submenu->name }}</a></li>
        @endforeach
      </ul>
  </div>
</div>
@endsection
