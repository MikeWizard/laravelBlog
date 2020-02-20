@extends('layouts.app', ['activePage' => 'entries', 'titlePage' => __('Entries')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Entries') }}</h4>
                <p class="card-category"> {{ __('Here you can manage your entries') }}</p>
              </div>
              <div class="card-body">
                <div class="row">
                </div>
                <div class="table-responsive">
                  
                <table class="table table-hover table-responsive">
                        <thead class="text-warning">
                          <th>Title</th>
                          <th>Content</th>
                          <th>Date</th>
                          <th></th>
                        </thead>
                        <tbody>
                            @foreach($entries as $k => $entry)
                            <tr>
                              <td>{{$entry->title}}</td>
                              <td>{{$entry->content}}</td>
                              <td>{{$entry->creation}}</td>
                              <td>
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('entry.edit', $entry) }}" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                            <div class="ripple-container"></div>
                              </a>
                              </td>                      
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{ $entries->render() }}
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection