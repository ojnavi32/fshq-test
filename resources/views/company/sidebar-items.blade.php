<li class="nav-item">
    <a href="{{ url('admin/companies') }}" class="nav-link {{
        (request()->is('admin/companies*')) ? 'active' : ''
    }}">
        <i class="fas fa-building mr-2"></i>
        <p>Companies</p>
    </a>
</li>