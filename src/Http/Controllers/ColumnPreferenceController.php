<?php

namespace MohasinDev\ColumnVisibility\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use MohasinDev\ColumnVisibility\Models\ColumnPreference;

class ColumnPreferenceController extends Controller
{
    public function get($tableKey)
    {
        $pref = ColumnPreference::where('user_id', auth()->id())
            ->where('table_key', $tableKey)
            ->first();

        return response()->json($pref?->hidden_columns ?? []);
    }

    public function save(Request $request)
    {
        $data = $request->validate([
            'table_key' => 'required|string',
            'hidden_columns' => 'nullable|array'
        ]);

        if (! isset($data['hidden_columns'])) {
            ColumnPreference::where(['user_id' => auth()->id(), 'table_key' => $data['table_key']])->delete();
            return response()->json(['status' => 'saved']);
        }

        ColumnPreference::updateOrCreate(
            ['user_id' => auth()->id(), 'table_key' => $data['table_key']],
            ['hidden_columns' => $data['hidden_columns']]
        );

        return response()->json(['status' => 'saved']);
    }
}
