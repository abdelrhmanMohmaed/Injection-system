@section('css')

@endsection
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th class="text-center" colspan="3">Monitoring</th>
        <th class="text-center">Tol+/-</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Injection time</td>
        <td><input name="monitoring[injection_time]" class="input-width"></td>
        <td>sec</td>
        <td>10</td>
    </tr>
    <tr>
        {{--@if($machine->type=='Engel')--}}
        <div v-if="post.machine.type=='Engel'">
            <td>Plasticizing time</td>
            <td><input name="monitoring[plasticizing_time]" class="input-width"></td>
            <td>sec</td>
        </div>
        {{--@else--}}
        <div v-else>
        <td>Inj Press @ S/Over</td>
        <td><input name="monitoring[inj_press_s_over]" class="input-width"></td>
            <td>bars</td>
        </div>
        {{--@endif--}}
        <td>10</td>
    </tr>
    <tr>
        <td>Max inject Press</td>
        <td><input name="monitoring[max_inject_press]" class="input-width"></td>
        <td>bars</td>
        <td>10</td>
    </tr>
    <tr>
        <td>Cunshining</td>
        <td><input name="monitoring[cunshining]" class="input-width"></td>
        <td>ccm</td>
        <td>10</td>
    </tr>
    <tr>
        <td>Total Cycle Time</td>
        <td><input name="monitoring[total_cycle_time]" class="input-width"></td>
        <td>sec</td>
        <td>10</td>
    </tr>
    </tbody>
</table>
