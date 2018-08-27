@if ($hasRightSidebar)
    <?php
    $cols = 'grid-lg-5 grid-md-5';
    if (is_archive() && is_active_sidebar('right-sidebar')) {
        $cols = 'grid-lg-3 grid-md-4';
    }
    ?>
    <aside class="{{ $cols }} sidebar-right-sidebar">
    @if (is_active_sidebar('right-sidebar') || (isset($enabledSidebarFilters) && is_array($enabledSidebarFilters)))
    <div class="grid">

        @if (get_field('nav_sub_enable', 'option') && !empty($navigation['sidebarMenu']))
            <div class="grid-xs-12 hidden-xs hidden-sm">
                <div class="box">
                    @if($menuTitle)
                        <header class="box__header">
                            <h4 class="text-color-4">{{ $menuTitle }}</h4>
                        </header>
                    @endif
                    {!! $navigation['sidebarMenu'] !!}
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
