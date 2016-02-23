@extends('user.index')
@section('title')
    Zdev- index
@stop
@section('front')

    <section class="content-header">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-xs-12">
                <div class="" style="">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                {!! Form::open(
                                                    array(
                                                    'route' => 'front.index',
                                                    'class' => 'form',
                                                    'method' => 'get',
                                                    'novalidate' => 'novalidate',
                                                    'files' => true)
                                            ) !!}
                                <div class="col-sm-9">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3 col-sm-offset-1">
                                                <div class="form-group">
                                                    <label>Auteur</label><br>
                                                    <select class="form-control choosen" id="secteur"
                                                            name="auteur" onchange="this.form.submit()">
                                                        <option value="" disabled selected>Selectioner le
                                                            Auteur
                                                        </option>
                                                        <?php foreach($secteurs as $secteur){?>
                                                        <option
                                                                value="<?php echo $secteur->id ?>" <?php echo ($secteur->id == $auteurid) ? "selected" : ""; ?>>
                                                            <?php   echo $secteur->name; echo '&nbsp;'; echo $secteur->prenom;  ?>
                                                        </option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Categorie</label><br>
                                                    <select class="form-control choosen" id="rubrique"
                                                            name="categorie" onchange="this.form.submit()">
                                                        <option value="" disabled selected>Selectioner la
                                                            Categorie
                                                        </option>
                                                        <?php foreach($rubriques as $rubrique){?>
                                                        <option
                                                                value="<?php echo $rubrique->id;?>" <?php echo ($rubrique->id == $categorieid) ? "selected" : ""; ?>>
                                                            <?php echo $rubrique->nomcategorie ?>
                                                        </option>
                                                        <?php }?>
                                                    </select><br>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Mot clé</label><br>
                                                    <input type="text" name="titredoc" class="form-control"
                                                           onchange="this.form.submit()">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <br><br>
                    </div>
                </div>
                {!! Form::close() !!}
                        <!-- /.box-body -->
            </section>
            <!-- /.Left col -->
        </div>


    </section>
    <!-- Main content -->
    <section class="content " style="background:#ecf0f1;">
        <!-- Info boxes -->
        <div class="row">
            <?php  foreach($documents as $doc){?>
            <div class="col-md-3 col-md-offset-1">
                <!-- Box Comment -->
                <div class="box box-widget">
                    <div class="box-header with-border">
                        <div class="user-block">
                            <span class="username"><a
                                        href="<?php  echo 'front/viewer.blade.php?pathfile='. $doc->pathfile?>" target="_blank?"><?php echo $doc->name; echo '&nbsp;'; echo $doc->prenom?></a></span>
                            <span class="description"><?php echo $doc->created_at; ?></span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button class="btn btn-box-tool" data-toggle="tooltip" title=""
                                    data-original-title="Mark as read"><i class="fa fa-circle-o"></i></button>
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <img class="img-responsive pad"
                             src="<?php echo 'http://localhost/zdev/public/images/' . $doc->pathimg ?>" alt="Photo">

                        <p><a href="<?php  echo 'http://localhost/zdev/public/documents/' . $doc->pathfile?>"
                              target="_blank"><?php echo $doc->titre ?></a></p>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer box-comments">
                            <?php if(count($commentaire) > 0){
                        foreach($commentaire as $comment){
                        ?>
                            <div class="box-comment">
                                <!-- User image -->
                                <div class="comment-text">
                          <span class="username">
                           <?php
                              if($comment->id_document == $doc->id){
                              ?>
                              <?php  echo $comment->name; ?>
                              <span class="text-muted pull-right"><?php echo $comment->created_at; ?></span>
                          </span><!-- /.username -->
                                    <?php echo $comment->text; echo  $doc->id;?>
                                </div>
                                <!-- /.comment-text -->
                                <?php break; }}}?>
                        </div>
                        <!-- /.box-comment -->
                    </div>
                    <!-- /.box-footer -->
                    <div class="box-footer">
                        {!! Form::open(['url'=>'front/commentaire']) !!}
                        <?php  if (Auth::check()) {
                            $user = Auth::user();
                        } ?>
                                <!-- .img-push is used to add margin to elements next to floating images -->
                        <div class="img-push">
                            <input type="text" name="iddocument" value="<?php echo $doc->id?>" hidden>
                            <input type="text" name="idauteur" value="<?php if (Auth::check()) {
                                echo $user->id;
                            }?>" hidden>
                            <input type="text" name="iduser" value="<?php  echo $doc->id_categories?>" hidden>
                            <input type="text" class="form-control input-sm"
                                   placeholder="Press enter to post comment" name="commentuser">

                            <div class="box-footer">
                                {!! Form::submit('Enregistrer', ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <?php }?>
        </div>
        <!-- /.row -->
        <!-- /.row -->
    </section>
@stop

@section('headerr')
@stop
@section('footerr')
    <script>
        $(".delete").on("submit", function () {
            return confirm('Voulez-vous supprimer cet domaine ?');
        });
    </script>
@stop