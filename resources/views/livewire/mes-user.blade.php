<div>
    <div class="card">
        <div class="card-header">
            <h6>Users</h6>
        </div>
        <div wire:poll class="table-responsive">
          <table class="table">
              <thead>
                <th class="text-center" scope="col"><b>#</b></th>
                <th class="text-center" scope="col"><b>Email</b></th>
                <th class="text-center" scope="col"><b>Password</b></th>
                <th class="text-center" scope="col"><b>Actions</b></th>
              </thead>
              <tbody>
                @foreach ($users as $k => $user)
                    <tr>
                      <th scope="row">{{ $k ++ }}</th>
                      <td class="text-center">{{$user->email }}</td>
                      <td class="text-center">{{$user->password }}</td>
                      <td class="text-center"></td>
                    </tr>
                @endforeach
              </tbody>
          </table>
        </div>
    </div>
</div>
