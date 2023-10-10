<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{


    public function index()
    {

        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
        /*con compact creo un array di oggetti "project" 
                e vengono associati i valori degli oggetti del db*/
    }

    public function show($id)
    {
        /*seleziono ilo singolo elemento nel db tramite il suo id
         o restituisco errore 404*/
        $project = Project::findOrFail($id);

        return view("admin.projects.show", compact("project"));
    }


    /*reindirizzo al form di creazione */

    public function create()
    {
        return view("admin.projects.create");
    }


    /*invio i dati al db attraverso un istanza del model*/

    public function store(ProjectStoreRequest $request)
    {
        $data = $request->validated();

        $counter = 0;

        do {
            // genero uno slug univoco per poter recuperare un elemento senza scrivere l'id nell'url (finezza estetica)

            $slug = Str::slug($data["title"]) . ($counter > 0 ? "-" . $counter : "");

            // cerco se esiste già un elemento con questo slug
            $alreadyExists = Project::where("slug", $slug)->first();

            $counter++;
        } while ($alreadyExists); // finché esiste già un elemento con questo slug, ripeto il ciclo per creare uno slug nuovo

        $data["slug"] = $slug;


        /*carico il file del Public Storage nel $data*/
        $data["image"]= Storage::put("projects",$data["image"]);

        /*Per salvare l'immagine in un disco diverso da quello di default usiamo il
        metodo Storage::disk('nome') 
        
            $img_path = Storage::disk('public')->put('uploads', $data['image']);

        */

        $project = Project::create($data);/*il comando create esegue sia il fill che il save*/

        return redirect()->route("admin.projects.show", $project->id);
        dump($data);
    }


    /* richiamo il progetto dal database e ne modifico i valori nella pagina edit */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view("admin.projects.edit", ["project" => $project]);
    }


    /* aggiorno il progetto dal database e reindirizzo a show */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
        $data = $request->all();

        $project->update($data);

        return redirect()->route('admin.projects.show', $project->id);
    }


    /* elimino il progetto dal database e reindirizzo a index */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
