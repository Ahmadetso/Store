
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div>
        <div class="d-flex justify-content-between mb-2">
            <input wire:model.live="search" type="text" class="form-control" placeholder="Search books...">

        </div>

        <table id="books-table" class="table table-striped table-bordered text-right" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>الرقم التسلسلي</th>
                    <th>التصنيف</th>
                    <th>المؤلفون</th>
                    <th>الناشر</th>
                    <th>السعر</th>
                    <th>خيارات</th>
                </tr>
            </thead>

            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td><a href="#">{{ $book->title }}</a></td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->category != null ? $book->category->name : '' }}</td>
                        <td>
                            @if($book->authors()->count() > 0)
                                @foreach($book->authors as $author)
                                    {{ $loop->first ? '' : 'و' }}
                                    {{ $author->name }}
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $book->publisher != null ? $book->publisher->name : '' }}</td>
                        <td>{{ $book->price }}$</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="#"><i class="fa fa-edit"></i> تعديل</a>
                            <form method="POST" action="#" class="d-inline-block">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟')"><i class="fa fa-trash"></i> حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $this->search }}

        <div class="d-flex justify-content-center">
        {{ $books->links('pagination::bootstrap-5') }}
        </div>
    </div>

