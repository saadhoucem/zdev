@extends('admin.index')
@section('title')
    Projet - Modification
    @stop
    @section('body')
            <!-- Content Wrapper. Contains page content -->
    <section class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Projets
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('projet.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="{{route('projet.index')}}">Projets</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Modifier Projet</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::model($projet ,['method'=>'PATCH','route'=>['projet.update',$projet->id]]) !!}
                        <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('Nom Domaine') !!}
                                    {!! Form::text('domaine',null,array('class' => 'form-control')) !!}
                                    {!! $errors->first('domaine', '<small style="color:red;">Ce champ est obligatoire</small>') !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Nom Projet') !!}
                                    {!! Form::text('projet_name',null,array('class' => 'form-control')) !!}
                                    {!! $errors->first('projet_name', '<small style="color:red;">Ce champ est obligatoire</small>') !!}
                                </div>

                                <div class="form-group">
                                    <label>Choisir Secteur</label>
                                    <select class="form-control" name="secteur_id">
                                        <option value="" disabled selected>Selectioner le secteur</option>
                                        @foreach($secteurs as $secteur)
                                            <option value="{{$secteur->id}}" <?php echo ($secteur->id == $projet->secteur_id) ? "selected" : "";  ?>>{{$secteur->secteur}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('secteur_id', '<small style="color:red;">Ce champ est obligatoire</small>') !!}
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">

                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </section>
        <!--  main Content -->
    </section><!-- Content Wrapper-->
@stop

@section('header')
@stop

@section('footer')
@stop
