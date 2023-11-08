<style>
    .input-width{
        width: 80px;
    }

</style>
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th class="text-center" colspan="7">Specific Hold Pressure</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td></td>
        <td>1st</td>
        <td>2nd</td>
        <td>3rd</td>
        <td>4th</td>
        <td>5th</td>
        <td>Tol</td>
    </tr>
    <tr>
        <td>Time(sec)</td>
        <td><input name="holding[time1]" class="input-width"></td>
        <td><input name="holding[time2]" class="input-width"></td>
        <td><input name="holding[time3]" class="input-width"></td>
        <td><input name="holding[time4]" class="input-width"></td>
        <td><input name="holding[time5]" class="input-width"></td>
        <td>10</td>
    </tr>
    <tr>
        <td>Pressure(bar)</td>
        <td><input name="holding[press1]" class="input-width"></td>
        <td><input name="holding[press2]" class="input-width"></td>
        <td><input name="holding[press3]" class="input-width"></td>
        <td><input name="holding[press4]" class="input-width"></td>
        <td><input name="holding[press5]" class="input-width"></td>
        <td>10</td>
    </tr>
    <tr>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td>Tol</td>
    </tr>
    <tr>
        <td>switch over volume</td>
        <td colspan="2"><input name="holding[switch_over_volume]" class="input-width">ccm</td>
        <td>10</td>
    </tr>
    <tr>
        <td>holding pressure time</td>
        <td colspan="2"><input name="holding[holding_pressure_time]" class="input-width">sec</td>
        <td>10</td>
    </tr>
    </tbody>
</table>
