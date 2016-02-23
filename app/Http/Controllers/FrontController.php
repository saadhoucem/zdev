<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\Categories;
use App\Comment;
use App\Documents;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

/*
$documents = DB::table('document')
->select('*')
->join('categories', 'categories.id', '=', $categorieid)
->join('auteur', 'auteur.id', '=', 'document.id_auteur')
->get();
, function ($join) {
    $join->on('users.id', '=', 'contacts.user_id')
        ->where('contacts.user_id', '>', 5);
})

DB::table('users')
->join('contacts', function ($join) {
    $join->on('users.id', '=', 'contacts.user_id')
        ->where('contacts.user_id', '>', 5);
})*/


    public function index()
    {
        //
        //
        $auteurid=null;
        $categorieid=null;
        $titredoc =  null;
        $titres=Documents::all();
        $documents = DB::table('document')
            ->select('*')
            ->join('auteur','auteur.id', '=', 'document.id_auteur')
            ->join('categories', 'categories.id', '=', 'document.id_categories')
            ->get();

        $commentaire = DB::table('comment')
                          ->select('*')
                          ->join('document', 'comment.id_document', '=', 'document.id')
                           ->join('users', 'comment.username', '=', 'users.id')
                          ->get();


        if(Input::get('titredoc')){
            $documents = DB::table('document')
              ->join('categories', 'categories.id', '=', 'document.id_categories')
                ->join('auteur','auteur.id', '=', 'document.id_auteur')
                ->where('titre', 'like', '%'.Input::get('titredoc').'%')
                ->get();

        }

        if(Input::get('auteur')){
            $documents = DB::table('document')
                ->join('categories', 'categories.id', '=', 'document.id_categories')
                ->join('auteur', function ($join) {
                    $join->on('document.id_auteur', '=', 'auteur.id')
                        ->where('auteur.id', '=', Input::get('auteur'));
                })->get();
        }
        if(Input::get('categorie')){
            $documents=   DB::table('document')
                ->join('auteur', 'auteur.id', '=', 'document.id_auteur')
                ->join('categories', function ($join) {
                    $join->on('document.id_categories', '=', 'categories.id')
                        ->where('categories.id', '=', Input::get('categorie'));
                })->get();
        }
        if(Input::get('categorie') && Input::get('auteur')){
            $documents=   DB::table('document')
                ->join('auteur', function ($join) {
                    $join->on('document.id_auteur', '=', 'auteur.id')
                        ->where('auteur.id', '=', Input::get('auteur'));
                })
                ->join('categories', function ($join) {
                    $join->on('document.id_categories', '=', 'categories.id')
                        ->where('categories.id', '=', Input::get('categorie'));
                })->get();
        }
        $auteurid = Input::get('auteur');
        $categorieid = Input::get('categorie');




        //  var_dump($documents);
        //die();
        //$documents  = Documents::all();
        $secteurs = Auteur::all();
        $rubriques = Categories::all();
        $projets = null;
        $documents_id  =0;
        return view('user.front.index',compact('documents','commentaire','titres','titredoc','documents_id','secteurs','projets','rubriques','auteurid','categorieid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function viewer(){
        $tt = Input::get('filepath');
        dd($tt);
        return view('user.front.viewer');
}
    public function commentaire(){
        $data['id_document'] = Input::get('iddocument');
        $data['username'] = Input::get('iduser');
        $data['text'] = Input::get('commentuser');

        Comment::create($data);
        return redirect('front');
    }
}
