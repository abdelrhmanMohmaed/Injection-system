<style>
    .input-width {
        width: 80px;
    }

</style>
<div class="row">
    <div class="col-md-4">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="text-center" colspan="2">FWD</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input name="core[fwd_speed]" class="input-width"></td>
                <td>ccm/s</td>
            </tr>
            <tr>
                <td><input name="core[fwd_pressure]" class="input-width"></td>
                <td>bars</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="text-center" colspan="2">Interval</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input name="core[interval_speed]" class="input-width"></td>
                <td>ccm/s</td>
            </tr>
            <tr>
                <td><input name="core[interval_pressure]" class="input-width"></td>
                <td>bars</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th class="text-center" colspan="2">BWD</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input name="core[bwd_speed]" class="input-width"></td>
                <td>ccm/s</td>
            </tr>
            <tr>
                <td><input name="core[bwd_pressure]" class="input-width"></td>
                <td>bars</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-4">
        <table class="table table-striped table-bordered">
            <tbody>
            <tr>
                <td>Count</td>
                <td><input name="core[count]" class="input-width"></td>
                <td></td>
            </tr>
            <tr>
                <td>Time</td>
                <td><input name="core[time]" class="input-width"></td>
                <td>sec</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th class="text-center" colspan="5">Short Stroke</th>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td>Speed</td>
            <td><input name="shortStroke[speed1]" class="input-width"></td>
            <td>mm/s</td>
            <td><input name="shortStroke[speed2]" class="input-width"></td>
            <td>mm/s</td>
        </tr>
        <tr>
            <td>Force</td>
            <td><input name="shortStroke[force1]" class="input-width"></td>
            <td>KN</td>
            <td><input name="shortStroke[force2]" class="input-width"></td>
            <td>KN</td>
        </tr>
        <tr>
            <td>S/Over</td>
            <td><input name="shortStroke[s_over1]" class="input-width"></td>
            <td>mm</td>
            <td><input name="shortStroke[s_over2]" class="input-width"></td>
            <td>mm</td>
        </tr>
        <tr>
            <td colspan="2">Count</td>
            <td><input name="shortStroke[count]" class="input-width"></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
    </div>
</div>
