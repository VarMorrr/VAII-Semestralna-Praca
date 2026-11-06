<?php

namespace App\Controllers;

use App\Models\Monster;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class MonsterController extends BaseController
{
    public function index(Request $request): Response
    {
        return $this->html(['monsters' => Monster::getAll(orderBy: 'id')]);
    }

    public function add(Request $request): Response
    {
        $monster = new Monster();

        if ($request->isPost()) {
            $monster->setFromRequest($request);
            $monster->save();
            return $this->redirect($this->url('monster.index'));
        }

        return $this->html(['monster' => $monster, 'heading' => 'Add monster'], 'form');
    }

    public function edit(Request $request): Response
    {
        $monster = Monster::getOne($request->value('id'));
        if ($monster === null) {
            throw new HttpException(404, 'Monster not found');
        }

        if ($request->isPost()) {
            $monster->setFromRequest($request);
            $monster->save();
            return $this->redirect($this->url('monster.index'));
        }

        return $this->html(['monster' => $monster, 'heading' => 'Edit monster'], 'form');
    }

    public function delete(Request $request): Response
    {
        $monster = Monster::getOne($request->post('id'));
        if ($monster === null) {
            throw new HttpException(404, 'Monster not found');
        }

        $monster->delete();
        return $this->redirect($this->url('monster.index'));
    }
}
