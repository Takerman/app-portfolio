var skills = {
    container: function () {
        return $('#skills');
    },
    load: function () {
        $.get('https://docs.google.com/spreadsheets/d/1zjgE1PTWX42fH4eoIMzhvRhUyyYjhJ3a50YqfbZy5dk/gviz/tq?tqx=out:html&tq&gid=1556567716&range=A2:B35', function (data) {
            skills.container().html(data);
        });

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