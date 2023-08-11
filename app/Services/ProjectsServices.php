<?php

namespace App\Services;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ProjectsServices{
    public function getProjects(): JsonResponse{
        $data = [
            'projects'=>Project::with(['user' => function($q){
                $q->select('id','name');
            }])->get(),
        ];
        return response()->json($data);
    }

    public function createProject($datos): JsonResponse {
        $project = Project::create([
            'name'=>$datos['name'],
            'repo'=>$datos['repo'],
            'privacy'=>$datos['privacy'],
            'status'=>$datos['status'],
            'limit_requets'=>$datos['limit_requets'],
            'user_id'=>$datos['user_id'],
            'created_at'=>$datos['created_at'],
        ]);
        return response()->json($project);
    }

    public function addRoleProject($datos): JsonResponse{
        $user = User::find($datos['user_id']);
        $project = Project::find($datos['project_id']);

        if($user && $project){
            $user->projects()->updateExistingPivot($project->id,['role_id' => $datos['role_id']]);
        }
        
        return response()->json([
            'message'=>'Rol agregado correctamente',
            
        ]);
    }

    public function addTechsProject($datos){
        $project = Project::findOrFail($datos['project_id']);
        $project->technologies()->syncWithoutDetaching($datos['technology_id']);
        return response()->json([
            'message'=>'Roles agregados correctamente',
            'projecto'=>$project
        ]);
    }
}