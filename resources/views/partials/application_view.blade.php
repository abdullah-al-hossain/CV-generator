<table class="table table-bordered">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Address</th>
      <th>Card Number</th>
      <th>Postal/Zip no.</th>
      <th>Gender</th>
    </tr>
  </thead>
  <tbody>
    @if($app != null)
    @foreach($apps as $app)
    <tr>
      <td>{{$app->name}}</td>
      <td>{{$app->email}}</td>
      <td>{{$app->phone}}</td>
      <td>{{$app->address}}</td>
      <td>{{$app->card}}</td>
      <td>{{$app->zip}}</td>
      <td style='text-transform: uppercase;'>{{$app->gender}}</td>
    </tr>
    @endforeach
    @else
    <tr>
      <td>N/A</td>
      <td>N/A</td>
      <td>N/A</td>
      <td>N/A</td>
      <td>N/A</td>
      <td>N/A</td>
      <td>N/A</td>
    </tr>
    @endif
  </tbody>
  <tfoot>

  </tfoot>
</table>
