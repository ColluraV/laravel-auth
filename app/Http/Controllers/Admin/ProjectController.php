<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){

        $projects = Project::all();

        return view("admin.projects.index",compact("projects"));
            /*con compact creo un array di oggetti "project" 
                e vengono associati i valori degli oggetti del db*/
    }

    public function show($id){
         /*seleziono ilo singolo elemento nel db tramite il suo id
         o restituisco errore 404*/
        $project=Project::findOrFail($id);

        return view("admin.projects.show", compact("project"));


    }
        /*reindirizzo al form di creazione */
    public function create(){
        return view("admin.projects.create");
    }
        /*invio i dati al db attraverso un istanza del model*/
    public function store(Request $request){
        $data = $request->validate([
            "title" => "required|max:55",
            "url_link" => "required",
        ]);
        $project = Project::create($data);

        return redirect()->route("admin.projects.show", $project->id);
    }
}
