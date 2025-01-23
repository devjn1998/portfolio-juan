<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;

class EventController extends Controller
{
    public function index()
    {

        $projects = Project::with('technologies')->get();
        return view('welcome', ['projects' => $projects]);
    }

    public function projetos()
    {
        $projects = Project::with('technologies')->get();
        return view('projetos', ['projects' => $projects]);
    }

    public function createSkills()
    {
        return view('events.createSkills');
    }

    public function createProject()
    {
        $jsonFilePath = public_path('json/technologies.json');
        if (!file_exists($jsonFilePath)) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao carregar tecnologias'
            ], 500);
        }
        $jsonContent = file_get_contents($jsonFilePath);

        if ($jsonContent === false) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao carregar o arquivo'
            ], 500);
        }
        $technologiesData = json_decode($jsonContent, true)['technologies'];

        $technologies = collect($technologiesData)->map(function ($techData) {
            return new Technology($techData);
        });

        return view('Events.createProject', compact('technologies'));
    }
    public function contactRoute()
    {
        return view('contact');
    }

    public function store(Request $request)
    {


        $projects = new Project;
        $projects->title = $request->title;
        $projects->description = $request->description;
        $projects->urlsite = $request->urlsite;
        $projects->urlrepository = $request->urlrepository;

        // logica da imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName()) . strtotime('now') . '.' . $extension;
            $requestImage->move(public_path('img/events'), $imageName);
            $projects->image = $imageName;
        }

        // logica da imagem do gif
        if ($request->hasFile('imagegif') && $request->file('imagegif')->isValid()) {
            $requestGif = $request->imagegif;
            $extension = $requestGif->extension();
            $gifName = md5($requestGif->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $requestGif->move(public_path('img/events/gifs'), $gifName);
            $projects->imagegif = $gifName;
        }

        $projects->save();

        $selectedTechnologies = $request->input('technologies', []);
        if ($selectedTechnologies) {
            $technologies = collect([]);
            foreach ($selectedTechnologies as $technologyName) {
                $technology = Technology::firstOrCreate(['name' => $technologyName]);

                if ($technology) {
                    $technologies->push([
                        'id' => $technology->id,
                        'name' => $technology->name,
                        'category' => $technology->category,
                        'icon_path' => $technology->icon_path
                    ]);
                }
            }
            $projects->technologies()->sync($technologies->pluck('id'));
        }
        return redirect('/')->with('msg', 'Projeto salvo com sucesso');

    }
    public function projetoPorId($id = null)
    {
        $project = Project::find($id);
        if (!$project) {
            abort(404, 'Projeto não encontrado');
        }
        return view('projetos', ['project' => $project]);
    }

    public function projetoPorIdcomJson($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return response()->json(['error' => 'Projeto não encontrado'], 404);
        }
        return response()->json([
            'title' => $project->title,
            'description' => $project->description,
            'image' => $project->image,
            'imagegif' => asset('img/events/gifs/' . $project->imagegif),
            'urlsite' => $project->urlsite,
            'urlrepository' => $project->urlrepository,
            'technologies' => $project->technologies
        ]);
    }

    public function todasTecnologiasJson()
    {

        $jsonFilePath = public_path('json/technologies.json');
        $jsonContent = file_get_contents($jsonFilePath);
        $technologies = json_decode($jsonContent, true);
        if (!$technologies || !isset($technologies['technologies'])) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao carregar tecnologias'
            ], 500);
        }

        return response()->json([
            'sucess' => true,
            'technologies' => $technologies['technologies']
        ]);
    }

    public function todasTecnologias($id)
    {
        $project = Project::find($id);
        if (!$project) {
            abort(404, 'Projeto não encontrado');
        }
        $jsonFilePath = public_path('json/technologies.json');
        if (!file_exists($jsonFilePath)) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao carregar tecnologias'
            ], 500);
        }
        $jsonContent = file_get_contents($jsonFilePath);

        if ($jsonContent === false) {
            return response()->json([
                'success' => false,
                'message' => 'Erro ao carregar o arquivo'
            ], 500);
        }
        $technologiesData = json_decode($jsonContent, true)['technologies'];

        $technologies = collect($technologiesData)->map(function ($technologyData) {
            return new Technology($technologyData);
        });

        return view('projetos', ['project' => $project, 'technologies' => $technologies]);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['success' => true]);
    }
}
