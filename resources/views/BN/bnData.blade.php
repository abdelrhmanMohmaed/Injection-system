 <!-- /.box-header -->
    <div class="box-body table-responsive">
        <table class="table table-striped table-bordered dataTable table-hover myTable">
            <thead>
            <tr>
                <th>M.No</th>
                <th>Part No</th>
                <th>BN</th>
                <th>Comment</th>
                <th>User</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody >
            @foreach($bns as $bn)
                <tr id="{{$bn->id}}" name="{{$bn->id}}">
                    <td>{{$bn->machine_id}}</td>
                    <td>{{$bn->part->part_no}}</td>
                    <td onclick="getParameters('{{$bn->id}}')" style="cursor: pointer"
                    ><span class="label label-info">{{$bn->id}}</span></td>
                    <td>{{$bn->comment}}</td>
                    <td>{{$bn->user->name}}</td>
                    <td>{{$bn->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
 <script>
     $(document).ready(function () {
         $('.myTable').DataTable({
             dom: 'lBfrtip',
             buttons: [
                 {extend: 'print', text: 'Print', messageBottom: ' <strong>Paint Line.</strong>'},
                 {extend: 'copy', text: 'Copy'},
                 {extend: 'excel', text: 'Excel'},
                 {extend: 'colvis', text: 'Column Visibility'}

             ],
             "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
         });
     });
     </script>
