<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('/')) ? '' : 'collapsed' }}" href="/">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('/')) ? '' : 'collapsed' }}" href="/">
          <i class="bi bi-grid"></i>
          <span>News</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('/')) ? '' : 'collapsed' }}" href="/">
          <i class="bi bi-grid"></i>
          <span>Events</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ (request()->is('/')) ? '' : 'collapsed' }}" href="/">
          <i class="bi bi-grid"></i>
          <span>Scholarships</span>
        </a>
      </li>

    </ul>

</aside>