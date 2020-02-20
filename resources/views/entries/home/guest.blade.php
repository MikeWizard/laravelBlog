@extends('layouts.app', ['class' => 'off-canvas-sidebar','activePage' => 'dashboard', 'title' => __('Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-lg-12 col-md-12">

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Users') }}</strong></h4>
          </div>
          <div class="card-body">
            <p class="card-description text-center">{{ __('With the first 3 fees ') }}</p>

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
@endsection

@section('content')
<br/>
<br/>
<br/>
<br/>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Users</h4>
              <p class="card-category">With the first 3 fees</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>User</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Date</th>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                  <tr>
                    <td>{{$user->name}}</td>
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
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush