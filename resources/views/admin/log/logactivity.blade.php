@extends('admin.layouts.admin')

@section('content')
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>
               Log activity</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item active"><a href="{{ route('logactivity') }}">logactivitie</a></li>

            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Liste des activités</h5>
                    </div>
                    <div class="col-lg-6 text-end">
                    </div>
                </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Objects</th>
                    <th scope="col" class="text-center">URL</th>
                    <th scope="col" class="text-center">Method</th>
                    <th scope="col" class="text-center">IP</th>
                    <th scope="col" class="text-center">User Agent</th>
                    <th scope="col" class="text-center">User ID</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($logactivities as $k => $logactivitie )
                        <tr>
                            <th class="text-center" scope="row">{{ $k + 1 }}</th>
                            <td class="text-center">{{ $logactivitie->subject }}</td>
                            <td class="text-center">{{ $logactivitie->url }}</td>
                            <td class="text-center">{{ $logactivitie->method }}</td>
                            <td class="text-center">{{ $logactivitie->ip }}</td>
                            <td class="text-center">{{ $logactivitie->agent }}</td>
                            <td class="text-center">{{ $logactivitie->user_id }}</td>
                            <td class="text-center">
                              <div class="btn-group">
                                <form class="px-1 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST" action="{{ route('logactivitie.admin.destroy', $logactivitie->id) }}">
                                      @csrf
                                      
                                     {{--  @method('DELETE') --}}
                                        <button class="btn text-danger" style="font-size: 20px;"><i class="icon-trash"></i></button>
                                </form>
                              </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
    <!-- Container-fluid Ends-->
  </div>
@endsection