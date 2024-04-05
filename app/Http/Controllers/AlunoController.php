<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Response;
use App\Http\Requests\AlunoRequest;
use Illuminate\Database\Eloquent\Collection;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return Aluno::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AlunoRequest $request
     * @return Response
     */
    public function store(AlunoRequest $request): Response
    {
        return response(Aluno::create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Aluno $aluno
     * @return Aluno
     */
    public function show(Aluno $aluno): Aluno
    {
        return $aluno;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AlunoRequest $request
     * @param  Aluno $aluno
     * @return Aluno
     */
    public function update(AlunoRequest $request, Aluno $aluno): Aluno
    {
        $aluno->update($request->all());

        return $aluno;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Aluno $aluno
     * @return array
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return [];
    }
}
