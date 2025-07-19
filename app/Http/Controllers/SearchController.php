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
            $gundamsQuery->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                ->orWhereHas('pilots', function ($sub) use ($query) {
                    $sub->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('organization', function ($sub) use ($query) {
                    $sub->where('name', 'like', '%' . $query . '%');
                });
            });

            $gruntsQuery->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                ->orWhereHas('pilots', function ($sub) use ($query) {
                    $sub->where('name', 'like', '%' . $query . '%');
                })
                ->orWhereHas('organization', function ($sub) use ($query) {
                    $sub->where('name', 'like', '%' . $query . '%');
                });
            });
        }

        if ($pilotId) {
            $gundamsQuery->whereHas('pilots', function ($q) use ($pilotId) {
                $q->where('pilot_id', $pilotId);
            });
            $gruntsQuery->whereHas('pilots', function ($q) use ($pilotId) {
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

        $gundams = $gundamsQuery->get()->keyBy(function ($g) {
            return 'gundam-' . $g->id;
        })->map(function ($g) {
            $g->type = 'gundam';
            return $g;
        });

        $grunts = $gruntsQuery->get()->keyBy(function ($g) {
            return 'grunt-' . $g->id;
        })->map(function ($g) {
            $g->type = 'grunt';
            return $g;
        });

        $merged = $gundams->merge($grunts)->values();   

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

    public function details($type, $id)
    {
        if ($type === 'gundam') {
            $item = Gundam::with('organization', 'pilots')->find($id);
        } elseif ($type === 'grunt') {
            $item = GruntSuit::with('organization', 'pilots')->find($id);
        } else {
            abort(404, 'Invalid item type');
        }

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
