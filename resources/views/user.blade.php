@extends('layouts.simple')
@section('title', 'Profile')
@section('content')

<section class="profile">
    <div class="content">
        <!-- Simple -->
        <h4 style="color: #707070; !important;">USER</h4>
        <div class="block block-rounded block-bordered text-center">
            <div class="block-content">
            <div id="wrapper" class="table-responsive infinity-scrolling-wrapper">
                        <table id="table_form" class="table table-bordered table-striped table-vcenter" style="width:100%">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody id="content">
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>   

    </div>

</section>


<!-- END Page Content -->
<script type="text/javascript">

$( document ).ready(function() {

loadtable();

function loadtable(){
    loaderOn();
    var table = jQuery('#table_form').dataTable({
        processing: true,
        serverSide: true,
        aaSorting:[[1,'desc']],
        columnDefs: [{ 
                    orderable: false, 
                    targets: [-1]
                }],
        ajax: {
            url: "/user-list/data",
            type: 'GET',
            data: function (d) {
                d.exchange = '';
            }
        },
        columns: [
                {
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                },
                { data: 'Nama', "bSortable": false, name: 'Nama', defaultContent: "" },
                { data: 'Phone', "bSortable": false, name: 'Phone', defaultContent: "" },
                { data: 'Email', "bSortable": false, name: 'Email', defaultContent: "" },
            ],
    });

    loaderOff();
    // hide Search Datatable
    $('.dataTables_filter').addClass('d-none');
}
});

</script>
@endsection