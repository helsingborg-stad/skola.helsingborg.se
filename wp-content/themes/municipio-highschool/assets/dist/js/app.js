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
        }

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

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsImV4YW1wbGVDbGFzcy5qcyIsIm5hdmJhci1zdGlja3kuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQ0RBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUN6QkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbInZhciBNdW5pY2lwaW9IaWdoU2Nob29sO1xuIiwiTXVuaWNpcGlvSGlnaFNjaG9vbCA9IE11bmljaXBpb0hpZ2hTY2hvb2wgfHwge307XG5NdW5pY2lwaW9IaWdoU2Nob29sLkV4YW1wbGVOYW1lc3BhY2UgPSBNdW5pY2lwaW9IaWdoU2Nob29sLkxpcXVpZCB8fCB7fTtcblxuTXVuaWNpcGlvSGlnaFNjaG9vbC5FeGFtcGxlTmFtZXNwYWNlLkV4YW1wbGVDbGFzcyA9IChmdW5jdGlvbiAoJCkge1xuXG5cdHZhciBjbGFzc1ZhcmlhYmxlID0gZmFsc2U7XG5cbiAgICAvKipcbiAgICAgKiBDb25zdHJ1Y3RvclxuICAgICAqIFNob3VsZCBiZSBuYW1lZCBhcyB0aGUgY2xhc3MgaXRzZWxmXG4gICAgICovXG5cdGZ1bmN0aW9uIEV4YW1wbGVDbGFzcygpIHtcblxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIE1ldGhvZFxuICAgICAqL1xuICAgIEV4YW1wbGVDbGFzcy5wcm90b3R5cGUuZXhhbXBsZU1ldGhvZCA9IGZ1bmN0aW9uICgpIHtcblxuICAgIH1cblxuXHRyZXR1cm4gbmV3IEV4YW1wbGVDbGFzcygpO1xuXG59KShqUXVlcnkpO1xuIiwiLy9cbi8vIEBuYW1lIExvY2FsIGxpbmtcbi8vIEBkZXNjcmlwdGlvbiAgRmluZHMgbGluayBpdGVtcyB3aXRoIG91dGJvdW5kIGxpbmtzIGFuZCBnaXZlcyB0aGVtIG91dGJvdW5kIGNsYXNzXG4vL1xuTXVuaWNpcGlvSGlnaFNjaG9vbCA9IE11bmljaXBpb0hpZ2hTY2hvb2wgfHwge307XG5NdW5pY2lwaW9IaWdoU2Nob29sLkhlbHBlciA9IE11bmljaXBpb0hpZ2hTY2hvb2wuSGVscGVyIHx8IHt9O1xuXG5NdW5pY2lwaW9IaWdoU2Nob29sLkhlbHBlci5TdGlja3lTY3JvbGwgPSAoZnVuY3Rpb24gKCQpIHtcblxuICAgIHZhciBfc3RpY2t5RWxlbWVudHMgPSBbXTtcbiAgICB2YXIgX2lzRmxvYXRpbmdDbGFzcyA9ICdzdGlja3knO1xuXG4gICAgZnVuY3Rpb24gU3RpY2t5U2Nyb2xsKCkge1xuICAgICAgICAkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICB0aGlzLmluaXQoKTtcbiAgICAgICAgfS5iaW5kKHRoaXMpKTtcbiAgICB9XG5cbiAgICBTdGlja3lTY3JvbGwucHJvdG90eXBlLmluaXQgPSBmdW5jdGlvbigpIHtcbiAgICAgICAgdmFyICRlbGVtZW50cyA9ICQoJy5uYXZiYXItc3RpY2t5Jyk7XG5cbiAgICAgICAgJGVsZW1lbnRzLmVhY2goZnVuY3Rpb24gKGluZGV4LCBlbGVtZW50KSB7XG4gICAgICAgICAgICB2YXIgJGVsZW1lbnQgPSAkKGVsZW1lbnQpO1xuXG4gICAgICAgICAgICBfc3RpY2t5RWxlbWVudHMucHVzaCh7XG4gICAgICAgICAgICAgICAgZWxlbWVudDogJGVsZW1lbnQsXG4gICAgICAgICAgICAgICAgb2Zmc2V0VG9wOiAkZWxlbWVudC5vZmZzZXQoKS50b3BcbiAgICAgICAgICAgIH0pXG4gICAgICAgIH0pO1xuXG4gICAgICAgICQod2luZG93KS5vbignc2Nyb2xsJywgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgdGhpcy5zY3JvbGxpbmcoKTtcbiAgICAgICAgfS5iaW5kKHRoaXMpKTtcblxuICAgICAgICB0aGlzLnNjcm9sbGluZygpO1xuICAgIH07XG5cblxuICAgIC8qKlxuICAgICAqIFJ1bnMgd2hlbiBzY3JvbGxpbmdcbiAgICAgKiBAcmV0dXJuIHt2b2lkfVxuICAgICAqL1xuICAgIFN0aWNreVNjcm9sbC5wcm90b3R5cGUuc2Nyb2xsaW5nID0gZnVuY3Rpb24oKSB7XG4gICAgICAgIHZhciBzY3JvbGxPZmZzZXQgPSAkKHdpbmRvdykuc2Nyb2xsVG9wKCk7XG4gICAgICAgIHZhciBuYXZCYXJIZWlnaHQgPSAkKCcjc2l0ZS1oZWFkZXInKS5vdXRlckhlaWdodCgpO1xuICAgICAgICB2YXIgZm9sZEhlaWdodDtcblxuICAgICAgICBpZiAoJCgnI3NpdGUtaGVhZGVyICsgLmhlcm8nKS5sZW5ndGggPiAwKSB7XG4gICAgICAgICAgICBmb2xkSGVpZ2h0ID0gJCgnI3NpdGUtaGVhZGVyICsgLmhlcm8nKS5vdXRlckhlaWdodCgpO1xuICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgZm9sZEhlaWdodCA9ICQoJyNzaXRlLWhlYWRlcicpLm91dGVySGVpZ2h0KCk7XG4gICAgICAgIH1cblxuICAgICAgICAkLmVhY2goX3N0aWNreUVsZW1lbnRzLCBmdW5jdGlvbiAoaW5kZXgsIGl0ZW0pIHtcblxuICAgICAgICAgICAgaWYgKHNjcm9sbE9mZnNldCA+IChmb2xkSGVpZ2h0KSkge1xuXG4gICAgICAgICAgICAgICAgcmV0dXJuIHRoaXMuc3RpY2soaXRlbS5lbGVtZW50KTtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgcmV0dXJuIHRoaXMudW5zdGljayhpdGVtLmVsZW1lbnQpO1xuICAgICAgICB9LmJpbmQodGhpcykpO1xuICAgIH07XG5cbiAgICAvKipcbiAgICAgKiBNYWtlcyBhIGVsZW1lbnQgc3RpY2t5XG4gICAgICogQHBhcmFtICB7b2JqZWN0fSAkZWxlbWVudCBqUXVlcnkgZWxlbWVudFxuICAgICAqIEByZXR1cm4ge2Jvb2x9XG4gICAgICovXG4gICAgU3RpY2t5U2Nyb2xsLnByb3RvdHlwZS5zdGljayA9IGZ1bmN0aW9uKCRlbGVtZW50KSB7XG4gICAgICAgIGlmICgkZWxlbWVudC5oYXNDbGFzcyhfaXNGbG9hdGluZ0NsYXNzKSkge1xuICAgICAgICAgICAgcmV0dXJuO1xuICAgICAgICB9XG5cbiAgICAgICAgaWYgKCEkZWxlbWVudC5oYXNDbGFzcygnbmF2YmFyLXRyYW5zcGFyZW50JykpIHtcbiAgICAgICAgICAgIHRoaXMuYWRkQW5jaG9yKCRlbGVtZW50KTtcbiAgICAgICAgfVxuXG4gICAgICAgICRlbGVtZW50LmFkZENsYXNzKF9pc0Zsb2F0aW5nQ2xhc3MpO1xuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9O1xuXG4gICAgLyoqXG4gICAgICogTWFrZXMgYSBlbGVtZW50IG5vbi1zdGlja3lcbiAgICAgKiBAcGFyYW0gIHtvYmplY3R9ICRlbGVtZW50IGpRdWVyeSBlbGVtZW50XG4gICAgICogQHJldHVybiB7Ym9vbH1cbiAgICAgKi9cbiAgICBTdGlja3lTY3JvbGwucHJvdG90eXBlLnVuc3RpY2sgPSBmdW5jdGlvbigkZWxlbWVudCkge1xuICAgICAgICBpZiAoISRlbGVtZW50Lmhhc0NsYXNzKF9pc0Zsb2F0aW5nQ2xhc3MpKSB7XG4gICAgICAgICAgICByZXR1cm47XG4gICAgICAgIH1cblxuICAgICAgICBpZiAoISRlbGVtZW50Lmhhc0NsYXNzKCduYXZiYXItdHJhbnNwYXJlbnQnKSkge1xuICAgICAgICAgICAgdGhpcy5yZW1vdmVBbmNob3IoJGVsZW1lbnQpO1xuICAgICAgICB9XG5cbiAgICAgICAgJGVsZW1lbnQucmVtb3ZlQ2xhc3MoX2lzRmxvYXRpbmdDbGFzcyk7XG4gICAgICAgIHJldHVybiB0cnVlO1xuICAgIH07XG5cbiAgICBTdGlja3lTY3JvbGwucHJvdG90eXBlLmFkZEFuY2hvciA9IGZ1bmN0aW9uKCRlbGVtZW50KSB7XG4gICAgICAgICQoJzxkaXYgY2xhc3M9XCJzdGlja3ktc2Nyb2xsLWFuY2hvclwiPjwvZGl2PicpLmhlaWdodCgkZWxlbWVudC5vdXRlckhlaWdodCgpKS5pbnNlcnRCZWZvcmUoJGVsZW1lbnQpO1xuICAgICAgICByZXR1cm4gdHJ1ZTtcbiAgICB9O1xuXG4gICAgU3RpY2t5U2Nyb2xsLnByb3RvdHlwZS5yZW1vdmVBbmNob3IgPSBmdW5jdGlvbigkZWxlbWVudCkge1xuICAgICAgICAkZWxlbWVudC5wcmV2KCcuc3RpY2t5LXNjcm9sbC1hbmNob3InKS5yZW1vdmUoKTtcbiAgICAgICAgcmV0dXJuIHRydWU7XG4gICAgfTtcblxuICAgIHJldHVybiBuZXcgU3RpY2t5U2Nyb2xsKCk7XG5cbn0pKGpRdWVyeSk7XG4iXX0=
