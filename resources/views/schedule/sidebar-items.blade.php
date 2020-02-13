<li class="nav-item">
    <a href="{{ url('admin/schedule-email') }}" class="nav-link {{
        (request()->is('admin/schedule-email*')) ? 'active' : ''
    }}">
        <i class="fas fa-calendar-alt mr-2"></i>
        <p>Schedule Email</p>
    </a>
</li>