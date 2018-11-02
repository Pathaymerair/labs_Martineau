<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Icon;
use App\State;
use ImageIntervention;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectUpdateRequest;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        $icons = Icon::all();
        return view('pages.projectCreate', compact('projects', 'icons'));
    }
    public function create(ProjectRequest $request){
        $project = new Project;
        $project->projectTitre = $request->projectTitre;
        $project->projectDesc = $request->projectDesc;
        $project->icon_id = $request->icon_id;
        if ($request->file('projectImg')){

            $images= $request->file('projectImg');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(60, 60);
            $resized->save('img/projects/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images);
            $resize->save('img/projects/nm/'.$filename);

            $project->projectImg = $filename;
            $project->projectThumb = $filenamethumb;
        } 
        $project->save();
        return redirect()->back()->with('success', 'Project created !');
        }
    
    public function indexDeux(){
        $projects = Project::all();
        $icons = Icon::all();
        return view('pages.projects', compact('projects', 'icons'));
        }
    
    public function edit($id){
        $project = Project::find($id);
        $states = State::all();
        $icons = Icon::all();
        return view('pages.projectEdit', compact('project', 'icons', 'states'));
    }

    public function update(ProjectUpdateRequest $request, $id){
        $project = Project::find($id);
        $project->projectTitre = $request->projectTitre;
        $project->projectDesc = $request->projectDesc;
        $project->icon_id = $request->icon_id;
        if ($request->file('projectImg')){

            $images= $request->file('projectImg');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(60, 60);
            $resized->save('img/projects/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images);
            $resize->save('img/projects/nm/'.$filename);

            $project->projectImg = $filename;
            $project->projectThumb = $filenamethumb;
        } 
        $project->state_id = $request->state_id;
        $project->save();
        return redirect('/projects')->with('success', 'Project updated!');
        }

        public function archive($id){
            $project = Project::find($id);
            $project->state_id = 3;
            $project->save();
            return redirect()->back()->with('ded', 'project deleted !');
        }
    }

