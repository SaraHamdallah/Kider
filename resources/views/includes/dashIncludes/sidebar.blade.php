<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{ route('home') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="components-alerts.html">
          <i class="bi bi-circle"></i><span>Alerts</span>
        </a>
      </li>
      
      <li>
        <a href="components-buttons.html">
          <i class="bi bi-circle"></i><span>Buttons</span>
        </a>
      </li>
      <li>
        <a href="components-cards.html">
          <i class="bi bi-circle"></i><span>Cards</span>
        </a>
      </li>
      
      <li>
        <a href="components-tabs.html">
          <i class="bi bi-circle"></i><span>Tabs</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed {{ request()->is('dashboard/addTeachers') || request()->is('dashboard/addStudents') || request()->is('dashboard/addCourses') || request()->is('dashboard/addCourseStudent') ? 'active' : '' }}" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('addCourses') }}">
          <i class="bi bi-circle"></i><span>Add courses</span>
        </a>
      </li>
      <li>
        <a href="{{ route('addTeachers') }}">
          <i class="bi bi-circle"></i><span>Add Teachers</span>
        </a>
      </li>
      <li>
        <a href="{{ route('addStudents') }}">
          <i class="bi bi-circle"></i><span>Add Students</span>
        </a>
      </li>
      <li>
        <a href="{{ route('addCourseStudent') }}">
          <i class="bi bi-circle"></i><span>Add student to class</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('teachers') }}">
          <i class="bi bi-circle"></i><span>Teacher Table</span>
        </a>
      </li>

      <li>
        <a href="{{ route('courses') }}">
          <i class="bi bi-circle"></i><span>Classes Table</span>
        </a>
      </li>

      <li>
        <a href="{{ route('students') }}">
          <i class="bi bi-circle"></i><span>Students Table</span>
        </a>
      </li>

    </ul>
  </li>
  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#trashed-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Trashed</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="trashed-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{ route('trashCourse') }}">
          <i class="bi bi-circle"></i><span>Trashed classes Table</span>
        </a>
      </li>

      <li>
        <a href="{{ route('trashTeachers') }}">
          <i class="bi bi-circle"></i><span>Trashed teachers Table</span>
        </a>
      </li>

      <li>
        <a href="{{ route('trashStudents') }}">
          <i class="bi bi-circle"></i><span>Trashed students Table</span>
        </a>
      </li>

    </ul>
  </li>
  
  
  
  <!-- End Tables Nav -->

  <!-- End Charts Nav -->

  <!-- End Icons Nav -->

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.html">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-faq.html">
      <i class="bi bi-question-circle"></i>
      <span>F.A.Q</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('register') }}">
      <i class="bi bi-card-list"></i>
      <span>Add User</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('login') }}">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Show Users</span>
    </a>
  </li><!-- End Login Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-error-404.html">
      <i class="bi bi-dash-circle"></i>
      <span>Error 404</span>
    </a>
  </li><!-- End Error 404 Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-blank.html">
      <i class="bi bi-file-earmark"></i>
      <span>Blank</span>
    </a>
  </li><!-- End Blank Page Nav -->

</ul>

</aside>