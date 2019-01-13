@include('layouts.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) 
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

     Main content -->
    <section class="content container-fluid">

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
                             <p>Cadastrar</p>
                             
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
                             <p>Editar</p>
                             
                           </div>
                         </div>
                       </a>
                       </div>
                   </div>
               </div>

           </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')