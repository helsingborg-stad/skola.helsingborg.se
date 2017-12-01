<?php do_action('customer-feedback'); ?>

<footer class="page-footer">
    @if (get_field('post_show_share', get_the_id()) !== false && get_field('page_show_share', 'option') !== false)
    <div class="grid">
        <div class="grid-xs-12">
                @include('partials.social-share')
        </div>
    </div>
    @endif

    <div class="grid">
        <div class="grid-xs-12">
            @include('partials.timestamps')
        </div>
    </div>
</footer>
