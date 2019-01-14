@extends('adminlte::page')

@section('title', 'Painel Dashboard')

@section('content_header')
<h1>Cadastro e modificações</h1>
@stop

@section('content')
<div class="container-fluid">
   <div class="row">
       <div class="alinha">
          <div class="col-xs-6 col-sm-3 col-md-2">
           <a href="" class="btn btn-default">
             <div class="row">
               <div class="col-xs-12 text-center">
                 <i class="fa fa-user fa-4x"></i>
                 <!--<span class="badge badge-pill badge-info fa-1x">15</span>-->
               </div>
               <div class="col-xs-12 text-center">
                 <p>Turma</p>
               </div>
             </div>
           </a>
         </div>

         <div class="col-xs-6 col-sm-3 col-md-2">
           <a href="" class="btn btn-default">
             <div class="row">
               <div class="col-xs-12 text-center">
                 <i class="fa fa-edit fa-4x"></i>
                 <!--<span class="badge badge-pill badge-info fa-1x">15</span>-->
               </div>
               <div class="col-xs-12 text-center">
                 <p>Disciplina</p>
               </div>
             </div>
           </a>
           </div>

           <div class="col-xs-6 col-sm-3 col-md-2">
           <a href="" class="btn btn-default">
             <div class="row">
               <div class="col-xs-12 text-center">
                 <i class="fa fa-edit fa-4x"></i>
                 <!--<span class="badge badge-pill badge-info fa-1x">15</span>-->
               </div>
               <div class="col-xs-12 text-center">
                 <p>Professor</p>
               </div>
             </div>
           </a>
           </div>
       </div>
   </div>
</div>

@stop