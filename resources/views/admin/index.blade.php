@extends('admin_theme.default')

@section('heading')
لوحة التحكم
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="statistics-details d-flex align-items-center justify-content-between">
            <div>
                <h2 class="display-3">عدد الكتب</h2>
                <h3 class="rate-percentage">{{ $books_count }}</h3>

            </div>
            <div>
                <h2 class="display-3">عدد االناشرين</h2>
                <h3 class="rate-percentage">{{ $pubs_count }}</h3>
            </div>
            <div>
                <h2 class="display-3">عدد الاصناف</h2>
                <h3 class="rate-percentage">{{ $cats_count }}</h3>
            </div>
            <div class="d-none d-md-block">
                <h2 class="display-3">عدد المؤلفين</h2>
                <h3 class="rate-percentage">{{ $authors_count }}</h3>
            </div>

        </div>
    </div>
</div>
@endsection
