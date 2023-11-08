@section('js')
    <script>
        $(document).ready(function() {
            $('#select2').select2();
            $('.myTable').DataTable({
                dom: 'lBfrtip',
                buttons: [{
                    extend: 'print',
                    text: 'Print',
                    messageBottom: ' <strong>Paint Line.</strong>'
                },
                    {
                        extend: 'copy',
                        text: 'Copy'
                    },
                    {
                        extend: 'excel',
                        text: 'Excel'
                    },
                    {
                        extend: 'colvis',
                        text: 'Column Visibility'
                    }

                ],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
            });
        });
    </script>
@endsection
