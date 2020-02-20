@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Users') }}</h4>
                <p class="card-category"> {{ __('Here you can manage users') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="table-responsive">
                <table class="table table-hover table-responsive">
                <thead class="text-warning">
                  <th>User</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Date</th>
                  <th></th>
                  
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                  <tr>
                    <td>{{$user->name}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  
                    @foreach($user->entries as $k => $entry)
                    <tr>
                      <td></td>
                      <td>{{$entry->title}}</td>
                      <td>{{$entry->content}}</td>
                      <td>{{$entry->creation}}</td>
                      <td>
                      @if ($user->id == auth()->id())
                      <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('entry.edit', $entry) }}" data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                      </a>
                      @endif
                      </td>                      
                    </tr>
                    @endforeach
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{ $users->render() }}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush