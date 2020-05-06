var skills = {
    container: function () {
        return $('#skills');
    },
    load: function () {
        $('#tbl-skills').DataTable({
            "pageLength": 25,
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            "order": [[1, "desc"]],
            "dom": 'Bfrtip',
            "buttons": [
                'pageLength', 'csv', 'excel', 'pdf'
            ]
        });
    }
}