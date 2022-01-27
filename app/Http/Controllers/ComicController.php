<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        // dump($comics);

        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dump($data);

        // Inserimento nel DB_DATABASE
        $new_comic = new Comic();

        // Generazione slug
        $data['slug'] = Str::slug($data['title'], '-');

        // mass assignment 
        $new_comic->fill($data); //Fare fillable nel model

         $new_comic->save();

        //  redirect verso pagina dettaglio
        return redirect()->route('comics.show', $new_comic->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // $comic = new Comic();
        // $comic = Comic::find($id);
        // dump($comic);

        $comic = Comic::where('slug', $slug)->first(); //in caso di doppione, vuol dire che prende il primo che trova

        if($comic) {
            return view('comics.show', compact('comic'));
        }
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Ottenere il fumetto da aggiornare
        $comic = Comic::find($id);

        // Passare il fumetto specifico alla form di edit
        if($comic) {
            return view('comics.edit', compact('comic'));
        }
        abort(404);
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
        // colleziono dati che arrivano dal form
        $data = $request->all();

        // 1.Ottenere il record da aggiornare 
        $comic = Comic::find($id);

        // 2. Aggiornare le colonne e salvare i dati a db
        $data['slug'] = Str::slug($data['title'], '-'); // Adattiamo slug nel caso qualcuno modifichi il title
        $comic->update($data); //save() not require

        // redirect verso pagina dettaglio aggiornato
        return redirect()->route('comics.show', $comic->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Prende il record con l'id selezionato
        $comic = Comic::find($id);
        // Cancella il record selezionato
        $comic->delete();
        // Redirect verso pagina gallery
    return redirect()->route('comics.index')->with('delete', $comic->title);
    }
}