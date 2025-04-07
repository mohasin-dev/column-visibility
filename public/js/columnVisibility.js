function initColumnVisibility({ tableId, tableKey, fetchUrl, saveUrl, csrf }) {
    let table = $(`#${tableId}`).DataTable();

    $.get(fetchUrl, function (hiddenCols) {
        hiddenCols.forEach(index => table.column(index).visible(false));
    });

    table.on('column-visibility.dt', function () {
        let hidden = [];
        table.columns().every(function (index) {
            if (!this.visible()) hidden.push(index);
        });

        $.post(saveUrl, {
            _token: csrf,
            table_key: tableKey,
            hidden_columns: hidden
        });
    });
}

window.buildColumnDefs = function(classNameTargets = []) {
    let columnDefs = [];

    if (typeof HIDDEN_COLUMNS !== 'undefined') {
        HIDDEN_COLUMNS.forEach(index => {
            columnDefs.push({ targets: index, visible: false });
        });
    }

    if (classNameTargets.length > 0) {
        columnDefs.push({
            className: "text-center",
            targets: classNameTargets
        });
    }

    return columnDefs;
};
