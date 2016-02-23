@extends('admin.index')
@section('title')
    documents - index
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
                <section class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <a href="{{ route('document.create') }}"
                               class="btn btn-primary btn-sm pull-right"><b>+</b></a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="example1_length">
                                            <label>
                                                {!! Form::open(
                                                     array(
                                                     'route' => 'document.index',
                                                     'class' => 'form',
                                                     'method' => 'get',
                                                     'novalidate' => 'novalidate',
                                                     'files' => true)
                                             ) !!}
                                                <select aria-controls="example1" class="form-control input-sm"
                                                        onchange="this.form.submit()" name="pagenumber">
                                                    <option value="" disabled selected>Selectioner taille</option>
                                                    <option value="10" <?php //echo (10 == ) ? "selected" : "";  ?>>
                                                        10
                                                    </option>
                                                    <option value="25" <?php //echo (25 == $pagenumber) ? "selected" : "";  ?>>
                                                        25
                                                    </option>
                                                    <option value="50" <?php // echo (50 == $pagenumber) ? "selected" : "";  ?>>
                                                        50
                                                    </option>
                                                    <option value="100" <?php //echo (100 == $pagenumber) ? "selected" : "";  ?>>
                                                        100
                                                    </option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group col-sm-2 col-sm-offset-5">
                                            <select class="form-control choosen" id="tridocuments" name="secteur_id"
                                                    onchange="this.form.submit()">
                                                <option value="" disabled selected>Selectioner document</option>
                                                @foreach($documents as $document)
                                                    <option value="{{$document->id}}" <?php echo ($document->id == $documents_id) ? "selected" : "";  ?>>{{$document->name}}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('documents_id', '<small style="color:red;">Ce champ est obligatoire</small>') !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-striped dataTable" role="grid"
                                               aria-describedby="example1_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 197px;">Titre
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 197px;">Categorie
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 197px;">Auteur
                                                </th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending"
                                                    style="width: 10%;"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($documents as $document)
                                                <tr role="row" class="even">
                                                    <td>{{$document->titre}}</td>
                                                    <td>{{$document->nomcategorie}}</td>
                                                    <td>{{$document->name}}</td>
                                                    <td class="text-center">
                                                        <form class="delete"
                                                              action="{{ route('document.destroy', $document->id) }}"
                                                              method="POST">
                                                            <a href="{{ route('document.edit',$document->id)}}"
                                                               class='btn btn-info btn-xs'><span
                                                                        class="glyphicon glyphicon-edit"></span> </a>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }}"/>
                                                            <button type="submit" class="btn btn-xs btn-danger"
                                                                    data-toggle="modal" data-target="#confirmDelete"
                                                                    data-title="Delete User"
                                                                    data-message="Are you sure you want to delete this ?"
                                                                    value="Delete"><span
                                                                        class="glyphicon glyphicon-trash"></span>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- is not working ! -->
                                        <div class="text-center">
                                            @if($documents_id == null )

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </section>
        <!--  main Content -->
    </section><!-- Content Wrapper-->
    {{-- Start Confirm Delete --}}

    {{--End Confil Delete --}}

@stop

@section('header')
@stop

@section('footer')
    <script>
        $(".delete").on("submit", function () {
            return confirm('Voulez-vous supprimer cet domaine ?');
        });
    </script>
@stop