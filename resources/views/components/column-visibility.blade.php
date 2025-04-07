<script>
    window.HIDDEN_COLUMNS = @json($hiddenColumns);

    document.addEventListener("DOMContentLoaded", function () {
        initColumnVisibility({
            tableId: '{{ $tableId }}',
            tableKey: '{{ $tableKey }}',
            fetchUrl: '{{ url("/preferences/" . $tableKey) }}',
            saveUrl: '{{ url("/preferences/save") }}',
            csrf: '{{ csrf_token() }}'
        });
    });
</script>

<script src="{{ asset('vendor/column-visibility/columnVisibility.js') }}"></script>
