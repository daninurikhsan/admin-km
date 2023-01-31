<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('/')) ? '' : 'collapsed' }}" href="/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('news')) ? '' : 'collapsed' }}" href="/news">
          <i class="bi bi-newspaper"></i>
          <span>News</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('event')) ? '' : 'collapsed' }}" href="/event">
          <i class="bi bi-calendar-week"></i>
          <span>Events</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('scholarship')) ? '' : 'collapsed' }}" href="/scholarship">
          <i class="bi bi-box-seam"></i>
          <span>Scholarships</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('cabinet/*'))  ? '' : 'collapsed' }}" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#" aria-exapanded="">
          <i class="bi bi-folder"></i><span>Cabinets</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse {{ (request()->is('cabinet/*'))  ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/cabinet" class="">
              <i class="bi bi-circle"></i><span>View All</span>
            </a>
          </li>

          @php 
            use App\Models\Cabinet;
            $cabinets = Cabinet::orderBy('id', 'desc')->get();
          @endphp

          @foreach($cabinets as $cabinet)
            <li>
              <a href="/cabinet/{{ $cabinet->id }}" class="{{ (request()->is('cabinet/$cabinet->id')) ? 'active' : '' }}">
                <i class="bi bi-circle"></i><span>{{ $cabinet->name }}</span>
              </a>
            </li>
          @endforeach
        </ul>
      </li>

    </ul>

</aside>