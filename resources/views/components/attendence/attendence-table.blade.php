<tr>
    <th scope="row">{{$id++}}</th>
    <td>{{$employee->name}}</td>
    <td>{{$employee->email}}</td>
    <td><img
            src="{{\Illuminate\Support\Facades\Storage::url($employee->photo)}}"
            alt="{{$employee->name}}" style="height: 60px; width: 60px;"></td>

    <input type="hidden" value="{{$employee->id}}" name="employee_id[]"/>
    <input type="hidden" value="{{date('d-m-y')}}" name="attendance_date"/>
    <input type="hidden" value="{{date('Y')}}" name="attendance_year"/>

    <td>
        <input class="text-bold" type="radio" name="attendance[{{$employee->id}}]"
               value="1"/><span class="text-success"{{($employee->attendance==='1') ? 'checked':''}}><b>Present</b></span>

        <input class="text-bold " type="radio" name="attendance[{{$employee->id}}]"
               value="0"/><span class="text-danger" {{($employee->attendance==='0') ? 'checked':''}}><b>Absent</b></span>
    </td>

</tr>
