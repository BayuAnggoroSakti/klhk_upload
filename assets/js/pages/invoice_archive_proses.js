/* ------------------------------------------------------------------------------
*
*  # Invoice archive
*
*  Specific JS code additions for invoice_archive.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {


    // Table setup
    // ------------------------------

    // Initialize
    $('.invoice-archive-proses').DataTable({
        autoWidth: true,
        columnDefs: [
            {
                // width: '30px',
                targets: [1,2,3,4,5,6,7,8,9],
                orderable: false
            },
            {
                visible: false,
                targets: 1,
                orderable: false
            },
            { 
                orderable: false,
                width: '5px',
                targets: 0
            }
            // {
            //    // width: '15%',
            // //     targets: [4, 5],
            // //     orderable: false
            // },
            // {
            //     // width: '15%',
            //     targets: 6,
            //     orderable: false
            // }
            // {
            //     width: '15%',
            //     targets: 3,
            //     orderable: false
            // }
        ],
        order: [[ 0, 'asc' ]],
        dom: '<"datatable-header"fl><"datatable-scroll-lg"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        lengthMenu: [ 25, 50, 75, 100 ],
        displayLength: 25,
        drawCallback: function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="active border-double"><td colspan="9" class="text-semibold text-semibold text-danger"> KODE TENDER : '+group+'</td></tr>'
                    );
 
                    last = group;
                }
            });

            $('.select').select2({
                width: '150px',
                minimumResultsForSearch: "-1"
            });

            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function(settings) {
            $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
            $('.select').select2('destroy');
        }
    });



    // External table additions
    // ------------------------------

    // Add placeholder to the datatable filter option
    $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');


    // Enable Select2 select for the length option
    $('.dataTables_length select').select2({
        minimumResultsForSearch: "-1"
    });

});
