var MunicipioHighSchool;

MunicipioHighSchool = MunicipioHighSchool || {};
MunicipioHighSchool.ExampleNamespace = MunicipioHighSchool.Liquid || {};

MunicipioHighSchool.ExampleNamespace.ExampleClass = (function ($) {

	var classVariable = false;

    /**
     * Constructor
     * Should be named as the class itself
     */
	function ExampleClass() {

    }

    /**
     * Method
     */
    ExampleClass.prototype.exampleMethod = function () {

    }

	return new ExampleClass();

})(jQuery);

//
// @name Local link
// @description  Finds link items with outbound links and gives them outbound class
//
MunicipioHighSchool = MunicipioHighSchool || {};
MunicipioHighSchool.Helper = MunicipioHighSchool.Helper || {};

MunicipioHighSchool.Helper.StickyScroll = (function ($) {

    var _stickyElements = [];
    var _isFloatingClass = 'sticky';

    function StickyScroll() {
        $(document).ready(function () {
            this.init();
        }.bind(this));
    }

    StickyScroll.prototype.init = function() {
        var $elements = $('.navbar-sticky');

        $elements.each(function (index, element) {
            var $element = $(element);

            _stickyElements.push({
                element: $element,
                offsetTop: $element.offset().top
            })
        });

        $(window).on('scroll', function () {
            this.scrolling();
        }.bind(this));

        this.scrolling();
    };


    /**
     * Runs when scrolling
     * @return {void}
     */
    StickyScroll.prototype.scrolling = function() {
        var scrollOffset = $(window).scrollTop();
        var navBarHeight = $('#site-header').outerHeight();
        var foldHeight;

        if ($('#site-header + .hero').length > 0) {
            foldHeight = $('#site-header + .hero').outerHeight();
        } else {
            foldHeight = $('#site-header').outerHeight();
            $('#site-header').css({'border-bottom' : "1px solid #dedede"});
        }


        if ($('body').hasClass('admin-bar')) {
            scrollOffset += 32;

            if ($(window).width() < 783) {
                scrollOffset += 14;
            }

        }

        console.log(foldHeight);
        $.each(_stickyElements, function (index, item) {

            if (scrollOffset > (foldHeight)) {

                return this.stick(item.element);
            }

            return this.unstick(item.element);
        }.bind(this));
    };

    /**
     * Makes a element sticky
     * @param  {object} $element jQuery element
     * @return {bool}
     */
    StickyScroll.prototype.stick = function($element) {
        if ($element.hasClass(_isFloatingClass)) {
            return;
        }

        if (!$element.hasClass('navbar-transparent')) {
            this.addAnchor($element);
        }

        $element.addClass(_isFloatingClass);
        return true;
    };

    /**
     * Makes a element non-sticky
     * @param  {object} $element jQuery element
     * @return {bool}
     */
    StickyScroll.prototype.unstick = function($element) {
        if (!$element.hasClass(_isFloatingClass)) {
            return;
        }

        if (!$element.hasClass('navbar-transparent')) {
            this.removeAnchor($element);
        }

        $element.removeClass(_isFloatingClass);
        return true;
    };

    StickyScroll.prototype.addAnchor = function($element) {
        $('<div class="sticky-scroll-anchor"></div>').height($element.outerHeight()).insertBefore($element);
        return true;
    };

    StickyScroll.prototype.removeAnchor = function($element) {
        $element.prev('.sticky-scroll-anchor').remove();
        return true;
    };

    return new StickyScroll();

})(jQuery);
