!(function (l) {
    "use strict";
    function t() {
        (this.body = l("body")), (this.window = l(window));
    }
    (t.prototype._reset = function () {
        this.body.removeAttr("data-sidebar-color"),
            this.body.removeAttr("data-sidebar-size"),
            this.body.removeAttr("data-sidebar-showuser");
    }),
        (t.prototype.changeColor = function (t) {
            this.body.attr("data-sidebar-color", t),
                this.parent.updateConfig("sidebar", { color: t });
        }),
        (t.prototype.changeSize = function (t) {
            this.body.attr("data-sidebar-size", t),
                this.parent.updateConfig("sidebar", { size: t });
        }),
        (t.prototype.showUser = function (t) {
            this.body.attr("data-sidebar-showuser", t),
                this.parent.updateConfig("sidebar", { showuser: t });
        }),
        (t.prototype.initMenu = function () {
            var i = this,
                t = l.LayoutThemeApp.getConfig(),
                e = l.extend({}, t ? t.sidebar : {}),
                a = e.size ? e.size : "default";
            this._reset(),
                l(".button-menu-mobile").on("click", function (t) {
                    t.preventDefault();
                    var e = i.body.attr("data-sidebar-size");
                    1300 <= i.window.width()
                        ? "condensed" === e
                            ? i.changeSize(a)
                            : i.changeSize("condensed")
                        : (i.changeSize(a),
                          i.body.toggleClass("sidebar-enable"));
                }),
                l("#side-menu").length &&
                    ((s = l("#side-menu li .collapse")).on({
                        "show.bs.collapse": function (t) {
                            var e = l(t.target).parents(".collapse.show");
                            l("#side-menu .collapse.show")
                                .not(e)
                                .collapse("hide");
                        },
                    }),
                    l("#side-menu a").each(function () {
                        var t = window.location.href.split(/[?#]/)[0];
                        if (this.href == t) {
                            l(this).addClass("active"),
                                l(this).parent().addClass("menuitem-active"),
                                l(this)
                                    .parent()
                                    .parent()
                                    .parent()
                                    .addClass("show"),
                                l(this)
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .addClass("menuitem-active");
                            var e = l(this)
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent();
                            "sidebar-menu" !== e.attr("id") &&
                                e.addClass("show"),
                                l(this)
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .addClass("menuitem-active");
                            var i = l(this)
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent();
                            "wrapper" !== i.attr("id") && i.addClass("show");
                            var a = l(this)
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent();
                            a.is("body") || a.addClass("menuitem-active");
                        }
                    }));
            if (l("#two-col-sidenav-main").length) {
                var n = l("#two-col-sidenav-main .nav-link"),
                    o = l(".twocolumn-menu-item");
                585 <= this.window.width()
                    ? n.tooltip("enable")
                    : n.tooltip("disable");
                var s,
                    r = l(".twocolumn-menu-item .nav-second-level");
                (s = l("#two-col-menu li .collapse")).on({
                    "show.bs.collapse": function () {
                        var t = l(this).closest(r).closest(r).find(s);
                        t.length
                            ? t.not(l(this)).collapse("hide")
                            : s.not(l(this)).collapse("hide");
                    },
                }),
                    n.on("click", function (t) {
                        var e = l(l(this).attr("href"));
                        return (
                            !e.length ||
                            (t.preventDefault(),
                            n.removeClass("active"),
                            l(this).addClass("active"),
                            o.removeClass("d-block"),
                            e.addClass("d-block"),
                            l.LayoutThemeApp.leftSidebar.changeSize("default"),
                            !1)
                        );
                    });
                var d = window.location.href.split(/[?#]/)[0];
                n.each(function () {
                    this.href == d && l(this).addClass("active");
                }),
                    l("#two-col-menu a").each(function () {
                        if (this.href == d) {
                            l(this).addClass("active"),
                                l(this).parent().addClass("menuitem-active"),
                                l(this)
                                    .parent()
                                    .parent()
                                    .parent()
                                    .addClass("show"),
                                l(this)
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .addClass("menuitem-active");
                            var t = l(this)
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent();
                            "sidebar-menu" !== t.attr("id") &&
                                t.addClass("show"),
                                l(this)
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .parent()
                                    .addClass("menuitem-active");
                            var e = l(this)
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent();
                            "wrapper" !== e.attr("id") && e.addClass("show");
                            var i = l(this)
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .parent();
                            i.is("body") || i.addClass("menuitem-active");
                            var a = null,
                                n =
                                    "#" +
                                    l(this)
                                        .parents(".twocolumn-menu-item")
                                        .attr("id");
                            l("#two-col-sidenav-main .nav-link").each(
                                function () {
                                    l(this).attr("href") === n && (a = l(this));
                                }
                            ),
                                a && a.trigger("click");
                        }
                    });
            }
        }),
        (t.prototype.initLayout = function () {
            (768 <= this.window.width() && this.window.width() <= 1028) ||
            this.body.data("keep-enlarged")
                ? this.changeSize("condensed")
                : this.changeSize("default");
        }),
        (t.prototype.init = function () {
            var e = this;
            this.initMenu(),
                this.initLayout(),
                this.window.on("resize", function (t) {
                    t.preventDefault(), e.initLayout();
                });
        }),
        (l.LeftSidebar = new t()),
        (l.LeftSidebar.Constructor = t);
})(window.jQuery),
    (function (i) {
        "use strict";
        function t() {
            (this.body = i("body")), (this.window = i(window));
        }
        (t.prototype.initMenu = function () {
            i("#top-search").on("click", function (t) {
                i("#search-dropdown").addClass("d-block");
            }),
                i(".topbar-dropdown").on("show.bs.dropdown", function () {
                    i("#search-dropdown").removeClass("d-block");
                }),
                i(".navbar-nav a").each(function () {
                    var t = window.location.href.split(/[?#]/)[0];
                    if (this.href == t) {
                        i(this).addClass("active"),
                            i(this).parent().addClass("active"),
                            i(this).parent().parent().addClass("active"),
                            i(this)
                                .parent()
                                .parent()
                                .parent()
                                .addClass("active"),
                            i(this)
                                .parent()
                                .parent()
                                .parent()
                                .parent()
                                .addClass("active");
                        var e = i(this)
                            .parent()
                            .parent()
                            .parent()
                            .parent()
                            .addClass("active")
                            .prev();
                        e.hasClass("nav-link") && e.addClass("active");
                    }
                }),
                i(".navbar-toggle").on("click", function (t) {
                    i(this).toggleClass("open"),
                        i("#navigation").slideToggle(400);
                });
        }),
            (t.prototype.changeColor = function (t) {
                this.body.attr("data-topbar-color", t),
                    this.parent.updateConfig("topbar", { color: t });
            }),
            (t.prototype.init = function () {
                this.initMenu();
            }),
            (i.Topbar = new t()),
            (i.Topbar.Constructor = t);
    })(window.jQuery),
    (function (i) {
        "use strict";
        function t() {
            (this.body = i("body")), (this.window = i(window));
        }
        (t.prototype.selectOptionsFromConfig = function () {
            var t = this.layout.getConfig();
            t &&
                (i(
                    "input[type=radio][name=color-scheme-mode][value=" +
                        t.mode +
                        "]"
                ).prop("checked", !0),
                i("input[type=radio][name=width][value=" + t.width + "]").prop(
                    "checked",
                    !0
                ),
                i(
                    "input[type=radio][name=menus-position][value=" +
                        t.menuPosition +
                        "]"
                ).prop("checked", !0),
                i(
                    "input[type=radio][name=leftsidebar-color][value=" +
                        t.sidebar.color +
                        "]"
                ).prop("checked", !0),
                i(
                    "input[type=radio][name=leftsidebar-size][value=" +
                        t.sidebar.size +
                        "]"
                ).prop("checked", !0),
                i("input[type=checkbox][name=leftsidebar-user]").prop(
                    "checked",
                    t.sidebar.showuser
                ),
                i(
                    "input[type=radio][name=topbar-color][value=" +
                        t.topbar.color +
                        "]"
                ).prop("checked", !0));
        }),
            (t.prototype.toggleRightSideBar = function () {
                this.body.toggleClass("right-bar-enabled"),
                    this.selectOptionsFromConfig();
            }),
            (t.prototype.init = function () {
                var e = this;
                i(document).on("click", ".right-bar-toggle", function () {
                    e.toggleRightSideBar();
                }),
                    i(document).on("click", "body", function (t) {
                        1 !== i(t.target).closest("#top-search").length &&
                            i("#search-dropdown").removeClass("d-block"),
                            0 <
                                i(t.target).closest(
                                    ".right-bar-toggle, .right-bar"
                                ).length ||
                                0 <
                                    i(t.target).closest(
                                        ".left-side-menu, .side-nav"
                                    ).length ||
                                i(t.target).hasClass("button-menu-mobile") ||
                                0 <
                                    i(t.target).closest(".button-menu-mobile")
                                        .length ||
                                (i("body").removeClass("right-bar-enabled"),
                                i("body").removeClass("sidebar-enable"));
                    }),
                    i("input[type=radio][name=color-scheme-mode]").change(
                        function () {
                            e.layout.changeMode(i(this).val());
                        }
                    ),
                    i("input[type=radio][name=width]").change(function () {
                        e.layout.changeLayoutWidth(i(this).val());
                    }),
                    i("input[type=radio][name=menus-position]").change(
                        function () {
                            e.layout.changeMenuPositions(i(this).val());
                        }
                    ),
                    i("input[type=radio][name=leftsidebar-color]").change(
                        function () {
                            e.layout.leftSidebar.changeColor(i(this).val());
                        }
                    ),
                    i("input[type=radio][name=leftsidebar-size]").change(
                        function () {
                            e.layout.leftSidebar.changeSize(i(this).val());
                        }
                    ),
                    i("input[type=checkbox][name=leftsidebar-user]").change(
                        function (t) {
                            e.layout.leftSidebar.showUser(t.target.checked);
                        }
                    ),
                    i("input[type=radio][name=topbar-color]").change(
                        function () {
                            e.layout.topbar.changeColor(i(this).val());
                        }
                    ),
                    i("#resetBtn").on("click", function (t) {
                        t.preventDefault(),
                            e.layout.reset(),
                            e.selectOptionsFromConfig();
                    });
            }),
            (i.RightBar = new t()),
            (i.RightBar.Constructor = t);
    })(window.jQuery),
    (function (n) {
        "use strict";
        function t() {
            (this.body = n("body")),
                (this.window = n(window)),
                (this.config = {}),
                (this.defaultBSStyle = n("#bs-default-stylesheet")),
                (this.defaultAppStyle = n("#app-default-stylesheet")),
                (this.darkBSStyle = n("#bs-dark-stylesheet")),
                (this.darkAppStyle = n("#app-dark-stylesheet"));
        }
        (t.prototype._saveConfig = function (t) {
            this.config = n.extend(this.config, t);
        }),
            (t.prototype.updateConfig = function (t, e) {
                var i = {};
                if ("object" == typeof e && null !== e) {
                    var a = this.config[t];
                    i[t] = n.extend(a, e);
                } else i[t] = e;
                this._saveConfig(i);
            }),
            (t.prototype.loadConfig = function () {
                var t = JSON.parse(
                        this.body.attr("data-layout")
                            ? this.body.attr("data-layout")
                            : "{}"
                    ),
                    e = n.extend(
                        {},
                        {
                            mode: "light",
                            width: "fluid",
                            menuPosition: "fixed",
                            sidebar: {
                                color: "light",
                                size: "default",
                                showuser: !1,
                            },
                            topbar: { color: "dark" },
                            showRightSidebarOnPageLoad: !1,
                        }
                    );
                return t && (e = n.extend({}, e, t)), e;
            }),
            (t.prototype.applyConfig = function () {
                (this.config = this.loadConfig()),
                    this.leftSidebar.init(),
                    this.topbar.init(),
                    ((this.leftSidebar.parent = this).topbar.parent =
                        this).changeMode(this.config.mode),
                    this.changeLayoutWidth(this.config.width),
                    this.changeMenuPositions(this.config.menuPosition);
                var t = n.extend({}, this.config.sidebar);
                this.leftSidebar.changeColor(t.color),
                    this.leftSidebar.changeSize(t.size),
                    this.leftSidebar.showUser(t.showuser);
                var e = n.extend({}, this.config.topbar);
                this.topbar.changeColor(e.color);
            }),
            (t.prototype.changeMode = function (t) {
                switch (t) {
                    case "dark":
                        this.defaultBSStyle.attr("disabled", !0),
                            this.defaultAppStyle.attr("disabled", !0),
                            this.darkBSStyle.attr("disabled", !1),
                            this.darkAppStyle.attr("disabled", !1),
                            this.leftSidebar.changeColor("dark"),
                            this._saveConfig({
                                mode: t,
                                sidebar: n.extend({}, this.config.sidebar, {
                                    color: "dark",
                                }),
                            });
                        break;
                    default:
                        this.defaultBSStyle.attr("disabled", !1),
                            this.defaultAppStyle.attr("disabled", !1),
                            this.darkBSStyle.attr("disabled", !0),
                            this.darkAppStyle.attr("disabled", !0),
                            this.leftSidebar.changeColor("light"),
                            this._saveConfig({
                                mode: t,
                                sidebar: n.extend({}, this.config.sidebar, {
                                    color: "light",
                                }),
                            });
                }
                this.rightBar.selectOptionsFromConfig();
            }),
            (t.prototype.changeLayoutWidth = function (t) {
                switch (t) {
                    case "boxed":
                        this.body.attr("data-layout-width", "boxed"),
                            n.LeftSidebar.changeSize("condensed"),
                            this._saveConfig({ width: t });
                        break;
                    default:
                        this.body.attr("data-layout-width", "fluid");
                        var e = JSON.parse(
                            this.body.attr("data-layout")
                                ? this.body.attr("data-layout")
                                : "{}"
                        );
                        n.LeftSidebar.changeSize(
                            e && e.sidebar ? e.sidebar.size : "default"
                        ),
                            this._saveConfig({ width: t });
                }
                this.rightBar.selectOptionsFromConfig();
            }),
            (t.prototype.changeMenuPositions = function (t) {
                this.body.attr("data-layout-menu-position", t);
            }),
            (t.prototype.clearSavedConfig = function () {
                this.config = {};
            }),
            (t.prototype.getConfig = function () {
                return this.config;
            }),
            (t.prototype.reset = function () {
                this.clearSavedConfig(), this.applyConfig();
            }),
            (t.prototype.init = function () {
                (this.leftSidebar = n.LeftSidebar),
                    (this.topbar = n.Topbar),
                    ((this.leftSidebar.parent = this).topbar.parent =
                        this).applyConfig();
            }),
            (n.LayoutThemeApp = new t()),
            (n.LayoutThemeApp.Constructor = t);
    })(window.jQuery),
    (function (o) {
        "use strict";
        function t() {}
        (t.prototype.initTooltipPlugin = function () {
            o.fn.tooltip && o('[data-toggle="tooltip"]').tooltip();
        }),
            (t.prototype.initPopoverPlugin = function () {
                o.fn.popover && o('[data-toggle="popover"]').popover();
            }),
            (t.prototype.initToastPlugin = function () {
                o.fn.toast && o('[data-toggle="toast"]').toast();
            }),
            (t.prototype.initFormValidation = function () {
                o(".needs-validation").on("submit", function (t) {
                    return (
                        o(this).addClass("was-validated"),
                        !1 !== o(this)[0].checkValidity() ||
                            (t.preventDefault(), t.stopPropagation(), !1)
                    );
                });
            }),
            (t.prototype.initCounterUp = function () {
                var i = o(this).attr("data-delay")
                        ? o(this).attr("data-delay")
                        : 100,
                    a = o(this).attr("data-time")
                        ? o(this).attr("data-time")
                        : 1200;
                o('[data-plugin="counterup"]').each(function (t, e) {
                    o(this).counterUp({ delay: i, time: a });
                });
            }),
            (t.prototype.initPeityCharts = function () {
                o('[data-plugin="peity-pie"]').each(function (t, e) {
                    var i = o(this).attr("data-colors")
                            ? o(this).attr("data-colors").split(",")
                            : [],
                        a = o(this).attr("data-width")
                            ? o(this).attr("data-width")
                            : 20,
                        n = o(this).attr("data-height")
                            ? o(this).attr("data-height")
                            : 20;
                    o(this).peity("pie", { fill: i, width: a, height: n });
                }),
                    o('[data-plugin="peity-donut"]').each(function (t, e) {
                        var i = o(this).attr("data-colors")
                                ? o(this).attr("data-colors").split(",")
                                : [],
                            a = o(this).attr("data-width")
                                ? o(this).attr("data-width")
                                : 20,
                            n = o(this).attr("data-height")
                                ? o(this).attr("data-height")
                                : 20;
                        o(this).peity("donut", {
                            fill: i,
                            width: a,
                            height: n,
                        });
                    }),
                    o('[data-plugin="peity-donut-alt"]').each(function (t, e) {
                        o(this).peity("donut");
                    }),
                    o('[data-plugin="peity-line"]').each(function (t, e) {
                        o(this).peity("line", o(this).data());
                    }),
                    o('[data-plugin="peity-bar"]').each(function (t, e) {
                        var i = o(this).attr("data-colors")
                                ? o(this).attr("data-colors").split(",")
                                : [],
                            a = o(this).attr("data-width")
                                ? o(this).attr("data-width")
                                : 20,
                            n = o(this).attr("data-height")
                                ? o(this).attr("data-height")
                                : 20;
                        o(this).peity("bar", { fill: i, width: a, height: n });
                    });
            }),
            (t.prototype.initKnob = function () {
                o('[data-plugin="knob"]').each(function (t, e) {
                    o(this).knob();
                });
            }),
            (t.prototype.initTippyTooltips = function () {
                0 < o('[data-plugin="tippy"]').length &&
                    tippy('[data-plugin="tippy"]');
            }),
            (t.prototype.initShowPassword = function () {
                o("[data-password]").on("click", function () {
                    "false" == o(this).attr("data-password")
                        ? (o(this).siblings("input").attr("type", "text"),
                          o(this).attr("data-password", "true"),
                          o(this).addClass("show-password"))
                        : (o(this).siblings("input").attr("type", "password"),
                          o(this).attr("data-password", "false"),
                          o(this).removeClass("show-password"));
                });
            }),
            (t.prototype.initMultiDropdown = function () {
                o(".dropdown-menu a.dropdown-toggle").on("click", function (t) {
                    return (
                        o(this).next().hasClass("show") ||
                            o(this)
                                .parents(".dropdown-menu")
                                .first()
                                .find(".show")
                                .removeClass("show"),
                        o(this).next(".dropdown-menu").toggleClass("show"),
                        !1
                    );
                });
            }),
            (t.prototype.init = function () {
                this.initTooltipPlugin(),
                    this.initPopoverPlugin(),
                    this.initToastPlugin(),
                    this.initFormValidation(),
                    this.initCounterUp(),
                    this.initPeityCharts(),
                    this.initKnob(),
                    this.initTippyTooltips(),
                    this.initShowPassword(),
                    this.initMultiDropdown();
            }),
            (o.Components = new t()),
            (o.Components.Constructor = t);
    })(window.jQuery),
    (function (n) {
        "use strict";
        function t() {
            (this.$body = n("body")),
                (this.$portletIdentifier = ".card"),
                (this.$portletCloser = '.card a[data-toggle="remove"]'),
                (this.$portletRefresher = '.card a[data-toggle="reload"]');
        }
        (t.prototype.init = function () {
            var a = this;
            n(document).on("click", this.$portletCloser, function (t) {
                t.preventDefault();
                var e = n(this).closest(a.$portletIdentifier),
                    i = e.parent();
                e.remove(), 0 == i.children().length && i.remove();
            }),
                n(document).on("click", this.$portletRefresher, function (t) {
                    t.preventDefault();
                    var e = n(this).closest(a.$portletIdentifier);
                    e.append(
                        '<div class="card-disabled"><div class="card-portlets-loader"></div></div>'
                    );
                    var i = e.find(".card-disabled");
                    setTimeout(function () {
                        i.fadeOut("fast", function () {
                            i.remove();
                        });
                    }, 500 + 5 * Math.random() * 300);
                });
        }),
            (n.Portlet = new t()),
            (n.Portlet.Constructor = t);
    })(window.jQuery),
    (function (e) {
        "use strict";
        function t() {
            (this.$body = e("body")), (this.$window = e(window));
        }
        (t.prototype.initControls = function () {
            function t() {
                document.webkitIsFullScreen ||
                    document.mozFullScreen ||
                    document.msFullscreenElement ||
                    (console.log("pressed"),
                    e("body").removeClass("fullscreen-enable"));
            }
            setTimeout(function () {
                document.body.classList.remove("loading");
            }, 400),
                e(window).on("load", function () {
                    e("#status").fadeOut(),
                        e("#preloader").delay(350).fadeOut("slow");
                }),
                e('[data-toggle="fullscreen"]').on("click", function (t) {
                    t.preventDefault(),
                        e("body").toggleClass("fullscreen-enable"),
                        document.fullscreenElement ||
                        document.mozFullScreenElement ||
                        document.webkitFullscreenElement
                            ? document.cancelFullScreen
                                ? document.cancelFullScreen()
                                : document.mozCancelFullScreen
                                ? document.mozCancelFullScreen()
                                : document.webkitCancelFullScreen &&
                                  document.webkitCancelFullScreen()
                            : document.documentElement.requestFullscreen
                            ? document.documentElement.requestFullscreen()
                            : document.documentElement.mozRequestFullScreen
                            ? document.documentElement.mozRequestFullScreen()
                            : document.documentElement
                                  .webkitRequestFullscreen &&
                              document.documentElement.webkitRequestFullscreen(
                                  Element.ALLOW_KEYBOARD_INPUT
                              );
                }),
                document.addEventListener("fullscreenchange", t),
                document.addEventListener("webkitfullscreenchange", t),
                document.addEventListener("mozfullscreenchange", t);
        }),
            (t.prototype.init = function () {
                e.Portlet.init(),
                    e.Components.init(),
                    this.initControls(),
                    (this.layout = e.LayoutThemeApp),
                    (this.rightBar = e.RightBar),
                    (this.rightBar.layout = this.layout),
                    (this.layout.rightBar = this.rightBar),
                    this.layout.init(),
                    this.rightBar.init(this.layout);
                var t = this.$body.data("layout");
                window.sessionStorage &&
                    t &&
                    t.hasOwnProperty("showRightSidebarOnPageLoad") &&
                    t.showRightSidebarOnPageLoad &&
                    (sessionStorage.getItem("_UBOLD_VISITED_") ||
                        (e.RightBar.toggleRightSideBar(),
                        sessionStorage.setItem("_UBOLD_VISITED_", !0)));
            }),
            (e.App = new t()),
            (e.App.Constructor = t);
    })(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.App.init();
    })(),
    Waves.init(),
    feather.replace();
//# sourceMappingURL=app.min.js.map
