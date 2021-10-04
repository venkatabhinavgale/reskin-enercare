"use strict";

document.addEventListener(
    "DOMContentLoaded", () => {
        const menu = new MmenuLight(
            document.querySelector( "#slider-menu" ),
            "(max-width: 768px)"
        );

        const body = document.querySelector( "body");

        const navigator = menu.navigation();
        const drawer = menu.offcanvas();

        document.querySelector( "a[href='#slider-menu']" )
            .addEventListener( "click", ( evnt ) => {
                evnt.preventDefault();
                if(body.classList.contains('mm-ocd-opened')) {
                    drawer.close();
                } else {
                    drawer.open();
                }
            });
    }
);