<style>
    .input-width{
        width: 80px;
    }
</style>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center" colspan="7">Injection</th>
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
            <td>Volume(ccm)</td>
            <td><input name="injection[s_over1]" class="input-width"></td>
            <td><input name="injection[s_over2]" class="input-width"></td>
            <td><input name="injection[s_over3]" class="input-width"></td>
            <td><input name="injection[s_over4]" class="input-width"></td>
            <td><input name="injection[s_over5]" class="input-width"></td>
            <td>10</td>
        </tr>
        <tr>
            <td>Speed(ccm/s)</td>
            <td><input name="injection[speed1]" class="input-width"></td>
            <td><input name="injection[speed2]" class="input-width"></td>
            <td><input name="injection[speed3]" class="input-width"></td>
            <td><input name="injection[speed4]" class="input-width"></td>
            <td><input name="injection[speed5]" class="input-width"></td>
            <td>10</td>
        </tr>
        <tr>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td>Tol</td>
        </tr>
        <tr>
            <td>injection pressure</td>
            <td colspan="2"><input name="injection[injection_pressure]" class="input-width">bar</td>
            <td>10</td>
        </tr>
        <tr>
            <td>Cooling time</td>
            <td colspan="2"><input name="injection[cooling_time]" class="input-width">sec</td>
            <td>10</td>
        </tr>
    </tbody>
</table>
