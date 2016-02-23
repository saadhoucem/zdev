@extends('admin.index')
@section('title')
    documents - Creation
    @stop
    @section('body')
            <!-- Content Wrapper. Contains page content -->
    <section class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                documents
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('document.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="{{route('document.index')}}">documents</a></li>
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
                            <h3 class="box-title">Nouveau Document</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::open(
                               array(
                               'route' => 'document.store',
                               'class' => 'form',
                               'novalidate' => 'novalidate',
                               'files' => true)
                       ) !!}
                        <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('Titre ') !!}
                                    {!! Form::text('titre',' ',array('class' => 'form-control')) !!}
                                    {!! $errors->first('titre', '<small style="color:red;">Ce champ est obligatoire</small>') !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Fichier') !!}
                                    {!! Form::file('fichier',array('class' => 'form-control')) !!}
                                    {!! $errors->first('fichier', '<small style="color:red;">Ce champ est obligatoire</small>') !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('Image') !!}
                                    {!! Form::file('image',array('class' => 'form-control')) !!}
                                    {!! $errors->first('image', '<small style="color:red;">Ce champ est obligatoire</small>') !!}
                                </div>
                                <div class="form-group">
                                    <label>Choisir Categorie</label>
                                    <select class="form-control" name="categorie_id">
                                        <option value="" disabled selected>Selectionner la categorie</option>
                                        @foreach($categories as $s)
                                            <option value="{{$s->id}}">{{$s->nomcategorie}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('categorie_id', '<small style="color:red;">Ce champ est obligatoire</small>') !!}
                                </div>
                                <div class="form-group">
                                    <label>Choisir Auteur</label>
                                    <select class="form-control" name="auteur_id">
                                        <option value="" disabled selected>Selectionner l'auteur</option>
                                        @foreach($auteurs as $s)
                                            <option value="{{$s->id}}">{{$s->name}} {{$s->prenom}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('auteur_id', '<small style="color:red;">Ce champ est obligatoire</small>') !!}
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


