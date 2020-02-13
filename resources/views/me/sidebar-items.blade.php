<li class="nav-item">
    <a href="{{ url('me') }}" class="nav-link {{
        (request()->is('me*')) ? 'active' : ''
    }}">
        <i class="fas fa-home mr-2"></i>
        <p>Home</p>
    </a>
</li>