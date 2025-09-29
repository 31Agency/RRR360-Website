<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @can('info_access')
            <li class="nav-item">
                <a href="{{ route("admin.info.index") }}"
                   class="nav-link {{ request()->is('admin/info') || request()->is('admin/info/*') ? 'active' : 'collapsed' }}">
                    <i class="fa-fw fas fa-info-circle"></i>
                    <span>{{ trans('cruds.info.title') }}</span>
                </a>
            </li>
        @endcan
        @can('visitor_access')
            <li class="nav-item">
                <a href="{{ route("admin.visitors.index") }}"
                   class="nav-link {{ request()->is('admin/visitors') || request()->is('admin/visitors/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-globe fa-fw"></i>
                    {{ trans('cruds.visitor.title') }}
                </a>
            </li>
        @endcan
        @can('slider_access')
            <li class="nav-item">
                <a href="{{ route("admin.sliders.index") }}"
                   class="nav-link {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-sliders-h fa-fw"></i>
                    {{ trans('cruds.slider.title') }}
                </a>
            </li>
        @endcan
        @can('category_access')
            <li class="nav-item">
                <a href="{{ route("admin.categories.index") }}"
                   class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-th-large fa-fw"></i>
                    <span>{{ trans('cruds.category.title') }}</span>
                </a>
            </li>
        @endcan
        @can('section_access')
            <li class="nav-item">
                <a href="{{ route("admin.sections.index") }}"
                   class="nav-link {{ request()->is('admin/sections') || request()->is('admin/sections/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-list fa-fw"></i>
                    <span>{{ trans('cruds.section.title') }}</span>
                </a>
            </li>
        @endcan
        @can('specification_access')
            <li class="nav-item">
                <a href="{{ route("admin.specifications.index") }}"
                   class="nav-link {{ request()->is('admin/specifications') || request()->is('admin/specifications/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-list fa-fw"></i>
                    <span>{{ trans('cruds.specification.title') }}</span>
                </a>
            </li>
        @endcan
        @can('floor_access')
            <li class="nav-item">
                <a href="{{ route("admin.floors.index") }}"
                   class="nav-link {{ request()->is('admin/floors') || request()->is('admin/floors/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-list fa-fw"></i>
                    <span>{{ trans('cruds.floor.title') }}</span>
                </a>
            </li>
        @endcan
        @can('furnishing_access')
            <li class="nav-item">
                <a href="{{ route("admin.furnishings.index") }}"
                   class="nav-link {{ request()->is('admin/furnishings') || request()->is('admin/furnishings/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-list fa-fw"></i>
                    <span>{{ trans('cruds.furnishing.title') }}</span>
                </a>
            </li>
        @endcan
        @can('owner_access')
            <li class="nav-item">
                <a href="{{ route("admin.owners.index") }}"
                   class="nav-link {{ request()->is('admin/owners') || request()->is('admin/owners/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-list fa-fw"></i>
                    <span>{{ trans('cruds.owner.title') }}</span>
                </a>
            </li>
        @endcan
        @can('status_access')
            <li class="nav-item">
                <a href="{{ route("admin.statuses.index") }}"
                   class="nav-link {{ request()->is('admin/statuses') || request()->is('admin/statuses/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-list fa-fw"></i>
                    <span>{{ trans('cruds.status.title') }}</span>
                </a>
            </li>
        @endcan
        @can('property_access')
            <li class="nav-item">
                <a href="{{ route("admin.properties.index") }}"
                   class="nav-link {{ request()->is('admin/properties') || request()->is('admin/properties/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-briefcase fa-fw"></i>
                    <span>{{ trans('cruds.property.title') }}</span>
                </a>
            </li>
        @endcan
        @can('social_access')
            <li class="nav-item">
                <a href="{{ route("admin.socials.index") }}"
                   class="nav-link {{ request()->is('admin/socials') || request()->is('admin/socials/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-share-alt fa-fw"></i>
                    <span>{{ trans('cruds.social.title') }}</span>
                </a>
            </li>
        @endcan
        @can('link_access')
            <li class="nav-item">
                <a href="{{ route("admin.links.index") }}"
                   class="nav-link {{ request()->is('admin/links') || request()->is('admin/links/*') ? 'active' : 'collapsed' }}">
                    <i class="fab fa-instagram fa-fw"></i>
                    <span>{{ trans('cruds.link.title') }}</span>
                </a>
            </li>
        @endcan
        @can('faq_access')
            <li class="nav-item">
                <a href="{{ route("admin.faqs.index") }}"
                   class="nav-link {{ request()->is('admin/faqs') || request()->is('admin/faqs/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-question-circle fa-fw"></i>
                    <span>{{ trans('cruds.faq.title') }}</span>
                </a>
            </li>
        @endcan
        @can('gallery_access')
            <li class="nav-item">
                <a href="{{ route("admin.galleries.index") }}"
                   class="nav-link {{ request()->is('admin/galleries') || request()->is('admin/galleries/*') ? 'active' : 'collapsed' }}">
                    <i class="fas fa-images fa-fw"></i>
                    <span>{{ trans('cruds.gallery.title') }}</span>
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="nav-item {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                <a class="nav-link collapsed" data-bs-target="#user_management_access" data-bs-toggle="collapse"
                   href="#">
                    <i class="fa-fw fas fa-users"></i><span>{{ trans('cruds.userManagement.title') }}</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="user_management_access"
                    class="nav-content collapse {{ request()->is('admin/permissions*') ? 'show' : '' }} {{ request()->is('admin/roles*') ? 'show' : '' }} {{ request()->is('admin/users*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    @can('permission_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.permissions.index") }}"
                               class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : 'collapsed' }}">
                                <i class="fa-fw fas fa-unlock-alt">

                                </i>
                                <span>{{ trans('cruds.permission.title') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.roles.index") }}"
                               class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : 'collapsed' }}">
                                <i class="fa-fw fas fa-briefcase">

                                </i>
                                <span>{{ trans('cruds.role.title') }}</span>
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.users.index") }}"
                               class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : 'collapsed' }}">
                                <i class="fa-fw fas fa-user">

                                </i>
                                <span>Users</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li><!-- End Forms Nav -->
        @endcan

    </ul>

</aside><!-- End Sidebar-->
