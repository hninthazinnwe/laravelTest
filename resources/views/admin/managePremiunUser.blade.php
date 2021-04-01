<x-adminlayout>
    <div class="container">
    <h1>Manage Premium User</h1>
    <table class="table table-hover">
  <thead class="grey white-text">
    <tr>
      <th scope="col">id</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Is Admin</th>
      <th scope="col">Is Premium</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->isAdmin == '0' ? 'FALSE':'TRUE'}}</td>
      <td>{{$user->isPremium == '0' ? 'FALSE':'TRUE'}}</td>
      <td><a href="{{route('editUser', $user->id)}}" class="btn btn-sm btn-success">Update</a></td>
      <td><a href="{{route('deleteUser', $user->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
</x-adminlayout>