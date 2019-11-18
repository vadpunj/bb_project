<div class="sidebar">
  <nav class="sidebar-nav">
    <ul class="nav">
      <!-- <li class="nav-title">จัดการระบบ</li> -->
      <li class="nav-item">
        <a class="nav-link {{ (request()->is('/home')) ? 'active' : '' }}" href="{{ route('home') }}">
          <i class="nav-icon icon-pencil"></i> ศูนย์ต้นทุน</a>
      </li>
      {{--<li class="nav-item">
        <a class="nav-link {{ (request()->is('/list')) ? 'active' : '' }}" href="{{ route('list') }}">
          <i class="nav-icon icon-doc"></i> ดูข้อมูล</a>
      </li>--}}
      <li class="nav-item">
        <a class="nav-link {{ (request()->is('/import_excel')) ? 'active' : '' }}" href="{{ route('import') }}">
          <i class="nav-icon icon-doc"></i> อ่านข้อมูล</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (request()->is('/export_excel')) ? 'active' : '' }}" href="{{ route('export') }}">
          <i class="nav-icon icon-doc"></i> Export files</a>
      </li>
      @if(Auth::user()->type ==1)
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="{{ route('register') }}" >
          <i class="nav-icon icon-doc"></i> Register</a>
      </li>
      @endif
    </ul>
  </nav>
</div>
