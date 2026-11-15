<?php

namespace App\Controllers;

use App\Models\Biome;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class BiomeController extends BaseController
{
    public function index(Request $request): Response
    {
        return $this->html(['biomes' => Biome::getAll(orderBy: 'id')]);
    }

    public function add(Request $request): Response
    {
        $biome = new Biome();

        if ($request->isPost()) {
            $biome->setFromRequest($request);
            $biome->save();
            return $this->redirect($this->url('biome.index'));
        }

        return $this->html(['biome' => $biome, 'heading' => 'Add biome'], 'form');
    }

    public function edit(Request $request): Response
    {
        $biome = Biome::getOne($request->value('id'));
        if ($biome === null) {
            throw new HttpException(404, 'Biome not found');
        }

        if ($request->isPost()) {
            $biome->setFromRequest($request);
            $biome->save();
            return $this->redirect($this->url('biome.index'));
        }

        return $this->html(['biome' => $biome, 'heading' => 'Edit biome'], 'form');
    }

    public function delete(Request $request): Response
    {
        $biome = Biome::getOne($request->post('id'));
        if ($biome === null) {
            throw new HttpException(404, 'Biome not found');
        }
        if (count($biome->getMonsters()) > 0) {
            throw new HttpException(400, 'Biome still has monsters');
        }

        $biome->delete();
        return $this->redirect($this->url('biome.index'));
    }
}
