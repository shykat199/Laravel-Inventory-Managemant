<tr>

    <th scope="row">{{$id++}}</th>
    <td>{{$expense->month}}</td>
    <td>{{$expense->amount}}</td>
    <td>{{$expense->details}}</td>
    <td>{{$expense->date}}</td>
    <td>
        <div class="row">
            <div class="col-6 col-md-4">
                <div class="col">
                    <a href="{{route('expenses.edit',$expense->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="col">
                    <a href="{{route('expenses.destroy',$expense->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>

                </div>
            </div>
        </div>
    </td>
    <td></td>
</tr>
