<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Http\Requests\Server\ReserveRequest;
use App\Libs\Query\FindAllQueryChain;
use App\Libs\Query\FindOneQueryChain;
use App\Models\Reserve;
use App\Models\ReserveItem;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    function index(Request $request) {
        $query = ReserveItem::resolve($request->query());
        if (!$request->has('page')) return $query->get();
        return $query->paginate($request->query('size', 20), ['*'], 'page', $request->query('page', 1));
    }

    function show(Request $request, Reserve $reserve) {
        $chain = new FindOneQueryChain($reserve, $request->query());
        return $chain->handle();
    }

    function store(ReserveRequest $request) {
        return Reserve::create($request->validated());
    }

    function update(ReserveRequest $request, Reserve $reserve) {
        $reserve->fill($request->validated());
        $reserve->save();
        return $reserve->refresh();
    }

    function destroy(Reserve $reserve) {
        $reserve->delete();
        return $reserve;
    }
}
