<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            @can('info_access')
                <li class="nav-item">
                    <a href="{{ route("admin.info.index") }}" class="nav-link {{ request()->is('admin/info') || request()->is('admin/info/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.info.title') }}
                    </a>
                </li>
            @endcan

                @can('slider_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.sliders.index") }}" class="nav-link {{ request()->is('admin/sliders') || request()->is('admin/sliders/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs nav-icon">

                            </i>
                            {{ trans('cruds.slider.title') }}
                        </a>
                    </li>
                @endcan

            @can('blog_access')
                <li class="nav-item">
                    <a href="{{ route("admin.blogs.index") }}" class="nav-link {{ request()->is('admin/blogs') || request()->is('admin/blogs/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.blog.title') }}
                    </a>
                </li>
            @endcan
{{--            @can('category_access')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route("admin.categories.index") }}" class="nav-link {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}">--}}
{{--                        <i class="fa-fw fas fa-cogs nav-icon">--}}

{{--                        </i>--}}
{{--                        {{ trans('cruds.category.title') }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}
            @can('client_access')
                <li class="nav-item">
                    <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.client.title') }}
                    </a>
                </li>
            @endcan
            @can('feature_access')
                <li class="nav-item">
                    <a href="{{ route("admin.features.index") }}" class="nav-link {{ request()->is('admin/features') || request()->is('admin/features/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.feature.title') }}
                    </a>
                </li>
            @endcan

            @can('link_access')
                <li class="nav-item">
                    <a href="{{ route("admin.links.index") }}" class="nav-link {{ request()->is('admin/links') || request()->is('admin/links/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.link.title') }}
                    </a>
                </li>
            @endcan
            @can('portfolio_access')
                <li class="nav-item">
                    <a href="{{ route("admin.portfolios.index") }}" class="nav-link {{ request()->is('admin/portfolios') || request()->is('admin/portfolios/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.portfolio.title') }}
                    </a>
                </li>
            @endcan
{{--            @can('quote_access')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route("admin.quotes.index") }}" class="nav-link {{ request()->is('admin/quotes') || request()->is('admin/quotes/*') ? 'active' : '' }}">--}}
{{--                        <i class="fa-fw fas fa-cogs nav-icon">--}}

{{--                        </i>--}}
{{--                        {{ trans('cruds.quote.title') }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}
{{--            @can('rate_access')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route("admin.rates.index") }}" class="nav-link {{ request()->is('admin/rates') || request()->is('admin/rates/*') ? 'active' : '' }}">--}}
{{--                        <i class="fa-fw fas fa-cogs nav-icon">--}}

{{--                        </i>--}}
{{--                        {{ trans('cruds.rate.title') }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}
            @can('service_access')
                <li class="nav-item">
                    <a href="{{ route("admin.services.index") }}" class="nav-link {{ request()->is('admin/services') || request()->is('admin/services/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.service.title') }}
                    </a>
                </li>
            @endcan

{{--            @can('specification_access')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route("admin.specifications.index") }}" class="nav-link {{ request()->is('admin/specifications') || request()->is('admin/specifications/*') ? 'active' : '' }}">--}}
{{--                        <i class="fa-fw fas fa-cogs nav-icon">--}}

{{--                        </i>--}}
{{--                        {{ trans('cruds.specification.title') }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

{{--            @can('step_access')--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route("admin.steps.index") }}" class="nav-link {{ request()->is('admin/steps') || request()->is('admin/steps/*') ? 'active' : '' }}">--}}
{{--                        <i class="fa-fw fas fa-cogs nav-icon">--}}

{{--                        </i>--}}
{{--                        {{ trans('cruds.step.title') }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}

            @can('tag_access')
                <li class="nav-item">
                    <a href="{{ route("admin.tags.index") }}" class="nav-link {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.tag.title') }}
                    </a>
                </li>
            @endcan

            @can('team_access')
                <li class="nav-item">
                    <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is('admin/teams') || request()->is('admin/teams/*') ? 'active' : '' }}">
                        <i class="fa-fw fas fa-cogs nav-icon">

                        </i>
                        {{ trans('cruds.team.title') }}
                    </a>
                </li>
            @endcan
            @can('user_management_access')
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        {{ trans('cruds.userManagement.title') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        @can('permission_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    {{ trans('cruds.permission.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    {{ trans('cruds.role.title') }}
                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="nav-item">
                                <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    {{ trans('cruds.user.title') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
