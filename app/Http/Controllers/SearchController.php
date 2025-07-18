<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gundam;
use App\Models\Organization;
use App\Models\Pilot;
use App\Models\GruntSuit;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query', '');
        $pilotId = $request->input('pilot');
        $gundamId = $request->input('gundam');
        $gruntId = $request->input('grunt');
        $organizationId = $request->input('organization');

        $gundamsQuery = Gundam::with('organization', 'pilots');
        $gruntsQuery = GruntSuit::with('organization', 'pilots');

        if ($query) {
            $gundamsQuery->where('name', $query);
            $gruntsQuery->where('name', $query);
        }

        if ($pilotId) {
            $gundamsQuery->whereHas('pilots', function($q) use ($pilotId) {
                $q->where('pilot_id', $pilotId);
            });
            $gruntsQuery->whereHas('pilots', function($q) use ($pilotId) {
                $q->where('pilot_id', $pilotId);
            });
        }

        if ($gundamId) {
            $gundamsQuery->where('id', $gundamId);
            $gruntsQuery->where('id', 0); 
        }

        if ($gruntId) {
            $gruntsQuery->where('id', $gruntId);
            $gundamsQuery->where('id', 0); 
        }

        if ($organizationId) {
            $gundamsQuery->where('organization_id', $organizationId);
            $gruntsQuery->where('organization_id', $organizationId);
        }

        $gundams = $gundamsQuery->get();
        $grunts = $gruntsQuery->get();

        $merged = $gundams->concat($grunts);

        $page = $request->input('page', 1);
        $perPage = 15;
        $offset = ($page * $perPage) - $perPage;

        $itemsForCurrentPage = $merged->slice($offset, $perPage);
        $paginatedItems = new \Illuminate\Pagination\LengthAwarePaginator(
            $itemsForCurrentPage,
            $merged->count(),
            $perPage,
            $page,
            ['path' => Paginator::resolveCurrentPath()]
        );

        return view('search.results', [
            'items' => $paginatedItems,
            'query' => $query,
            'pilots' => Pilot::all(),
            'gundamsFilter' => Gundam::all(),
            'gruntsFilter' => GruntSuit::all(),
            'organizations' => Organization::all(), 
        ]);
    }

    public function details($id)
    {
        $gundam = Gundam::with('organization', 'pilots')->find($id);
        $gruntSuit = GruntSuit::with('organization', 'pilots')->find($id);

        $item = $gundam ?? $gruntSuit;

        if (!$item) {
            abort(404, 'Item not found');
        }

        return view('details.view', [
            'item' => $item,
            'pilots' => Pilot::all(),
            'gundamsFilter' => Gundam::all(),
            'gruntsFilter' => GruntSuit::all(), 
            'organizations' => Organization::all(),
        ]);
    }

}
