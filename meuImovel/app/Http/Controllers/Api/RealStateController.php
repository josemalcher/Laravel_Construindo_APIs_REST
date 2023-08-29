<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RealStateRequest;
use App\Models\RealState;
// use Illuminate\Http\Request;

class RealStateController extends Controller
{

    private $realState;

    public function __construct(RealState $realState)
    {
        $this->realState = $realState;
    }

    public function index()
    {
        $realState = $this->realState->paginate('10');

        return response()->json($realState, 200);
    }

    public function show($id)
    {
        try {

            $realState = $this->realState->findOrFail($id);

            return response()->json([
                'data' => $realState
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 401]);
        }
    }

    public function store(RealStateRequest $request)
    {
        $data = $request->all();
        try {

            $this->realState->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'Imóvel Cadastrado com Sucesso'
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 401]);
        }
    }

    public function update($id, RealStateRequest $request)
    {
        $data = $request->all();

        try {

            $realState = $this->realState->findOrFail($id);

            $realState->update($data);

            return response()->json([
                'data' => [
                    'msg' => 'Imóvel Atualizado com Sucesso'
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 401]);
        }
    }

    public function destroy($id)
    {
        try {

            $realState = $this->realState->findOrFail($id);

            $realState->delete();

            return response()->json([
                'data' => [
                    'msg' => 'Imóvel Removido com Sucesso'
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 401]);
        }
    }
}
