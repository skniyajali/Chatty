<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- Head -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
    <title>Chatty - Realtime Chat Application</title>

    <!-- Template core CSS -->

    <link href="{{ asset('css/template.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/template.dark.min.css') }}" rel="stylesheet" media="(prefers-color-scheme: dark)">
    <meta name="csrf-token" content="{{ csrf_token() }}" />


</head>
<!-- Head -->

<body>

    <div class="layout">

        <!-- Navigation -->
        <div class="navigation navbar navbar-light justify-content-center py-xl-7">

            <!-- Brand -->            
            <h4 class="d-none d-xl-block font-size-h1 font-weight-bolder mb-6 text-primary">Chatty</h4>

            <!-- Menu -->
            <ul class="nav navbar-nav flex-row flex-xl-column flex-grow-1 justify-content-between justify-content-xl-center py-3 py-lg-0" role="tablist">

                <!-- Invisible item to center nav vertically -->
                <li class="nav-item d-none d-xl-block invisible flex-xl-grow-1">
                    <a class="nav-link position-relative p-0 py-xl-3" href="#" title="">
                        <i class="icon-lg fe-x"></i>
                    </a>
                </li>

                <!-- Create group -->
                <li class="nav-item">
                    <a class="nav-link position-relative p-0 py-xl-3" data-toggle="tab" href="#tab-content-create-chat" title="Create chat" role="tab">
                        <i class="icon-lg fe-edit"></i>
                    </a>
                </li>

                <!-- Friend -->
                <li class="nav-item mt-xl-9">
                    <a class="nav-link position-relative p-0 py-xl-3" data-toggle="tab" href="#tab-content-friends" title="Friends" role="tab">
                        <i class="icon-lg fe-users"></i>
                    </a>
                </li>

                <!-- Chats -->
                <li class="nav-item mt-xl-9">
                    <a class="nav-link position-relative p-0 py-xl-3 active" data-toggle="tab" href="#tab-content-dialogs" title="Chats" role="tab">
                        <i class="icon-lg fe-message-square"></i>
                        <div class="badge badge-dot badge-primary badge-bottom-center"></div>
                    </a>
                </li>

                <!-- Profile -->
                <li class="nav-item mt-xl-9 d-none d-xl-block flex-xl-grow-1">
                    <a class="nav-link position-relative p-0 py-xl-3 user_info" id="{{ Auth::user()->id }}" data-toggle="tab" href="#tab-content-user" title="User" role="tab">
                        <i class="icon-lg fe-user"></i>
                    </a>
                </li>

                <!-- Settings -->
                <li class="nav-item mt-xl-9">
                    <a class="nav-link position-relative p-0 py-xl-3" href="settings.html" title="Settings">
                        <i class="icon-lg fe-settings"></i>
                    </a>
                </li>

            </ul>
            <!-- Menu -->

        </div>
        <!-- Navigation -->

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="tab-content h-100" role="tablist">
                <div class="tab-pane fade h-100" id="tab-content-create-chat" role="tabpanel">
                    <div class="d-flex flex-column h-100">

                        <div class="hide-scrollbar">
                            <div class="container-fluid py-6">

                                <!-- Title -->
                                <h2 class="font-bold mb-6">Create group</h2>
                                <!-- Title -->

                                <!-- Search -->
                                <form class="mb-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                        <div class="input-group-append">
                                            <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Search -->

                                <!-- Tabs -->
                                <ul class="nav nav-tabs nav-justified mb-6" role="tablist">
                                    <li class="nav-item">
                                        <a href="#create-group-details" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Details</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#create-group-members" class="nav-link" data-toggle="tab" role="tab" aria-selected="false">Members</a>
                                    </li>
                                </ul>
                                <!-- Tabs -->

                                <!-- Create chat -->
                                <div class="tab-content" role="tablist">

                                    <!-- Chat details -->
                                    <div id="create-group-details" class="tab-pane fade show active" role="tabpanel">
                                        <form action="#">
                                            <div class="form-group">
                                                <label class="small">Photo</label>
                                                <div class="position-relative text-center bg-secondary rounded p-6">
                                                    <div class="avatar bg-primary text-white mb-5">
                                                        <i class="icon-md fe-image"></i>
                                                    </div>

                                                    <p class="small text-muted mb-0">You can upload jpg, gif or png files. <br> Max file size 3mb.</p>
                                                    <input id="upload-chat-photo" class="d-none" type="file">
                                                    <label class="stretched-label mb-0" for="upload-chat-photo"></label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="small" for="new-chat-title">Name</label>
                                                <input class="form-control form-control-lg" name="new-chat-title" id="new-chat-title" type="text" placeholder="Group Name">
                                            </div>

                                            <div class="form-group">
                                                <label class="small" for="new-chat-topic">Topic (optional)</label>
                                                <input class="form-control form-control-lg" name="new-chat-topic" id="new-chat-topic" type="text" placeholder="Group Topic">
                                            </div>

                                            <div class="form-group mb-0">
                                                <label class="small" for="new-chat-description">Description</label>
                                                <textarea class="form-control form-control-lg" name="new-chat-description" id="new-chat-description" rows="6" placeholder="Group Description"></textarea>
                                            </div>

                                        </form>
                                    </div>
                                    <!-- Chat details -->

                                    <!-- Chat Members -->
                                    <div id="create-group-members" class="tab-pane fade" role="tabpanel">
                                        <nav class="list-group list-group-flush mb-n6">

                                            <div class="mb-6">
                                                <small class="text-uppercase">A</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">

                                                        <div class="avatar avatar-online mr-5">
                                                            <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Anna Bridges">
                                                        </div>



                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Anna Bridges</h6>
                                                            <small class="text-muted">Online</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-1" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-1"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Label -->
                                                <label class="stretched-label" for="id-user-1"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">B</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Brian Dawson">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Brian Dawson</h6>
                                                            <small class="text-muted">last seen 2 hours ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-2" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-2"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Label -->
                                                <label class="stretched-label" for="id-user-2"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">L</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Leslie Sutton">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Leslie Sutton</h6>
                                                            <small class="text-muted">last seen 3 days ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-3" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-3"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Label -->
                                                <label class="stretched-label" for="id-user-3"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">M</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Matthew Wiggins">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Matthew Wiggins</h6>
                                                            <small class="text-muted">last seen 3 days ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-4" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-4"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Label -->
                                                <label class="stretched-label" for="id-user-4"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">S</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Simon Hensley">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Simon Hensley</h6>
                                                            <small class="text-muted">last seen 3 days ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-5" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-5"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Label -->
                                                <label class="stretched-label" for="id-user-5"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">W</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}/9.jpg" alt="William Wright">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">William Wright</h6>
                                                            <small class="text-muted">last seen 3 days ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-6" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-6"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Label -->
                                                <label class="stretched-label" for="id-user-6"></label>
                                            </div>
                                            <!-- Friend -->
                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="William Greer">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">William Greer</h6>
                                                            <small class="text-muted">last seen 10 minutes ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-7" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-7"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Label -->
                                                <label class="stretched-label" for="id-user-7"></label>
                                            </div>
                                            <!-- Friend -->

                                            <div class="mb-6">
                                                <small class="text-uppercase">Z</small>
                                            </div>

                                            <!-- Friend -->
                                            <div class="card mb-6">
                                                <div class="card-body">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Zane Mayes">
                                                        </div>


                                                        <div class="media-body align-self-center mr-6">
                                                            <h6 class="mb-0">Zane Mayes</h6>
                                                            <small class="text-muted">last seen 3 days ago</small>
                                                        </div>

                                                        <div class="align-self-center ml-auto">
                                                            <div class="custom-control custom-checkbox">
                                                                <input class="custom-control-input" id="id-user-8" type="checkbox">
                                                                <label class="custom-control-label" for="id-user-8"></label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Label -->
                                                <label class="stretched-label" for="id-user-8"></label>
                                            </div>
                                            <!-- Friend -->

                                        </nav>
                                    </div>
                                    <!-- Chat Members -->

                                </div>
                                <!-- Create chat -->

                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pb-6">
                            <div class="container-fluid">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Create group</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade h-100" id="tab-content-friends" role="tabpanel">
                    <div class="d-flex flex-column h-100">

                        <div class="hide-scrollbar">
                            <div class="container-fluid py-6">

                                <!-- Title -->
                                <h2 class="font-bold mb-6">Friends</h2>
                                <!-- Title -->

                                <!-- Search -->
                                <form class="mb-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                        <div class="input-group-append">
                                            <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Search -->

                                <!-- Button -->
                                <button type="button" class="btn btn-lg btn-block btn-secondary d-flex align-items-center mb-6" data-toggle="modal" data-target="#invite-friends">
                                    Invite friends
                                    <i class="fe-users ml-auto"></i>
                                </button>

                                <!-- Friends -->
                                <nav class="mb-n6">
                                    @foreach($user as $users)
                                        <!-- Friend -->
                                        <div class="card mb-6">
                                            <div class="card-body">

                                                <div class="media">

                                                    <div class="avatar avatar-online mr-5">
                                                        <img class="avatar-img" src="{{ $users->image }}" alt="{{ $users->name }}">
                                                    </div>


                                                    <div class="media-body align-self-center">
                                                        <h6 class="mb-0">{{ $users->name }}</h6>
                                                        <small class="text-muted">Online</small>
                                                    </div>

                                                    <div class="align-self-center ml-5">
                                                        <div class="dropdown z-index-max">
                                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fe-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                                    New chat <span class="ml-auto fe-edit-2"></span>
                                                                </a>
                                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                                    Delete <span class="ml-auto fe-trash-2"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Link -->
                                                <a href="#" class="user stretched-link" id="{{ $users->id }}"></a>

                                            </div>
                                        </div>
                                        <!-- Friend -->
                                    @endforeach
                                </nav>
                                <!-- Friends -->

                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade h-100 show active" id="tab-content-dialogs" role="tabpanel">
                    <div class="d-flex flex-column h-100">

                        <div class="hide-scrollbar">
                            <div class="container-fluid py-6">

                                <!-- Title -->
                                <h2 class="font-bold mb-6">Chats</h2>
                                <!-- Title -->

                                <!-- Search -->
                                <form class="mb-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                        <div class="input-group-append">
                                            <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Search -->

                                <!-- Favourites -->
                                <div class="text-center hide-scrollbar d-flex my-7" data-horizontal-scroll="">
                                    @if($latest->count())
                                        @foreach($latest as $latest)
                                            <a href="#" id="{{ $latest->id }}" class="user d-block text-reset mr-7 mr-lg-6">
                                                <div class="avatar avatar-sm avatar-online mb-3">
                                                    <img class="avatar-img" src="{{ $latest->image }}" alt="{{ $latest->name }} Image">
                                                </div>
                                                <div class="small"></div>
                                            </a>
                                        @endforeach
                                    @endif
                                </div>
                                <!-- Favourites -->

                                <!-- Chats -->
                                <nav class="nav d-block list-discussions-js mb-n6">
                                    @foreach($user as $users)
                                            
                                        <!-- Chat link -->
                                        <a class="text-reset nav-link p-0 mb-6 user {{ $users->id }}" id="{{ $users->id }}" href="#">
                                            <div class="card card-active-listener">
                                                <div class="card-body pen">

                                                    <div class="media">


                                                        <div class="avatar mr-5">
                                                            <img class="avatar-img" src="{{ $users->image }}" alt="{{ $users->name }} Image">
                                                        </div>

                                                        <div class="media-body overflow-hidden">
                                                            <div class="d-flex align-items-center mb-1">
                                                                <h6 class="text-truncate mb-0 mr-auto">{{ $users->name }}</h6>
                                                                <p class="small text-muted text-nowrap ml-4">{{ \Carbon\Carbon::parse($users->created_at)->diffForHumans() }}</p>
                                                            </div>
                                                            <div class="text-truncate">@ {{ $users->email }}</div>
                                                        </div>
                                                    </div>
                                                    
                                                    @if($users->unread)
                                                    <div class="pending badge badge-circle badge-primary badge-border-light badge-top-right">
                                                        <span class="p_msg">{{ $users->unread }}</span>
                                                    </div>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </a>
                                        <!-- Chat link -->

                                    @endforeach
                                    

                                </nav>
                                <!-- Chats -->

                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade h-100" id="tab-content-user" role="tabpanel">
                    <div class="d-flex flex-column h-100">

                        <div class="hide-scrollbar">
                            <div class="container-fluid py-6">

                                <!-- Title -->
                                <h2 class="font-bold mb-6">Profile</h2>
                                <!-- Title -->

                                <!-- Search -->
                                <form class="mb-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" placeholder="Search for messages or users..." aria-label="Search for messages or users...">
                                        <div class="input-group-append">
                                            <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- Search -->

                                <div id="userDs">
                                
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <!-- Button -->
                                        <button type="button" class="btn btn-lg btn-block btn-basic d-flex align-items-center">
                                            Settings
                                            <span class="fe-settings ml-auto"></span>
                                        </button>
                                    </div>

                                    <div class="col">
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <input type="submit" value="Logout" class="btn btn-lg btn-block btn-basic d-flex align-items-center">                                        
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>




                </div>
            </div>
        </div>
        <!-- Sidebar -->

        <!-- Main Content -->
        <div class="main main-visible" id="chatbox" data-mobile-height="">

            <div class="chat flex-column justify-content-center text-center">
                <div class="container-xxl">

                    <div class="avatar avatar-lg mb-5">
                        <img class="avatar-img" src="{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}">
                    </div>

                    <h6>Hey, {{ Auth::user()->name }}!</h6>
                    <p>Please select a chat to start messaging.</p>
                </div>
            </div>

        </div>
        <!-- Main Content -->

        <!-- Active Users: Sidebar -->

        <!-- Active Users: Sidebar -->

    </div>
    <!-- Layout -->

    <!-- DropzoneJS: Template -->
    <div id="dropzone-template-js">
        <div class="col-lg-4 my-3">
            <div class="card bg-light">
                <div class="card-body p-3">
                    <div class="media align-items-center">

                        <div class="dropzone-file-preview">
                            <div class="avatar avatar rounded bg-secondary text-basic-inverse d-block mr-5">
                                <i class="fe-paperclip"></i>
                            </div>
                        </div>

                        <div class="dropzone-image-preview">
                            <div class="avatar avatar mr-5">
                                <img src="#" class="avatar-img rounded" data-dz-thumbnail="" alt="">
                            </div>
                        </div>

                        <div class="media-body overflow-hidden">
                            <h6 class="text-truncate small mb-0" data-dz-name></h6>
                            <p class="extra-small" data-dz-size></p>
                        </div>

                        <div class="ml-5">
                            <a href="#" class="btn btn-sm btn-link text-decoration-none text-muted" data-dz-remove>
                                <i class="fe-x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DropzoneJS: Template -->

    <!-- Modal: Invite friends -->
    <div class="modal fade" id="invite-friends" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <div class="media flex-fill">
                        <div class="icon-shape rounded-lg bg-primary text-white mr-5">
                            <i class="fe-users"></i>
                        </div>
                        <div class="media-body align-self-center">
                            <h5 class="modal-title">Invite friends</h5>
                            <p class="small">Invite colleagues, clients and friends.</p>
                        </div>
                    </div>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="#">
                        <div class="form-group">
                            <label for="invite-email" class="small">Email</label>
                            <input type="text" class="form-control form-control-lg" id="invite-email">
                        </div>

                        <div class="form-group mb-0">
                            <label for="invite-message" class="small">Invitation message</label>
                            <textarea class="form-control form-control-lg" id="invite-message" data-autosize="true"></textarea>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-lg btn-block btn-primary d-flex align-items-center">
                        Invite friend
                        <i class="fe-user-plus ml-auto"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal: Invite friends -->

    <!-- Scripts -->    
    <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/plugins/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <!-- Scripts
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    -->
    <script>
        var sid = '{{ Auth::id() }}';
        var rid = '';

        $(document).ready(function(){
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = false;

            var pusher = new Pusher('59d45be705cf277cc71d', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
                channel.bind('my-event', function(data) {
                if(sid == data.from){
                    //$('.user .'+data.from).click();
                    getChats(data.to);
                }else if(sid == data.to){
                    if(rid == data.from){
                        //$('.user .'+data.from).click();
                        getChats(data.from);
                    }else{                        
                        var pending = parseInt($('#' + data.from + '.user .pen .pending').find('.p_msg').html());

                        if(pending){
                            $('#' + data.from + '.user .pen .pending').find('.p_msg').html(pending + 1);
                        }else{
                            $('#' + data.from + '.user .pen').append('<div class="pending badge badge-circle badge-primary badge-border-light badge-top-right"><span class="p_msg">1</span></div>')
                        }
                        //getChats(data.from);
                    }
                }
            });

            $(document).on('click','.user',function(){
                $('.user').removeClass('active');
                $(this).addClass('active');
                $('.pending').remove();
                var rid = $(this).attr('id');
                var sid = '{{ Auth::id() }}';

                $.ajax({
                    url:'message/'+ rid,
                    type:'post',
                    cache:false,
                    success:function(data){
                        //alert(data.user);
                        $('#chatbox').html(data);
                        scrollToTop()
                    }
                });
                
            });

            $(document).on('click','.user_info',function(){
                var chat_sidebar_id = $(this).attr("data-chat");

                var chat_sidebar = document.querySelector(chat_sidebar_id);
                var id = $(this).attr("id");

                $.ajax({
                    url:'userDetails/'+ id,
                    type:'post',
                    cache:false,
                    success:function(data){
                        $('#userD').html(data);
                        $('#userDs').html(data);
                        if (typeof chat_sidebar != "undefined" && chat_sidebar != null) {
                            if (chat_sidebar.classList.contains("chat-sidebar-visible")) {                        
                                chat_sidebar.classList.remove("chat-sidebar-visible");
                                document.body.classList.remove("sidebar-is-open");

                            } else {
                                [].forEach.call(
                                    document.querySelectorAll(".chat-sidebar"),
                                    function(e) {
                                        e.classList.remove("chat-sidebar-visible");
                                        document.body.classList.remove(
                                            "sidebar-is-open"
                                        );
                                    }
                                );
                                chat_sidebar.classList.add("chat-sidebar-visible");
                                document.body.classList.add("sidebar-is-open");
                            }
                        }
                    }
                });

                
            });

            $(document).on('click','#chat-btn',function(){
                var message = $('#chat-input').val();
                var rid = $(this).attr('rid');
                var uid = '{{ Auth::id() }}';
                if(message != ''){
                    $.ajax({
                        url: "messages/",
                        method: 'post',
                        data: {message : message, rid : rid, sid : uid},
                        cache: false,
                        success:function(data){
                            $('#chat-input').val('');
                        },
                        error:function(jqXHR, status, err){

                        },
                        complete:function(){
                            scrollToTop();
                        }
                    });
                }
            });
        });

        function scrollToTop(){
            $('.chat-content').animate({
                scrollTop: $('.chat-content').get(0).scrollHeight
            },50);
        }

        function getChats(rid){
            $('.pending').remove();
            $('#' + rid + '.user').addClass('active');
            $.ajax({
                url:'message/'+ rid,
                type:'post',
                cache:false,
                success:function(data){
                    //alert(data.user);
                    $('#chatbox').html(data);
                    scrollToTop()
                }
            });
        }
    </script>

    <script>
        $(document).ready(function(){
            var p = document.querySelectorAll('[data-chat-sidebar-toggle]');
            
            $(document).on('click','.chats',function(){
                var chat_sidebar_id = $(this).attr("data-chat");

                var chat_sidebar = document.querySelector(chat_sidebar_id);

                if (
                        typeof chat_sidebar != "undefined" &&
                        chat_sidebar != null
                    ) {
                        if (
                            chat_sidebar.classList.contains(
                                "chat-sidebar-visible"
                            )
                        ) {
                            chat_sidebar.classList.remove(
                                "chat-sidebar-visible"
                            );
                            document.body.classList.remove("sidebar-is-open");
                        } else {
                            [].forEach.call(
                                document.querySelectorAll(".chat-sidebar"),
                                function(e) {
                                    e.classList.remove("chat-sidebar-visible");
                                    document.body.classList.remove(
                                        "sidebar-is-open"
                                    );
                                }
                            );
                            chat_sidebar.classList.add("chat-sidebar-visible");
                            document.body.classList.add("sidebar-is-open");
                        }
                    }
            });

            $(document).on('click','.sidebar-close',function(){
                document.body.classList.remove("sidebar-is-open");
                    [].forEach.call(
                        document.querySelectorAll(".chat-sidebar"),
                        function(a) {
                            a.classList.remove("chat-sidebar-visible");
                        }
                    );
            });

            $(document).on('click','.data-chat',function(){
                document.querySelector(".main").classList.toggle("main-visible");
                
            });

            autosize(document.querySelectorAll('[data-autosize="true"]'));

            //
            // SVG inject
            //

            SVGInjector(document.querySelectorAll("img[data-inject-svg]"));

        });
    </script>
    
    
</body>

</html>