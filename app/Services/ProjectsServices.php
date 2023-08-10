<?php

namespace App\Services;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
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
        $rol = DB::table('projects_users')->where('project_id',$datos['project_id'])->where('user_id',$datos['user_id'])->update(['role_id'=>$datos['role_id']]);
        return response()->json([
            'message'=>'Rol agregado correctamente',
            'status'=>$rol
        ]);
    }
}