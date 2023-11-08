<div class="box-body table-responsive">
    <table class="table table-striped table-bordered dataTable table-hover myTable">
        <thead>
        <tr>
            <th>M.No</th>
            <th>Part No</th>
            <th>BN</th>
            <th>Counter</th>
            <th>IO</th>
            <th>NIO</th>
            <th>Cav</th>
            <th>Cycle Time</th>
            <th>Shift</th>
            <th>Type</th>
            <th>User</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr id="{{$post->id}}" name="{{$post->id}}">
                <td>{{$post->machine_id}}</td>
                <td>{{$post->part->part_no}}</td>
                <td onclick="getParameters('{{$post->bn_id}}')" style="cursor: pointer"
                ><span class="label label-info">{{$post->bn_id}}</span></td>
                <td>{{$post->counter}}</td>
                <td>{{$post->io}}</td>
                <td>{{$post->nio}}</td>
                <td>{{$post->cav}}</td>
                <td>{{$post->cycle_time}}</td>
                <td>{{$post->shift}}</td>
                <td>{{\App\Helper\PostType::getType($post->type)}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
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
