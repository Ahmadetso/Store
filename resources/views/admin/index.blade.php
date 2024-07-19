@extends('admin_theme.default')

@section('head')

@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
      <div class="statistics-details d-flex align-items-center justify-content-between">
        <div>
          <p class="statistics-title">books count</p>
          <h3 class="rate-percentage">{{ $booksCount }}</h3>
          {{-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p> --}}
        </div>
        <div>
          <p class="statistics-title">publishers count</p>
          <h3 class="rate-percentage">{{ $publishersCount }}</h3>

          {{-- <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p> --}}
        </div>
        <div>
          <p class="statistics-title">Categories Count</p>
          <h3 class="rate-percentage">{{ $categoriesCount }}</h3>
          {{-- <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p> --}}
        </div>
        <div class="d-none d-md-block">
          <p class="statistics-title">Authors Count</p>
          <h3 class="rate-percentage">{{ $authorsCount }}</h3>
          {{-- <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p> --}}
        </div>

      </div>
    </div>
  </div>

@endsection
