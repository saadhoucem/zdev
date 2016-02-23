<?php

namespace App\Http\Controllers;
use App\Auteur;
use App\Categories;
use App\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PDF2Text;
use App\Filetotext;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //
        $documents = DB::table('document')
            ->join('categories', 'categories.id', '=', 'document.id_categories')
            ->join('auteur', 'auteur.id', '=', 'document.id_auteur')
            ->select('*')
            ->get();
      //  var_dump($documents);
        //die();
        //$documents  = Documents::all();
        $documents_id  =0;
        return view('admin.document.index',compact('documents','documents_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categories::all();
        $auteurs = Auteur::all();
        return view('admin.document.create',compact('categories','auteurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\DocumentValidation $request)
    {
        $document = new Documents();
        $document->titre = $request->get('titre');
        $document->pathfile = $request->file('fichier')->getClientOriginalName();
        $document->pathimg = $request->file('image')->getClientOriginalName();
        $document->id_categories = $request->get('categorie_id');
        $document->id_auteur = $request->get('auteur_id');
        $request->file('image')->move(
            base_path() . '/public/images/',$document->pathimg
        );
        $request->file('fichier')->move(
            base_path() . '/public/documents/', $document->pathfile
        );

       $extension =  $request->file('fichier')->getClientOriginalExtension();

        $docObj = new Filetotext(base_path() . '/public/documents/'.$document->pathfile);
        $return = $docObj->convertToText();

        $document->contenu =$return ;
        $document->save();
       // echo $return;
       // die();
/*
        switch($extension){
            case '.pdf':
                $docObj = new Filetotext(base_path() . '/public/documents/'.$document->pathfile);
                $return = $docObj->convertToText();
                 // insert data to bd

                break;
            case 'doc':
                $docObj = new Filetotext(base_path() . '/public/documents/'.$document->pathfile);
                $return = $docObj->convertToText();

                // insert return to db
                break;

            case  'excel':

                // insert reeturn to db
                break;

            case 'ppt':

                // insert return to db
                break;

        }
        */

        return redirect('document');

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

   public  function ExtractTextFromPdf ($pdfdata) {
        if (strlen ($pdfdata) < 1000 && file_exists ($pdfdata)) $pdfdata = file_get_contents ($pdfdata); //get the data from file
        if (!trim ($pdfdata)) echo "Error: there is no PDF data or file to process.";
        $result = ''; //this will store the results
        //Find all the streams in FlateDecode format (not sure what this is), and then loop through each of them
        if (preg_match_all ('/<<[^>]*FlateDecode[^>]*>>\s*stream(.+)endstream/Uis', $pdfdata, $m)) foreach ($m[1] as $chunk) {
            $chunk = gzuncompress (ltrim ($chunk)); //uncompress the data using the PHP gzuncompress function
            $chunk = iconv ('UTF-8', 'ASCII//TRANSLIT', $chunk); //suggested in comments to code above to remove junk characters
            //If there are [] in the data, then extract all stuff within (), or just extract () from the data directly
            $a = preg_match_all ('/\[([^\]]+)\]/', $chunk, $m2) ? $m2[1] : array ($chunk); //get all the stuff within []
            foreach ($a as $subchunk) if (preg_match_all ('/\(([^\)]+)\)/', $subchunk, $m3)) $result .= join ('', $m3[1]); //within ()
        }
        else echo "Error: there is no FlateDecode text in this PDF file that I can process.";
        return $result; //return what was found
    }
}
