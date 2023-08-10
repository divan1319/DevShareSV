<?php

namespace App\Services;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

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
}