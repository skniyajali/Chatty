@if($user->count()) 

@foreach($user as $user)

<!-- Chat -->
<div id="chat-1" class="chat dropzone-form-js" data-dz-url="">

    <!-- Chat: body -->
    <div class="chat-body">

        <!-- Chat: Header -->
        <div class="chat-header border-bottom py-4 py-lg-6 px-lg-8">
            <div class="container-xxl">

                <div class="row align-items-center">

                    <!-- Close chat(mobile) -->
                    <div class="col-3 d-xl-none">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <a class="text-muted px-0 data-chat" href="#" data-chat="close">
                                    <i class="icon-md fe-chevron-left"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Chat photo -->
                    <div class="col-6 col-xl-6">
                        <div class="media text-center text-xl-left">
                            <div class="avatar avatar-sm d-none d-xl-inline-block mr-5">
                                <img src="{{ $user->image }}" class="avatar-img" alt="">
                            </div>

                            <div class="media-body align-self-center text-truncate">
                                <h6 class="text-truncate mb-n1">{{ $user->name }}</h6>
                                <small class="text-muted">@ {{ $user->username }}</small>
                                <small class="text-muted mx-2"> • </small>
                                <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>

                    <!-- Chat toolbar -->
                    <div class="col-3 col-xl-6 text-right">
                        <ul class="nav justify-content-end">
                            <li class="nav-item list-inline-item d-none d-xl-block mr-5">
                                <a class="nav-link text-muted px-3" data-toggle="collapse" data-target="#chat-1-search" href="#" title="Search this chat">
                                    <i class="icon-md fe-search"></i>
                                </a>
                            </li>

                            <li class="nav-item list-inline-item d-none d-xl-block mr-3">
                                <a class="nav-link text-muted px-3 chats d-none" href="#" data-chat="#chatmembers" title="Add People">
                                    <i class="icon-md fe-user-plus"></i>
                                </a>
                            </li>

                            <li class="nav-item list-inline-item d-none d-xl-block mr-0">
                                <a class="nav-link text-muted px-3 chats d-none" href="#" data-chat="#chatinfo" title="Details">
                                    <i class="icon-md fe-more-vertical"></i>
                                </a>
                            </li>

                            <!-- Mobile nav -->
                            <li class="nav-item list-inline-item d-block d-xl-none">
                                <div class="dropdown">
                                    <a class="nav-link text-muted px-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-md fe-more-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item d-flex align-items-center" data-toggle="collapse" data-target="#chat-1-search" href="#">
                                                    Search <span class="ml-auto pl-5 fe-search"></span>
                                                </a>

                                        <a class="dropdown-item d-flex align-items-center chats d-none" href="#" data-chat="#chatinfo">
                                                    Chat Info <span class="ml-auto pl-5 fe-more-horizontal"></span>
                                                </a>

                                        <a class="dropdown-item d-flex align-items-center chats d-none" href="#" data-chat="#chatmembers">
                                                    Add Members <span class="ml-auto pl-5 fe-user-plus"></span>
                                                </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Mobile nav -->
                        </ul>
                    </div>

                </div> 
                <!-- .row -->

            </div>
        </div>
        <!-- Chat: Header -->

        <!-- Chat: Search -->
        <div class="collapse border-bottom px-lg-8" id="chat-1-search">
            <div class="container-xxl py-4 py-lg-6">

                <div class="input-group">
                    <input type="text" class="form-control form-control-lg" placeholder="Search this chat" aria-label="Search this chat">

                    <div class="input-group-append">
                        <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                    </div>
                </div>

            </div>
        </div>
        <!-- Chat: Search -->

        <!-- Chat: Content-->
        <div class="chat-content px-lg-8">
            <div class="container-xxl py-6 py-lg-10">
                @foreach($message as $msg)

                <!-- Message -->
                <div class="message{{ ($msg->from != Auth::id()) ? '' : ' message-right' }}">
                    <!-- Avatar -->
                    <a class="avatar avatar-sm mr-4 ml-4 mr-lg-5 user_info" id="{{ ($msg->from != Auth::id()) ? $user->id : Auth::user()->id }}" href="#" data-chat="#chat-1-user-profile">
                                <img class="avatar-img" src="{{ ($msg->from != Auth::id()) ? $user->image : Auth::user()->image }}" alt="">
                            </a>

                    <!-- Message: body -->
                    <div class="message-body">

                        <!-- Message: row -->
                        <div class="message-row">
                            <div class="d-flex align-items-center{{ ($msg->from != Auth::id()) ? '' : ' justify-content-end' }}">

                                @if($msg->from == Auth::id())
                                <!-- Message: dropdown -->
                                <div class="dropdown">
                                    <a class="text-muted opacity-60 mr-3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe-more-vertical"></i>
                                    </a>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Edit <span class="ml-auto fe-edit-3"></span>
                                                    </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Share <span class="ml-auto fe-share-2"></span>
                                                    </a>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                                        Delete <span class="ml-auto fe-trash-2"></span>
                                                    </a>
                                    </div>
                                </div>
                                <!-- Message: dropdown -->
                                @endif

                                <!-- Message: content -->
                                <div class="message-content{{ ($msg->from != Auth::id()) ? ' bg-light' : ' bg-primary text-white' }}">
                                    <h6 class="mb-2">{{ ($msg->from != Auth::id()) ? $user->name : Auth::user()->name }}</h6>
                                    <div>{{ $msg->message }}</div>

                                    <div class="mt-1">
                                        <small class="opacity-65">{{ $msg->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                <!-- Message: content -->
                            </div>
                        </div>
                        <!-- Message: row -->

                    </div>
                    <!-- Message: Body -->
                </div>
                <!-- Message -->
                @endforeach

            </div>

            <!-- Scroll to end -->
            <div class="end-of-chat"></div>
        </div>
        <!-- Chat: Content -->

        <!-- Chat: DropzoneJS container -->
        <div class="chat-files hide-scrollbar px-lg-8">
            <div class="container-xxl">
                <div class="dropzone-previews-js form-row py-4"></div>
            </div>
        </div>
        <!-- Chat: DropzoneJS container -->

        <!-- Chat: Footer -->
        <div class="chat-footer border-top py-4 py-lg-6 px-lg-8">
            <div class="container-xxl">
                <div class="form-row align-items-center">
                    <div class="col">
                        <div class="input-group">
                            <!-- Textarea -->
                            <textarea id="chat-input" class="form-control bg-transparent border-0" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true"></textarea>

                            <!-- Emoji button -->
                            <div class="input-group-append">
                                <button class="btn btn-ico btn-secondary btn-minimal bg-transparent border-0" type="button" data-emoji-btn="">
                                            <img src="{{ asset('images/smile.svg') }}" data-inject-svg="" alt="">
                                        </button>
                            </div>

                            <!-- Upload button -->
                            <div class="input-group-append">
                                <button id="chat-" sid="{{ $user->name }}" class="btn btn-ico btn-secondary btn-minimal bg-transparent border-0 dropzone-button-js" type="button">
                                            <img src="{{ asset('images/paperclip.svg') }}" data-inject-svg="" alt="">
                                        </button>
                            </div>
                        </div>

                    </div>

                    <!-- Submit button -->
                    <div class="col-auto">
                        <button class="btn btn-ico btn-primary rounded-circle" id="chat-btn" rid="{{ $user->id }}" type="button">
                            <span class="fe-send"></span>
                        </button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Chat: Footer -->
    </div>
    <!-- Chat: body -->

    <!-- Chat Details -->
    <div id="chatinfo" class="chat-sidebar">
        <div class="d-flex h-100 flex-column">

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
                            <h6 class="mb-n2">Bootstrap Themes</h6>
                            <small class="text-muted">Chat Details</small>
                        </li>

                        <!-- Dropdown -->
                        <li class="nav-item list-inline-item">
                            <div class="dropdown">
                                <a class="nav-link text-muted px-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-md fe-sliders"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                Mute
                                                <span class="ml-auto fe-bell"></span>
                                            </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                Delete
                                                <span class="ml-auto fe-trash-2"></span>
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

                <div class="border-bottom text-center py-9 px-10">
                    <!-- Photo -->
                    <div class="avatar avatar-xl mx-5 mb-5">
                        <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}/" alt="">
                    </div>
                    <h5>Bootstrap Themes</h5>
                    <p class="text-muted">Bootstrap is an open source toolkit for developing web with HTML, CSS, and JS.</p>
                </div>

                <!-- Navs -->
                <ul class="nav nav-tabs nav-justified bg-light rounded-0" role="tablist">
                    <li class="nav-item">
                        <a href="#chat-id-1-members" class="nav-link active" data-toggle="tab" role="tab" aria-selected="true">Members</a>
                    </li>
                    <li class="nav-item">
                        <a href="#chat-id-1-files" class="nav-link" data-toggle="tab" role="tab">Files</a>
                    </li>
                </ul>
                <!-- Navs -->

                <div class="tab-content">
                    <!-- Members -->
                    <div id="chat-id-1-members" class="tab-pane fade show active">
                        <ul class="list-group list-group-flush list-group-no-border-first">
                            <!-- Member -->
                            <li class="list-group-item py-6">
                                <div class="media align-items-center">


                                    <div class="avatar avatar-sm avatar-online mr-5">
                                        <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}/10.jpg" alt="Anna Bridges">
                                    </div>


                                    <div class="media-body">
                                        <h6 class="mb-0">
                                            <a href="#" class="text-reset">Anna Bridges</a>
                                        </h6>
                                        <small class="text-muted">Online</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Promote <span class="ml-auto fe-trending-up"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Restrict <span class="ml-auto fe-trending-down"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-user-x"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- Member -->
                            <!-- Member -->
                            <li class="list-group-item py-6">
                                <div class="media align-items-center">


                                    <div class="avatar avatar-sm avatar-online mr-5">
                                        <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Simon Hensley">
                                    </div>


                                    <div class="media-body">
                                        <h6 class="mb-0">
                                            <a href="#" class="text-reset">Simon Hensley</a>
                                        </h6>
                                        <small class="text-muted">Online</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Promote <span class="ml-auto fe-trending-up"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Restrict <span class="ml-auto fe-trending-down"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-user-x"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- Member -->
                            <!-- Member -->
                            <li class="list-group-item py-6">
                                <div class="media align-items-center">



                                    <div class="avatar avatar-sm mr-5">
                                        <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}/9.jpg" alt="William Wright">
                                    </div>

                                    <div class="media-body">
                                        <h6 class="mb-0">
                                            <a href="#" class="text-reset">William Wright</a>
                                        </h6>
                                        <small class="text-muted">last seen 7 hours ago</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Promote <span class="ml-auto fe-trending-up"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Restrict <span class="ml-auto fe-trending-down"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-user-x"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- Member -->
                            <!-- Member -->
                            <li class="list-group-item py-6">
                                <div class="media align-items-center">



                                    <div class="avatar avatar-sm mr-5">
                                        <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Leslie Sutton">
                                    </div>

                                    <div class="media-body">
                                        <h6 class="mb-0">
                                            <a href="#" class="text-reset">Leslie Sutton</a>
                                        </h6>
                                        <small class="text-muted">last seen 6 days ago</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Promote <span class="ml-auto fe-trending-up"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Restrict <span class="ml-auto fe-trending-down"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-user-x"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- Member -->
                            <!-- Member -->
                            <li class="list-group-item py-6">
                                <div class="media align-items-center">



                                    <div class="avatar avatar-sm mr-5">
                                        <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Matthew Wiggins">
                                    </div>

                                    <div class="media-body">
                                        <h6 class="mb-0">
                                            <a href="#" class="text-reset">Matthew Wiggins</a>
                                        </h6>
                                        <small class="text-muted">last seen 2 days ago</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Promote <span class="ml-auto fe-trending-up"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Restrict <span class="ml-auto fe-trending-down"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-user-x"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- Member -->
                            <!-- Member -->
                            <li class="list-group-item py-6">
                                <div class="media align-items-center">



                                    <div class="avatar avatar-sm mr-5">
                                        <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Thomas Walker">
                                    </div>

                                    <div class="media-body">
                                        <h6 class="mb-0">
                                            <a href="#" class="text-reset">Thomas Walker</a>
                                        </h6>
                                        <small class="text-muted">last seen 10 minutes ago</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Promote <span class="ml-auto fe-trending-up"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Restrict <span class="ml-auto fe-trending-down"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-user-x"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- Member -->
                            <!-- Member -->
                            <li class="list-group-item py-6">
                                <div class="media align-items-center">



                                    <div class="avatar avatar-sm mr-5">
                                        <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Zane Mayes">
                                    </div>

                                    <div class="media-body">
                                        <h6 class="mb-0">
                                            <a href="#" class="text-reset">Zane Mayes</a>
                                        </h6>
                                        <small class="text-muted">last seen 6 days ago</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Promote <span class="ml-auto fe-trending-up"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Restrict <span class="ml-auto fe-trending-down"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-user-x"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- Member -->
                            <!-- Member -->
                            <li class="list-group-item py-6">
                                <div class="media align-items-center">



                                    <div class="avatar avatar-sm mr-5">
                                        <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Brian Dawson">
                                    </div>

                                    <div class="media-body">
                                        <h6 class="mb-0">
                                            <a href="#" class="text-reset">Brian Dawson</a>
                                        </h6>
                                        <small class="text-muted">last seen 2 days ago</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Promote <span class="ml-auto fe-trending-up"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Restrict <span class="ml-auto fe-trending-down"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-user-x"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- Member -->
                            <!-- Member -->
                            <li class="list-group-item py-6">
                                <div class="media align-items-center">



                                    <div class="avatar avatar-sm mr-5">
                                        <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="William Greer">
                                    </div>

                                    <div class="media-body">
                                        <h6 class="mb-0">
                                            <a href="#" class="text-reset">William Greer</a>
                                        </h6>
                                        <small class="text-muted">last seen 10 minutes ago</small>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Promote <span class="ml-auto fe-trending-up"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Restrict <span class="ml-auto fe-trending-down"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-user-x"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- Member -->

                        </ul>
                    </div>
                    <!-- Members -->

                    <!-- Files -->
                    <div id="chat-id-1-files" class="tab-pane fade">
                        <ul class="list-group list-group-flush list-group-no-border-first">
                            <!-- File -->
                            <li class="list-group-item py-6">
                                <div class="media">

                                    <div class="icon-shape bg-primary text-white mr-5">
                                        <i class="fe-paperclip"></i>
                                    </div>

                                    <div class="media-body align-self-center overflow-hidden">
                                        <h6 class="text-truncate mb-0">
                                            <a href="#" class="text-reset" title="E5419783-047D-4B4C-B30E-F24DD8247731.JPG">E5419783-047D-4B4C-B30E-F24DD8247731.JPG</a>
                                        </h6>

                                        <ul class="list-inline small mb-0">
                                            <li class="list-inline-item">
                                                <span class="text-muted">79.2 KB</span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span class="text-muted text-uppercase">txt</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Download <span class="ml-auto fe-download"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Share <span class="ml-auto fe-share-2"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-trash-2"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- File -->

                            <!-- File -->
                            <li class="list-group-item py-6">
                                <div class="media">

                                    <div class="icon-shape bg-primary text-white mr-5">
                                        <i class="fe-paperclip"></i>
                                    </div>

                                    <div class="media-body align-self-center overflow-hidden">
                                        <h6 class="text-truncate mb-0">
                                            <a href="#" class="text-reset" title="E5419783-047D-4B4C-B30E-F24DD8247731.JPG">E5419783-047D-4B4C-B30E-F24DD8247731.JPG</a>
                                        </h6>

                                        <ul class="list-inline small mb-0">
                                            <li class="list-inline-item">
                                                <span class="text-muted">79.2 KB</span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span class="text-muted text-uppercase">psd</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Download <span class="ml-auto fe-download"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Share <span class="ml-auto fe-share-2"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-trash-2"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- File -->

                            <!-- File -->
                            <li class="list-group-item py-6">
                                <div class="media">

                                    <div class="icon-shape bg-primary text-white mr-5">
                                        <i class="fe-paperclip"></i>
                                    </div>

                                    <div class="media-body align-self-center overflow-hidden">
                                        <h6 class="text-truncate mb-0">
                                            <a href="#" class="text-reset" title="E5419783-047D-4B4C-B30E-F24DD8247731.JPG">E5419783-047D-4B4C-B30E-F24DD8247731.JPG</a>
                                        </h6>

                                        <ul class="list-inline small mb-0">
                                            <li class="list-inline-item">
                                                <span class="text-muted">79.2 KB</span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span class="text-muted text-uppercase">pdf</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Download <span class="ml-auto fe-download"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Share <span class="ml-auto fe-share-2"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-trash-2"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- File -->

                            <!-- File -->
                            <li class="list-group-item py-6">
                                <div class="media">

                                    <div class="icon-shape bg-primary text-white mr-5">
                                        <i class="fe-paperclip"></i>
                                    </div>

                                    <div class="media-body align-self-center overflow-hidden">
                                        <h6 class="text-truncate mb-0">
                                            <a href="#" class="text-reset" title="E5419783-047D-4B4C-B30E-F24DD8247731.JPG">E5419783-047D-4B4C-B30E-F24DD8247731.JPG</a>
                                        </h6>

                                        <ul class="list-inline small mb-0">
                                            <li class="list-inline-item">
                                                <span class="text-muted">79.2 KB</span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span class="text-muted text-uppercase">txt</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Download <span class="ml-auto fe-download"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Share <span class="ml-auto fe-share-2"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-trash-2"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- File -->

                            <!-- File -->
                            <li class="list-group-item py-6">
                                <div class="media">

                                    <div class="icon-shape bg-primary text-white mr-5">
                                        <i class="fe-paperclip"></i>
                                    </div>

                                    <div class="media-body align-self-center overflow-hidden">
                                        <h6 class="text-truncate mb-0">
                                            <a href="#" class="text-reset" title="E5419783-047D-4B4C-B30E-F24DD8247731.JPG">E5419783-047D-4B4C-B30E-F24DD8247731.JPG</a>
                                        </h6>

                                        <ul class="list-inline small mb-0">
                                            <li class="list-inline-item">
                                                <span class="text-muted">79.2 KB</span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span class="text-muted text-uppercase">pdf</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="align-self-center ml-5">
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-sm btn-ico btn-link text-muted w-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Download <span class="ml-auto fe-download"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Share <span class="ml-auto fe-share-2"></span>
                                                        </a>
                                                <a class="dropdown-item d-flex align-items-center" href="#">
                                                            Delete <span class="ml-auto fe-trash-2"></span>
                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </li>
                            <!-- File -->


                        </ul>
                    </div>
                    <!-- Files -->
                </div>
            </div>
            <!-- Body -->

        </div>
    </div>
    <!-- Chat Details -->

    <!-- New members -->
    <div id="chatmembers" class="chat-sidebar">
        <div class="d-flex h-100 flex-column">

            <!-- Header -->
            <div class="border-bottom py-4 py-lg-6">
                <div class="container-fluid">

                    <ul class="nav justify-content-between align-items-center">
                        <!-- Close sidebar -->
                        <li class="nav-item">
                            <a class="nav-link text-muted px-0 sidebar-close" href="#" data-chat-sidebar-close="">
                                <i class="icon-md fe-chevron-left"></i>
                            </a>
                        </li>

                        <!-- Title(mobile) -->
                        <li class="text-center d-block d-lg-none">
                            <h6 class="mb-n2">Bootstrap Themes</h6>
                            <small class="text-muted">Add Members</small>
                        </li>

                        <!-- Dropdown -->
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link text-muted px-0" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-md fe-sliders"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                Mute
                                                <span class="ml-auto fe-bell"></span>
                                            </a>
                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                Delete
                                                <span class="ml-auto fe-trash-2"></span>
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
                <!-- Search -->
                <div class="border-bottom py-7">
                    <div class="container-fluid">

                        <form action="#">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-lg" placeholder="Search for users..." aria-label="Search users...">
                                <div class="input-group-append">
                                    <button class="btn btn-lg btn-ico btn-secondary btn-minimal" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Search -->

                <!-- Members -->
                <form action="#">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item py-4">
                            <small class="text-uppercase">A</small>
                        </li>

                        <!-- Member -->
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">


                                <div class="avatar avatar-sm avatar-online mr-5">
                                    <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}/10.jpg" alt="Anna Bridges">
                                </div>


                                <div class="media-body">
                                    <h6 class="mb-0">Anna Bridges</h6>
                                    <small class="text-muted">Online</small>
                                </div>

                                <div class="align-self-center ml-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="id-add-user-chat-1-user-1" type="checkbox">
                                        <label class="custom-control-label" for="id-add-user-chat-1-user-1"></label>
                                    </div>
                                </div>

                            </div>

                            <!-- Label -->
                            <label class="stretched-label" for="id-add-user-chat-1-user-1"></label>
                        </li>
                        <!-- Member -->


                        <li class="list-group-item py-4">
                            <small class="text-uppercase">B</small>
                        </li>

                        <!-- Member -->
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">



                                <div class="avatar avatar-sm mr-5">
                                    <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Brian Dawson">
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0">Brian Dawson</h6>
                                    <small class="text-muted">last seen 2 hours ago</small>
                                </div>

                                <div class="align-self-center ml-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="id-add-user-chat-1-user-2" type="checkbox">
                                        <label class="custom-control-label" for="id-add-user-chat-1-user-2"></label>
                                    </div>
                                </div>

                            </div>

                            <!-- Label -->
                            <label class="stretched-label" for="id-add-user-chat-1-user-2"></label>
                        </li>
                        <!-- Member -->


                        <li class="list-group-item py-4">
                            <small class="text-uppercase">L</small>
                        </li>

                        <!-- Member -->
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">



                                <div class="avatar avatar-sm mr-5">
                                    <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Leslie Sutton">
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0">Leslie Sutton</h6>
                                    <small class="text-muted">last seen 3 days ago</small>
                                </div>

                                <div class="align-self-center ml-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="id-add-user-chat-1-user-3" type="checkbox">
                                        <label class="custom-control-label" for="id-add-user-chat-1-user-3"></label>
                                    </div>
                                </div>

                            </div>

                            <!-- Label -->
                            <label class="stretched-label" for="id-add-user-chat-1-user-3"></label>
                        </li>
                        <!-- Member -->


                        <li class="list-group-item py-4">
                            <small class="text-uppercase">M</small>
                        </li>

                        <!-- Member -->
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">



                                <div class="avatar avatar-sm mr-5">
                                    <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Matthew Wiggins">
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0">Matthew Wiggins</h6>
                                    <small class="text-muted">last seen 3 days ago</small>
                                </div>

                                <div class="align-self-center ml-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="id-add-user-chat-1-user-4" type="checkbox">
                                        <label class="custom-control-label" for="id-add-user-chat-1-user-4"></label>
                                    </div>
                                </div>

                            </div>

                            <!-- Label -->
                            <label class="stretched-label" for="id-add-user-chat-1-user-4"></label>
                        </li>
                        <!-- Member -->


                        <li class="list-group-item py-4">
                            <small class="text-uppercase">S</small>
                        </li>

                        <!-- Member -->
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">



                                <div class="avatar avatar-sm mr-5">
                                    <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Simon Hensley">
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0">Simon Hensley</h6>
                                    <small class="text-muted">last seen 3 days ago</small>
                                </div>

                                <div class="align-self-center ml-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="id-add-user-chat-1-user-5" type="checkbox">
                                        <label class="custom-control-label" for="id-add-user-chat-1-user-5"></label>
                                    </div>
                                </div>

                            </div>

                            <!-- Label -->
                            <label class="stretched-label" for="id-add-user-chat-1-user-5"></label>
                        </li>
                        <!-- Member -->


                        <li class="list-group-item py-4">
                            <small class="text-uppercase">W</small>
                        </li>

                        <!-- Member -->
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">



                                <div class="avatar avatar-sm mr-5">
                                    <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}/9.jpg" alt="William Wright">
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0">William Wright</h6>
                                    <small class="text-muted">last seen 3 days ago</small>
                                </div>

                                <div class="align-self-center ml-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="id-add-user-chat-1-user-6" type="checkbox">
                                        <label class="custom-control-label" for="id-add-user-chat-1-user-6"></label>
                                    </div>
                                </div>

                            </div>

                            <!-- Label -->
                            <label class="stretched-label" for="id-add-user-chat-1-user-6"></label>
                        </li>
                        <!-- Member -->
                        <!-- Member -->
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">



                                <div class="avatar avatar-sm mr-5">
                                    <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="William Greer">
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0">William Greer</h6>
                                    <small class="text-muted">last seen 10 minutes ago</small>
                                </div>

                                <div class="align-self-center ml-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="id-add-user-chat-1-user-7" type="checkbox">
                                        <label class="custom-control-label" for="id-add-user-chat-1-user-7"></label>
                                    </div>
                                </div>

                            </div>

                            <!-- Label -->
                            <label class="stretched-label" for="id-add-user-chat-1-user-7"></label>
                        </li>
                        <!-- Member -->


                        <li class="list-group-item py-4">
                            <small class="text-uppercase">Z</small>
                        </li>

                        <!-- Member -->
                        <li class="list-group-item py-6">
                            <div class="media align-items-center">



                                <div class="avatar avatar-sm mr-5">
                                    <img class="avatar-img" src="{{ asset('images/avatars/10.jpg') }}" alt="Zane Mayes">
                                </div>

                                <div class="media-body">
                                    <h6 class="mb-0">Zane Mayes</h6>
                                    <small class="text-muted">last seen 3 days ago</small>
                                </div>

                                <div class="align-self-center ml-auto">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" id="id-add-user-chat-1-user-8" type="checkbox">
                                        <label class="custom-control-label" for="id-add-user-chat-1-user-8"></label>
                                    </div>
                                </div>

                            </div>

                            <!-- Label -->
                            <label class="stretched-label" for="id-add-user-chat-1-user-8"></label>
                        </li>
                        <!-- Member -->

                    </ul>
                </form>
                <!-- Members -->
            </div>
            <!-- Body -->

            <!-- Button -->
            <div class="border-top py-7">
                <div class="container-fluid">
                    <button class="btn btn-lg btn-block btn-primary d-flex align-items-center" type="submit">
                                Add members
                                <span class="fe-user-plus ml-auto"></span>
                            </button>
                </div>
            </div>

        </div>
    </div>
    <!-- New members -->

    <!-- User's details -->
    <div id="chat-1-user-profile" class="chat-sidebar">
        <div class="d-flex h-100 flex-column" id="userD">
            
        </div>
    </div>
    <!-- User's details -->

</div>
<!-- Chat -->

@endforeach

@endif