<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project as ModelsProject;
use App\Models\ProjectPictures;
use App\Models\ProjectStack;

class Project extends Controller
{
    public function index($any)
    {
        if ($any === 'all') {
            $get = ModelsProject::all();
        } else {
            $get = ModelsProject::where('id_based', $any)->get();
        }
        $num = count($get);

        $response['data'] = [];
        if ($num > 0) {
            foreach ($get as $row) {
                $response['data'][] = [
                    'id_project' => my_encrypt($row->id_project),
                    'title'      => $row->judul,
                    'category'   => $row->toBased->nama,
                    'image'      => asset_upload('picture/' . $row->gambar),
                ];
            }
        }

        return response()->json(
            $response,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    public function detail($id)
    {
        $get_project         = ModelsProject::find(my_decrypt($id));
        $get_project_stack   = ProjectStack::where('id_project', my_decrypt($id))->get();
        $get_project_picture = ProjectPictures::where('id_project', my_decrypt($id))->get();

        $project_stack = [];
        foreach ($get_project_stack as $key => $value) {
            $project_stack[] = $value->toStack->nama;
        }

        $project_picture = [];
        foreach ($get_project_picture as $key => $value) {
            $project_picture[] = asset_upload('picture/' . $value->picture);
        }

        $response['data'] = [
            'category'    => $get_project->toBased->nama,
            'title'       => $get_project->judul,
            'description' => $get_project->deskripsi,
            'stacks'      => implode(', ', $project_stack),
            'pictures'    => $project_picture,
        ];

        return response()->json(
            $response,
            200,
            ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }
}
