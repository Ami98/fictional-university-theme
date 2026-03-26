import $ from 'jquery';

class Search {
    // 1. Describe and create / Initiate our object
    constructor() {
        // alert("Helloo from search.js...!!!")
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.isOverlayOpen = false;
        this.typingTimer;
        this.searchField = $("#search-term");
        this.events();
        this.resultsDiv = $("#search-overlay__results");
        this.isSpinnerVisible = false;
        this.previousValue;
    }

    // 2.events
    events() {
        // this.openButton.on("click", this.openOverlay.bind(this));
        // this.closeButton.on("click", this.closeOverlay.bind(this));

        this.openButton.on("click", () => this.openOverlay());
        this.closeButton.on("click", () => this.closeOverlay());
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
        this.searchField.on("keyup", this.typingLogic.bind(this));
    }

    // 3.methods (function, useActionState...)

    // opening search
    openOverlay() {
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");
        //console.log("our open method just ran!");
        this.isOverlayOpen = true;
    }

    // closing search
    closeOverlay() {
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        //console.log("our close method just ran!");
        this.isOverlayOpen = false;
    }

    // Shortcodut key for opening search and closing
    keyPressDispatcher(e) {
        // console.log(e.keyCode);
        //press s in keyboard to open search 
        if (e.keyCode == 83 && !this.isOverlayOpen && !$("input,textarea").is(':focus')) {
            this.openOverlay();
        }
        //press esc in keyboard to close search
        if (e.keyCode == 27 && this.isOverlayOpen) {
            this.closeOverlay();
        }
    }

    // Search FUnctionality
    typingLogic() {
        if (this.searchField.val() != this.previousValue) {
            // console.log("searchtyping");
            clearTimeout(this.typingTimer);
            // this.typingTimer = setTimeout(function () {
            //     console.log("This is timeout test");
            // }, 2000)
            if (this.searchField.val()) {

                if (!this.isSpinnerVisible) {
                    this.resultsDiv.html('<div class="spinner-loader"></div>');
                    this.isSpinnerVisible = true;
                }
                this.typingTimer = setTimeout(this.getResults.bind(this), 2000);
            } else {
                this.resultsDiv.html('');
                this.isSpinnerVisible = false;
            }
        }
        this.previousValue = this.searchField.val();
    }
    // searchField results Display
    getResults() {
        this.resultsDiv.html("Imagine real search results here...");
        this.isSpinnerVisible = false;
    }
}

export default Search