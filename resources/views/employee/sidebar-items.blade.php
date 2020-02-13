<li class="nav-item">
    <a href="{{ url('admin/employees') }}" class="nav-link {{
        (request()->is('admin/employees*')) ? 'active' : ''
    }}">
        <i class="fas fa-users mr-2"></i>
        <p>Employees</p>
    </a>
</li>