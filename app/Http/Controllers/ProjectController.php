<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectController extends Controller
{/*restituisce la pagina principale*/
    public function index() {
        $projects= Project::all();

        return view("admin.projects.index", compact("projects"));
    }

}
