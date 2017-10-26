@if ($hasRightSidebar)
<aside class="grid-lg-5 grid-md-5 sidebar-right-sidebar hidden-xs hidden-sm">
    @if (is_active_sidebar('right-sidebar') || (isset($enabledSidebarFilters) && is_array($enabledSidebarFilters)))
    <div class="grid">

        @if (get_field('nav_sub_enable', 'option'))
            <div class="grid-xs-12">
                <div class="box">
                    <div class="header">
                        <h4>Våra program</h4>
                    </div>
                    <div class="box-collapse">

                        {!! $navigation['sidebarMenu'] !!}
                    </div>
                </div>
            </div>
        @endif

        @if (isset($enabledSidebarFilters) && is_array($enabledSidebarFilters))
            @include('partials.blog.taxonomy-filters')
        @endif

        <?php dynamic_sidebar('right-sidebar'); ?>
    </div>
    @endif
</aside>
@endif
