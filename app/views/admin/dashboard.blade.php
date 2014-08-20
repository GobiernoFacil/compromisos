@extends('backend', ['title' => 'Dashboard | Tablero de control público de seguimiento del PA15.'])

<!-- the menu -->
@section('content')
@include('backend_nav')
<div class="container">
	<div class="bs-docs-featurette">
	<h1 class="bs-docs-featurette-title">Tablero de control público de seguimiento del PA15.</h1>
 
        <p class="lead">	El objetivo del tablero de control es servir como una herramienta de seguimiento 
        de la implementación de los 26 compromisos que componen el Plan de Acción 2013-2015 de la Alianza para el Gobierno Abierto.</p>
        	<hr class="half-rule">

	<div class="row">
                    
                    <div class="col-lg-3 col-md-6 col-lg-offset-3 col-md-offset-0">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        @if(Auth::user()->is_admin)
                                        <div class="huge">{{count($commitments)}}</div>
                                        <div>Compromisos</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <a href="{{ (count($users) == 0 ) ? '/commitment/create' : '/commitment'}}">
                                <div class="panel-footer">
                                    <span class="pull-left">{{ (count($users) == 0 ) ? 'Crear Compromisos' : 'Ver Compromisos'}}</span>                                  
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                      @if(Auth::user()->is_admin)
                                        <div class="huge">{{count($users)}}</div>
                                        <div>Usuarios</div>
                                      @endif
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->is_admin)
                            <a href="{{ (count($users) == 0 ) ? '/user/create' : '/user'}}">
                              <div class="panel-footer">
                                <span class="pull-left">{{ (count($users) == 0 ) ? 'Crear Usuario' : 'Ver Usuarios'}}</span>                                  
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                              </div>
                            </a>
                            @else
                            <a href="{{'user/' . Auth::user()->id . '/edit'}}">
                              <div class="panel-footer">
                                <span class="pull-left">Editar mi perfil</span>                                  
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                              </div>
                            </a>
                            @endif

                        </div>
                    </div>
                </div>

	</div>
</div>
@stop
