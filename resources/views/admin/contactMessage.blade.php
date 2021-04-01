<x-adminlayout>
  <div class="container">
    <h1>Contact Messages</h1>
    <table class="table table-hover">
      <thead class="grey white-text">
        <tr>
          <th scope="col">id</th>
          <th scope="col">UserName</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($messages as $message)
        <tr>
          <th scope="row">{{$message->id}}</th>
          <td>{{$message->username}}</td>
          <td>{{$message->email}}</td>
          <td>{{$message->message}}</td>
          <td><a href="{{route('editMessage', $message->id)}}" class="btn btn-sm btn-success">Update</a></td>
          <td><a class="btn btn-sm btn-danger" href="{{route('deleteMessage', $message->id)}}">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</x-adminlayout>