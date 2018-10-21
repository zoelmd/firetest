<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"></div>
            </li>

           <li class="nav-item start @php echo "active",(request()->path() != 'dashboard')?:"";@endphp">
                <a href="{{route('admin.dashboard')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Recharge</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.orders') }}" class="nav-link">
                            <i class="fa fa-th-list"></i>
                            <span class="title">Recharge Request</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.transtions') }}" class="nav-link">
                            <i class="fa fa-money"></i>
                            <span class="title">Transtion History</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-globe"></i>
                    <span class="title">Country</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('get.countries') }}" class="nav-link">
                            <i class="fa fa-th-list"></i>
                            <span class="title">Country List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-signal"></i>
                    <span class="title">Operator</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('get.operators') }}" class="nav-link">
                            <i class="fa fa-th-list"></i>
                            <span class="title">Operator List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-comments"></i>
                    <span class="title">Feedback & Contact</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('contact.messgae.list') }}" class="nav-link">
                            <i class="fa fa-bars"></i>
                            <span class="title">Message</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Web Settings</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{ route('admin.edit.general.setting') }}" class="nav-link">
                            <i class="fa fa-cog"></i>
                            <span class="title">General Setting</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.edit.gateway')}}" class="nav-link">
                            <i class="fa fa-btc"></i>
                            <span class="title">Bitcoin Setting</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--Interface Setting-->
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Interface Settings</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li class="nav-item">
                        <a href="{{route('admin.change.logo.icon')}}" class="nav-link nav-toggle">
                            <i class="fa fa-picture-o"></i>
                            <span class="title">Logo Change</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('menu.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-bars"></i>
                            <span class="title">Menu</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{route('slider')}}" class="nav-link">
                            <i class="fa fa-picture-o"></i>
                            <span class="title">Silder Setting</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.recharegeStep.index')}}" class="nav-link">
                            <i class="fa fa-sliders"></i>
                            <span class="title">Recharge Step</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{route('admin.socials.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-share-alt-square"></i>
                            <span class="title">Social Link</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.contact.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-info"></i>
                            <span class="title">Contact Info</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('admin.faqs.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-question-circle"></i>
                            <span class="title">FAQ</span>
                        </a>
                    </li>
                </ul>
            </li>

            
        </ul>
    </div>
</div>
<!-- END SIDEBAR -->
