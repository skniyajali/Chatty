@if($userd->count())
    @foreach($userd as $ud)
        <!-- Header -->
        <div class="border-bottom py-4 py-lg-6">
            <div class="container-fluid">                    
                <ul class="nav justify-content-between align-items-center">
                    <!-- Close sidebar -->
                    <li class="nav-item list-inline-item">
                        <a class="nav-link text-muted px-0 sidebar-close" href="#" data-chat-sidebar-close="">
                            <i class="icon-md fe-chevron-left"></i>
                        </a>
                    </li>

                    <!-- Title(mobile) -->
                    <li class="text-center d-block d-lg-none">
                        <h6 class="mb-n2">{{ $ud->name }}</h6>
                        <small class="text-muted">User Details</small>
                    </li>

                    <!-- Dropdown -->
                    <li class="nav-item list-inline-item">
                        <div class="dropdown">
                            <a class="nav-link text-muted px-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-md fe-sliders"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                            Mute <span class="ml-auto fe-bell"></span>
                                        </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                            Delete <span class="ml-auto fe-trash-2"></span>
                                        </a>
                            </div>
                        </div>
                    </li>
                </ul>                        
            </div>
        </div>
        <!-- Header -->

        <!-- Body -->
        <div class="hide-scrollbar flex-fill">
            <!-- Card -->
            <div class="card mb-6">
                <div class="card-body">
                    <div class="border-bottom text-center py-9 px-10">
                        <!-- Photo -->
                        <div class="avatar avatar-xl mx-5 mb-5">
                            <img class="avatar-img" src="{{ $ud->image }}" alt="">
                            <div class="badge badge-sm badge-pill badge-primary badge-border-basic badge-top-right">
                                <span class="text-uppercase">Pro</span>
                            </div>
                        </div>
                        <h5>{{ $ud->name }}</h5>
                        <p class="text-muted">Passoniate Programmer.</p>
                    </div>
                </div>
            </div>

            <!-- Card -->
            <div class="card mb-6">
                <div class="card-body">
                    <ul class="list-group list-group-flush mb-8">
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">Country</p>
                                    <p>Tamilnadu, India</p>
                                </div>
                                <i class="text-muted icon-sm fe-globe"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">Phone</p>
                                    <p>+91 81452 22800</p>
                                </div>
                                <i class="text-muted icon-sm fe-mic"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">Email</p>
                                    <p>{{ $ud->email }}</p>
                                </div>
                                <i class="text-muted icon-sm fe-mail"></i>
                            </div>
                        </li>

                        <li class="list-group-item py-6">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <p class="small text-muted mb-0">Time</p>
                                    <p>{{ $ud->created_at->diffForHumans() }}</p>
                                </div>
                                <i class="text-muted icon-sm fe-clock"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Card -->
            <div class="card mb-6">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-6">
                            <a href="#" class="media text-muted">
                                <div class="media-body align-self-center">
                                    Twitter
                                </div>
                                <i class="icon-sm fe-twitter"></i>
                            </a>
                        </li>

                        <li class="list-group-item py-6">
                            <a href="#" class="media text-muted">
                                <div class="media-body align-self-center">
                                    Facebook
                                </div>
                                <i class="icon-sm fe-facebook"></i>
                            </a>
                        </li>

                        <li class="list-group-item py-6">
                            <a href="#" class="media text-muted">
                                <div class="media-body align-self-center">
                                    Github
                                </div>
                                <i class="icon-sm fe-github"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Body -->

        <!-- Button -->
        <div class="border-top py-7">
            <div class="container-fluid">
                <button class="btn btn-lg btn-block btn-primary d-flex align-items-center" type="submit">
                            Add friend
                            <span class="fe-user-plus ml-auto"></span>
                        </button>
            </div>
        </div>
    @endforeach

@endif
