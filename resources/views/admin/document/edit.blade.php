@extends('admin.index')
@section('title')
    documents - Modification
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
                <li><a href="{{route('documents.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><a href="{{route('documents.index')}}">documents</a></li>
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
                            <h3 class="box-title">Modifier categorie</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        {!! Form::model($documents ,['method'=>'PATCH','route'=>['documents.update',$documents->id]]) !!}
                        <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                            <div class="box-body">
                                <div class="form-group">
                                    {!! Form::label('Nom') !!}
                                    {!! Form::text('name',null,array('class' => 'form-control')) !!}
                                    {!! $errors->first('name', '<small style="color:red;">Ce champ est obligatoire</small>') !!}
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
