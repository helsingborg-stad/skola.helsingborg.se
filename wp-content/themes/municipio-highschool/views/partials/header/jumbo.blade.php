<div class="search-top {!! apply_filters('Municipio/desktop_menu_breakpoint', 'hidden-sm'); !!} hidden-print" id="search">
    <div class="container">
        <div class="grid">
            <div class="grid-sm-12">
                {{ get_search_form() }}
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-mainmenu hidden-print {{ is_front_page() && get_field('header_transparent', 'option') ? 'navbar-transparent' : '' }} {{ get_field('header_sticky', 'option') ? apply_filters( 'Municipio/StickyScroll', 'sticky-scroll' ) : '' }}">
    <div class="container">
        <div class="nav-wrapper">
            <!-- Brand -->
            <div class="brand">
                {!! municipio_get_logotype(get_field('header_logotype', 'option'), get_field('logotype_tooltip', 'option')) !!}
            </div>

            <!-- Navigation links -->
            @if (get_field('nav_primary_enable', 'option') === true)
                <nav class="{!! apply_filters('Municipio/Jumbo/NavGroupClass', 'nav-group-overflow'); !!} hidden-xs hidden-sm" data-btn-width="100">
                    {!! $navigation['mainMenu'] !!}

                    <span class="dropdown">
                        <span class="btn btn-primary dropdown-toggle hidden"><?php _e('More', 'municipio'); ?></span>
                        <ul class="dropdown-menu nav-grouped-overflow hidden"></ul>
                    </span>


                    @if (get_field('header_dropdown_links', 'option') === true && \Municipio\Helper\Navigation::getMenuNameByLocation('dropdown-links-menu'))
                        <span class="c-dropdown _nav-dropdown t-dropdown js-dropdown hidden-xs hidden-sm hidden-md">
                            <button class="c-dropdown__toggle c-dropdown__toggle--caret-right js-dropdown__toggle btn btn-primary">{{ \Municipio\Helper\Navigation::getMenuNameByLocation('dropdown-links-menu')}}</button>
                            <span class="c-dropdown__menu">
                                {!! \Municipio\Theme\Navigation::outputDropdownLinksMenu() !!}
                            </span>
                        </span>
                    @endif
                </nav>
            @endif
            <!-- Mobile menu -->
            @if (strlen($navigation['mobileMenu']) > 0)
            <a href="#mobile-menu" data-target="#mobile-menu" class="{!! apply_filters('Municipio/mobile_menu_breakpoint', 'hidden-md hidden-lg'); !!} menu-trigger"><span class="menu-icon"></span></a>
            @endif

        </div>
    </div>
</nav>

@if (strlen($navigation['mobileMenu']) > 0)
    <nav id="mobile-menu" class="nav-mobile-menu nav-toggle-expand nav-toggle {!! apply_filters('Municipio/mobile_menu_breakpoint', 'hidden-md hidden-lg'); !!} hidden-print">
        @include('partials.mobile-menu')
    </nav>
@endif
