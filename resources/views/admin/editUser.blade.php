<x-adminlayout>
<!-- Default form login -->
<form class="border border-light p-5" action="{{route('updateUser', $user->id)}}" method="POST">
@csrf
    <p class="h4 mb-4 text-center">Edit User Permission</p> 
        <!-- User Name -->
        <h5 for="">UserName: {{$user->name}}</h5>
        <!-- Email -->
        <h5 for="">Email: {{$user->email}}</h5>
        <div class="row">
            <!-- Is Admin -->
            <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="isAdmin" name="isAdmin" {{$user->isAdmin ? "checked": ""}} />
            <label class="custom-control-label" for="isAdmin">IsAdmin</label>
            </div>

            <!-- Is Premium -->
            <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="isPremium"name="isPremium" {{$user->isPremium ? "checked": ""}} />
            <label class="custom-control-label" for="isPremium">IsPremium</label>
        </div>
    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit">Save</button>
</form>
<!-- Default form login -->
</x-adminlayout>