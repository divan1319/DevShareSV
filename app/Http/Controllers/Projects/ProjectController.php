<?php

namespace App\Http\Controllers\Projects;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProjectRequest;
use App\Services\ProjectsServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projects;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public  function index(ProjectsServices $projects_services){
        $res = $projects_services->getProjects();
        return $res;
    }

    public function CrearProyecto(CreateProjectRequest $createProjectRequest,ProjectsServices $projects_services){
        $data = $createProjectRequest->validated();
        $res = $projects_services->createProject($data);
        return $res;     
    }

    public function AgregarRolProyecto(Request $request, ProjectsServices $projects_services){
        $res = $projects_services->addRoleProject($request);
        return $res;
    }

}
