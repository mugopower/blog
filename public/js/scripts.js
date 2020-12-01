$(document).ready( function () {
    $('#postTable').DataTable({
        paging : true,
        "lengthMenu": [[ 10, 20, 50, 100],[ 10, 20, 50, 100]],
        'sDom': 'lrtip',
        columnDefs: [
            { orderable: false, "targets": 4 }
        ],
        "dom":'<"search"fl><"top">rt<"bottom"ip><"clear">',
    });


    $(".delete-post").off("click");
    $(".delete-post").on("click", function (){
        var url = $(this).attr("data-url");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = url;
            }
        })
    })



} );
