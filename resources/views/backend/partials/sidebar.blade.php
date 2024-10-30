@php
    $userRole = auth()->check() ? auth()->user()->roles->first()->slug ?? 'guest' : 'guest';
@endphp
<div class="sidebar_main">
    <div class="sidebar_items">
        <div class="sidebar_logo">
            <a href="/"><img src="{{asset('backend/assets/img/side_logo.png')}}"></a>
        </div>
        <div class="side_bar_nav">
            <ul class="side_menu list-unstyled">
                       @if($userRole === 'admin')
                    <li class="{{ Request::routeIs('admin_dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin_dashboard') }}">
                            <img src="{{ asset('backend/assets/img/square.png') }}" alt="">
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ Request::routeIs('subscription.create') ? 'active' : '' }}">
                        <a href="{{ route('subscription.lists') }}">
                            <img src="{{ asset('backend/assets/img/pricing.png') }}" alt="">
                            <span>Pricing</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('admin.categories') ? 'active' : '' }}">
                        <a href="{{ route('admin.categories') }}">
                            <img src="{{ asset('backend/assets/img/category.png') }}" alt="">
                            <span>Categories</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('blogs.index') ? 'active' : '' }}">
                        <a href="{{ route('blogs.index') }}">
                            <img src="{{ asset('backend/assets/img/blogs.png') }}" alt="">
                            <span>Blogs</span>
                        </a>
                    </li>


                    <li class="{{ Request::routeIs('admin_profile_update') ? 'active' : '' }}">
                        <a href="{{route('admin_profile_update')}}">
                            <img src="{{ asset('backend/assets/img/profile.png') }}" alt="">
                            <span>Profile Update</span>
                        </a>
                    </li>
                  <li class="{{ Request::routeIs('admin_prompts') ? 'active' : '' }}">
                    <a href="{{ route('admin_prompts') }}">
                        <img src="{{ asset('backend/assets/img/prompts.png') }}" alt="">
                        <span>Prompts</span>
                    </a>
                </li>
                       @elseif($userRole === 'content_creator')

                    <li class="{{ Request::routeIs('creator_dashboard') ? 'active' : '' }}">
                        <a href="{{ route('creator_dashboard') }}">
                            <img src="{{ asset('backend/assets/img/square.png') }}" alt="">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('creator_profile_update') ? 'active' : '' }}">
                        <a href="{{route('creator_profile_update')}}">
                            <img src="{{ asset('backend/assets/img/profile.png') }}" alt="">
                            <span>Profile Update</span>
                        </a>
                    </li>
                   <li class="{{ Request::routeIs('creator-prompts') ? 'active' : '' }}">
                       <a href="{{ route('creator-prompts') }}">
                           <img src="{{ asset('backend/assets/img/prompts.png') }}" alt="">
                           <span>Prompts</span>
                       </a>
                   </li>
                    <li class="{{ Request::routeIs('creator_chat') ? 'active' : '' }}">
                        <a href="{{ route('creator_chat') }}">
                            <img src="{{ asset('backend/assets/img/chats.png') }}" alt="">
                            <span>Chat</span>
                        </a>
                    </li>
                      @elseif($userRole === 'general_user')

                    <li class="{{ Request::routeIs('user_dashboard') ? 'active' : '' }}">
                        <a href="{{ route('user_dashboard') }}">
                            <img src="{{ asset('backend/assets/img/square.png') }}" alt="">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('user_profile_update') ? 'active' : '' }}">
                        <a href="{{route('user_profile_update')}}">
                            <img src="{{ asset('backend/assets/img/profile.png') }}" alt="">
                            <span>Profile Update</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('user_chat') ? 'active' : '' }}">
                        <a href="{{ route('user_chat') }}">
                            <img src="{{ asset('backend/assets/img/chats.png') }}" alt="">
                            <span>Chat</span>
                        </a>
                    </li>
                       @else
                           <li class="nav-item {{ Request::routeIs('prompt.create')  ? 'active' : '' }}">
                               <a class="nav-link" href="{{ route('prompt.create') }}">Create</a>
                           </li>
                       @endif

            </ul>
        </div>
    </div>
    <!--<div class="logout_btn">-->
    <!--    <a href="{{route('logout')}}" id="logoutLink"><i class="fa-solid fa-power-off"></i></a>-->
    <!--</div>-->
</div>
<script>
    document.getElementById('logoutLink').addEventListener('click', function(event) {
        event.preventDefault();
        fetch('{{ route('logout') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response => {
            if (response.ok) {
                window.location.href = '/'; // Redirect to home page
            }
        }).catch(error => console.error('Logout failed:', error));
    });
</script>
