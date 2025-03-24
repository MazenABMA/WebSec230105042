<nav class="navbar navbar-expand-sm bg-light navbar-light shadow-sm">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('minitest') }}">MiniTest</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('gpa.calculator') }}">GPA Calculator</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products') }}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('transcript') }}">Transcript</a>
            </li>
        </ul>
    </div>
</nav>
