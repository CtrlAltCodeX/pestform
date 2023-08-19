<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <h2
            href="#"
            class="list-group-item list-group-item-action py-2 ripple mt-2 text-center"
            aria-current="true"
        >
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>{{ auth()->user()->name }}</span>
        </h2>
        <div class="list-group list-group-flush mx-3 mt-4">
        
        <a href="{{ route('back_end.form.index') }}" class="list-group-item list-group-item-action py-2 ripple {{ !request()->route('id') ? 'active' : '' }} ">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Your Forms</span>
        </a>

        @if (request()->route('id'))
            <a href="{{ route('back_end.form.show', request()->route('id')) }}" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fas fa-chart-area fa-fw me-3"></i><span>Inbox</span>
            </a>

            <a href="{{ route('back_end.form.edit', request()->route('id')) }}" class="list-group-item list-group-item-action py-2 ripple active">
                <i class="fas fa-chart-area fa-fw me-3"></i><span>Configuration</span>
            </a>
        @endif
        </div>
    </div>
</nav>
 <!-- Sidebar -->