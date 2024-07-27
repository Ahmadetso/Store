<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link" href = '{{ route('admin.index') }}'>
            <i class="fa-solid fa-house" style="font-size: 22px;"></i>
          <span class="menu-title fr" style=" font-size: 13px;"><div style="margin-right: 20px;  ">الصفحة الرئيسية</div></span>
        </a>
      </li>
      <li class="nav-item nav-category">خيارات</li>

      <li class="nav-item {{ request()->is('admin/books*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('books.index') }}">
            <i class="fa-solid fa-book" style="font-size: 22px;"></i>
            <span class="menu-title fr" style="font-size: 13px;"><div style="margin-right: 20px;  ">الكتب</div></span>
        </a>
    </li>
      <li class="nav-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fa-solid fa-list" style="font-size: 22px;"></i>
            <span class="menu-title fr" style="  font-size: 13px;"><div style="margin-right: 20px;  ">الاصناف</div></span>

        </a>
    </li>
      <li class="nav-item {{ request()->is('admin/publishers*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('publishers.index') }}">
            <i class="fa-solid fa-building" style="font-size: 22px;"></i>

            <span class="menu-title fr" style=" font-size: 13px;"><div style="margin-right: 20px;  ">الناشرون</div></span>
        </a>
    </li>
      <li class="nav-item {{ request()->is('admin/authors*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('authors.index') }}">
            <i class="fa-solid fa-pen" style="font-size: 22px;"></i>

            <span class="menu-title fr" style=" font-size: 13px;"><div style="margin-right: 20px;  ">المؤلفون</div></span>
        </a>
    </li>


      @if(auth()->user()->isSuperAdmin())


      <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index') }}">

            <i class="fa-solid fa-user "style="font-size: 22px;"></i>

            <span class="menu-title fr " style=" font-size: 13px; "><div style="margin-right: 20px;   ">المستخدمون</div></span>
        </a>
    </li>
      @endif


    </ul>
  </nav>
