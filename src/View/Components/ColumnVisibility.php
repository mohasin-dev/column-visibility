<?php

namespace MohasinDev\ColumnVisibility\View\Components;

use Illuminate\View\Component;
use MohasinDev\ColumnVisibility\Models\ColumnPreference;

class ColumnVisibility extends Component
{
    public string $tableKey;
    public string $tableId;

    public function __construct(string $tableKey, string $tableId = 'dataTable')
    {
        $this->tableKey = $tableKey;
        $this->tableId = $tableId;
    }

    public function render()
    {
        $hiddenColumns = ColumnPreference::where('user_id', auth()->id())
            ->where('table_key', $this->tableKey)
            ->pluck('hidden_columns')
            ->first();

        return view('column-visibility::components.column-visibility', [
            'hiddenColumns' => $hiddenColumns ?? [],
            'tableId' => $this->tableId
        ]);
    }
}
