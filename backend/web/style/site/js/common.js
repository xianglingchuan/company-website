var require, define;
!
function(r) {
	function e(r, e) {
		var u = a[r] || (a[r] = []);
		u.push(e);
		var o = n[r] || {},
			p = o.pkg ? i[o.pkg].url : o.url || r;
		if (!(p in f)) {
			f[p] = !0;
			var s = document.createElement("script");
			s.type = "text/javascript", s.src = p, t.appendChild(s)
		}
	}
	var n, i, t = document.getElementsByTagName("head")[0],
		a = {},
		u = {},
		o = {},
		f = {};
	define = function(r, e) {
		u[r] = e;
		var n = a[r];
		if (n) {
			for (var i = n.length - 1; i >= 0; --i) n[i]();
			delete a[r]
		}
	}, require = function(r) {
		r = require.alias(r);
		var e = o[r];
		if (e) return e.exports;
		var n = u[r];
		if (!n) throw Error("Cannot find module `" + r + "`");
		e = o[r] = {
			exports: {}
		};
		var i = "function" == typeof n ? n.apply(e, [require, e.exports, e]) : n;
		return i && (e.exports = i), e.exports
	}, require.async = function(i, t) {
		function a(r) {
			for (var i = r.length - 1; i >= 0; --i) {
				var t = r[i];
				if (!(t in u || t in p)) {
					p[t] = !0, s++, e(t, o);
					var f = n[t];
					f && "deps" in f && a(f.deps)
				}
			}
		}
		function o() {
			if (0 == s--) {
				var e, n, a = [];
				for (e = 0, n = i.length; n > e; ++e) a[e] = require(i[e]);
				t && t.apply(r, a)
			}
		}
		"string" == typeof i && (i = [i]);
		for (var f = i.length - 1; f >= 0; --f) i[f] = require.alias(i[f]);
		var p = {},
			s = 0;
		a(i), o()
	}, require.resourceMap = function(r) {
		n = r.res || {}, i = r.pkg || {}
	}, require.alias = function(r) {
		return r
	}, define.amd = {
		jQuery: !0,
		version: "1.0.0"
	}
}(this);;
var IE6Tip = {
	init: function() {
		0 != $(".ui-nav-new").length && $.browser.msie && parseFloat($.browser.version) < 7 && this.initEl()
	},
	initEl: function() {
		var t = this.element = $('<div class="ie6tip" data-href="http://www.rong360.com/mini/down360brower.html" target="_blank"><a href="#" class="close" data-css-hover="close-hover" data-css-active="close-active">×</a><a class="down" href="http://www.rong360.com/mini/down360brower.html" target="_blank">立即升级</a></div>');
		$("body").prepend(t), this.addListener()
	},
	addListener: function() {
		var t = this.element;
		t.delegate(".close", "click", function() {
			return t.hide(), !1
		})
	}
};
$(function() {
	IE6Tip.init()
}), String.prototype.tpl = function(t, e) {
	var i;
	return e = void 0 === e ? "" : e, this.replace(/\%\$([\w.]*?)\%/g, function(n, a) {
		a = a.split("."), i = t;
		try {
			for (; a.length;) i = i[a.shift()]
		} catch (o) {
			i = e
		}
		return void 0 === i ? e : i
	})
}, function() {
	var t = {};
	$.tmpl = function e(i, n) {
		var a = /\W/.test(i) ? new Function("obj", "var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('" + i.replace(/[\r\t\n]/g, " ").split("<%").join("	").replace(/((^|%>)[^\t]*)'/g, "$1\r").replace(/\t=(.*?)%>/g, "',$1,'").split("	").join("');").split("%>").join("p.push('").split("\r").join("\\'") + "');}return p.join('');") : t[i] = t[i] || e(document.getElementById(i).innerHTML);
		return n ? a(n) : a
	}, $.tpl = function(t) {
		var e = new Function("obj", "var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('" + t.replace(/[\r\t\n]/g, " ").split("<%").join("	").replace(/((^|%>)[^\t]*)'/g, "$1\r").replace(/\t=(.*?)%>/g, "',$1,'").split("	").join("');").split("%>").join("p.push('").split("\r").join("\\'") + "');}return p.join('');");
		return e
	}
}(), $.extend({
	guid: function(t) {
		for (var e = "", i = 1; t >= i; i++) {
			var n = Math.floor(16 * Math.random()).toString(16);
			e += n, (8 == i || 12 == i || 16 == i || 20 == i) && (e += "")
		}
		return e
	}
}), !
function(t) {
	t.cookie = function(t, e, i) {
		if ("undefined" == typeof e) {
			var n = new RegExp("(?:^| )" + t + "=([^;]*)(;|$)"),
				a = n.exec(document.cookie);
			return decodeURIComponent(a && a[1] || "")
		}
		i = i || {}, null === e && (e = "", i.expires = -1);
		var o = "";
		if (i.expires && ("number" == typeof i.expires || i.expires.toUTCString)) {
			var r;
			"number" == typeof i.expires ? (r = new Date, r.setTime(r.getTime() + 24 * i.expires * 60 * 60 * 1e3)) : r = i.expires, o = "; expires=" + r.toUTCString()
		}
		var s = i.path ? "; path=" + i.path : "; path=/",
			l = i.domain ? "; domain=" + i.domain : "",
			c = i.secure ? "; secure" : "";
		document.cookie = [t, "=", encodeURIComponent(e), o, s, l, c].join("")
	}
}(jQuery), $.json2param = function(t) {
	var e = "";
	for (var i in t)("" != t[i] || "0" == t[i].toString()) && (e += i + "=" + t[i] + "&");
	return e.substring(0, e.length - 1)
}, $(document).delegate("a[href*=#]", "click", function() {
	var t = $(this).attr("href");
	if (console.log(t), /##{1,}/.test(t)) {
		var e = $(this).data("option-animate"),
			i = e,
			n = 1 == i ? 1e3 : 0;
		if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
			var a = $(this.hash);
			if (console.log(a), a = a.length && a || $("[name=" + this.hash.slice(1) + "]"), a.length) {
				var o = a.offset().top;
				return $("html,body").animate({
					scrollTop: o
				}, n), !1
			}
		}
	}
}), $(document).delegate("[data-css-hover]", "mouseenter", function() {
	$(this).addClass($(this).data("css-hover"))
}), $(document).delegate("[data-css-hover]", "mouseleave", function() {
	$(this).removeClass($(this).data("css-hover"))
}), $(document).delegate("[data-css-active]", "mousedown", function() {
	$(this).addClass($(this).data("css-active"))
}), $(document).delegate("[data-css-active]", "mouseup", function() {
	$(this).removeClass($(this).data("css-active"))
}), $.extend({
	pageOpen: function() {
		var t = Array.prototype.slice.call(arguments),
			e = t[0] ? t[0] : "",
			i = t[1] ? t[1] : "_self",
			n = document.createElement("a");
		n.cssText = "visibility:hidden;position:absolute", n.id = "ANEWA", document.body.appendChild(n), n.href = e, n.target = i, n.click()
	}
}), $(document).delegate("[data-href]", "click", function(t) {
	t.preventDefault(), t.stopPropagation();
	var e = $(this).data("href"),
		i = $(this).data("target") || $(this).attr("target");
	i = "_blank" == i ? "_blank" : "_self", $.pageOpen(e, i)
}), $(document).delegate("[data-href] a", "click", function(t) {
	t.stopPropagation()
}), $(function() {
	var ui = $.fn.ui || {};
	ui.fx = {
		goPageEnd: function() {
			$(document).scrollTop = $(document).height(), $("html,body").animate({
				scrollTop: $("body").outerHeight()
			}, 1e3)
		},
		goPageTop: function() {
			console.log(0), $("html,body").animate({
				scrollTop: 0
			}, 1e3)
		}
	}, $(document).delegate("[data-on-click]", "click", function(e) {
		var cmd = $(this).data("on-click"),
			key = cmd.substring(0, 2);
		"ui" == key && eval(cmd.replace(":", ".") + "()")
	})
}), $(document).delegate("[data-ui='ui-tab']", "mouseenter", function() {
	var t = $(this).attr("data-temp-key");
	if (!t) {
		$(this).attr("data-temp-key", "x");
		var e = $(this).find(".ui-tab-nav-item"),
			i = $(this).find(".ui-tab-content-item"),
			n = $(this).data("option-event");
		$(e).each(function(t, e) {
			$(e).attr("data-tab-index", t)
		}), $(this).delegate(".ui-tab-nav-item", n, function() {
			$(this).parent().find(".ui-tab-nav-item").removeClass("current"), $(this).addClass("current"), i.removeClass("current"), i.eq($(this).data("tab-index")).addClass("current")
		}), $(this).delegate(".ui-tab-nav-item a", "click", function(t) {
			t.preventDefault()
		})
	}
}), $("[data-ui='ui-carousel']").each(function() {
	var t = $(this).attr("data-temp-key");
	t || ($(this).attr("data-temp-key", "x"), {
		els: {
			listWrap: $(this).find(".ui-carousel-list"),
			list: $(this).find(".ui-carousel-list .item"),
			control: ".ui-carousel-control",
			controlItem: ".ui-carousel-control .item"
		},
		config: {
			wrapWidth: $(this).find(".ui-carousel-list").width(),
			wrapHeight: $(this).find(".ui-carousel-list").width(),
			currutIndex: 0,
			time: $(this).data("option-time")
		},
		init: function() {
			return this.controlAction(), this.setTime(), this
		},
		controlAction: function() {
			var t = this;
			$(document).delegate(t.els.controlItem, "click", function() {
				var e = $(this).hasClass("pre") ? "right" : "left";
				t.fxTo(e)
			})
		},
		fxTo: function(t) {
			var e = this,
				i = e.els.list.eq(e.config.currutIndex),
				n = e.config.currutIndex,
				a = "left" == t ? n == e.els.list.length - 1 ? 0 : n + 1 : 0 == n ? e.els.list.length - 1 : n - 1,
				o = e.els.list.eq(a),
				r = "left" == t ? -e.config.wrapWidth : e.config.wrapWidth;
			i.animate({
				left: r
			}, 500, function() {
				$(this).removeClass("active").hide()
			});
			var s = "left" == t ? e.config.wrapWidth : -e.config.wrapWidth;
			o.css("left", s).show(), o.animate({
				left: 0
			}, 500, function() {
				$(this).addClass("active"), e.config.currutIndex = a
			})
		},
		setTime: function() {
			var t = this;
			t.config.time && setInterval(function() {
				t.fxTo("left")
			}, t.config.time)
		}
	}.init())
}), $(document).delegate("[data-ui='ui-viewmore']", "mouseenter", function() {
	var t = $(this).attr("data-temp-key"),
		e = $(this).attr("data-option-css"),
		i = $(this);
	if (!t) {
		$(this).attr("data-temp-key", "x");
		var n = $(this).find(".ui-viewmore-toggle"),
			a = $(this).find(".ui-viewmore-show"),
			o = $(this).find(".ui-viewmore-hide");
		n.attr("data-default-text", n.text().toString()), n.click(function(t) {
			t.preventDefault();
			var n = $(this).attr("data-temp-key");
			"a" == n ? (e && i.removeClass(e), a.show(), o.hide(), $(this).attr("data-temp-key", "b"), $(this).text($(this).attr("data-default-text")), $(this).attr("data-toggle-css") && $(this).removeClass($(this).attr("data-toggle-css"))) : (e && i.addClass(e), a.hide(), o.show(), $(this).attr("data-temp-key", "a"), $(this).text($(this).attr("data-toggle-text")), $(this).attr("data-toggle-css") && $(this).addClass($(this).attr("data-toggle-css")))
		})
	}
}), $(function() {
	$.UIDialog = function(t) {
		var e = {
			option: {
				title: "",
				content: "",
				width: 780,
				height: "auto"
			},
			el: function() {
				return {
					main: $(".ui-dialog"),
					mask: $(".ui-dialog .ui-dialog-mask"),
					body: $(".ui-dialog .body"),
					dialog: $(".ui-dialog .ui-dialog-body"),
					title: $(".ui-dialog .title"),
					content: $(".ui-dialog .content")
				}
			},
			init: function() {
				e.option = $.extend({}, e.option, t), e._createDialog(), e._bind()
			},
			show: function(t) {
				e.option = $.extend({}, e.option, t), e.el().main.show(), e.el().mask.show(), $("html").css("overflow", "hidden"), $("body").css("overflow", "hidden"), e.el().body.show(), e.el().dialog.show(), e._position(), e._drawContent(function() {
					var t = e.option.type || "";
					e.el().title.attr("class", "title"), e.el().title.addClass(t)
				})
			},
			close: function() {
				e.el().main.hide(), $("html").css("overflow", ""), $("html").css("overflow-x", "hidden"), $("body").css("overflow", ""), $("body").css("overflow-x", "hidden")
			},
			pop: function(t) {
				e._position(), e.el().main.show(), e.el().mask.show(), e.option = $.extend({}, e.option, t), e._drawContent(function() {
					e.show({
						type: "pop"
					})
				})
			},
			alert: function(t) {
				e._position(), e.el().main.show(), e.el().mask.show(), e.option = $.extend({}, e.option, t), e.option.width = 680, e._drawContent(function() {
					e.show({
						type: "alert"
					}), e.el().title.attr("class", "title alert")
				})
			},
			_bind: function() {
				$(document).delegate(".close", "click", function() {
					e.close()
				}), $(window).resize(function() {
					e._position()
				})
			},
			_createDialog: function() {
				var t = ['<div class="ui-dialog">', '<div class="body">', '<div class="ui-dialog-body">', '<div class="title"><span class="text"></span><a class="close" href="javascript:;">×</a></div>', '<div class="content"></div>', "</div>", "</div>", '<iframe name="dialog" class="ui-dialog-mask" frameborder="no"></iframe>', '<div class="ui-dialog-mask"></div>', "</div>"].join("");
				!$(".ui-dialog").length > 0 && ($(document.body).append(t), e._position())
			},
			_position: function(t) {
				if (t && "alert" == t.type && (console.log(t), e.el().title.addClass("alert")), e.option = $.extend({}, e.option, t), document.documentElement || document.body) {
					var i = document.documentElement.clientWidth || document.body.clientWidth,
						n = document.documentElement.clientHeight || document.body.clientHeight,
						a = $(document).scrollTop(),
						o = e.el();
					o.main.width(i), o.main.height(n), o.main.css("top", a), o.mask.width(i), o.mask.height(n), o.body.width(i), o.body.height(n), o.dialog.width(e.option.width), o.dialog.height(e.option.height);
					var r = $(".ui-dialog .ui-dialog-body").innerHeight(),
						s = r > n ? "20px" : (n - r) / 2 + "px";
					o.dialog.css("margin-top", s), o.dialog.css("margin-bottom", s), $(".ui-dialog .ContentIframe").show(), $(".ui-dialog .ContentIframe").height(e.option.height)
				}
			},
			_drawContent: function(t) {
				var i = e.el();
				if (i.title.find(".text").html(e.option.title), e.option.url) var n = '<iframe class="ContentIframe" style="display:none;" width="100%" height="{height}" frameborder="no" src="{url}"></iframe>',
					a = n.replace("{url}", "about:blank").replace("{height}", e.option.height);
				else var a = e.option.content;
				i.content.html(a), $(".ContentIframe").attr("src", e.option.url), e._bind(), e.option.height ? e.option.height : "auto", $(".ui-dialog .ContentIframe").load(function() {
					$(this).show(), $(this).height($(".ui-dialog .ContentIframe").contents().find("body").height()), $(this).resize(function() {}), t(), setInterval(function() {
						$(".ui-dialog .ContentIframe").height($(".ui-dialog .ContentIframe").contents().find("body").height())
					}, 50)
				}), $(".ui-dialog .ContentIframe").resize(function() {
					console.log("resize")
				})
			}
		};
		return $.extend(this.prototype, {
			close: e.close
		}), e.init(), e
	}
});
var mask = {
	/*isOpen: !1,
	isIe6: $.browser.msie && $.browser.version < 7,
	zIndex: 2e3,
	on: function() {
		if (mask.isOpen) return !1;
		mask.isOpen = !0;
		var t = mask.dom = $("#theMask");
		t[0] || (t = mask.dom = $('<div id="theMask"></div>').css({
			position: "absolute",
			top: 0,
			left: 0,
			width: "100%",
			background: "#000",
			opacity: .3,
			display: "none"
		}), t.appendTo($(document.body)), $(window).resize(function() {
			mask._resize()
		})), this._resize(), mask.isIe6 && $("select").hide(), t.show()
	},
	_resize: function() {
		mask.dom.css({
			width: $(document).width(),
			height: $(document).height(),
			zIndex: mask.zIndex
		})
	},
	off: function() {
		var t = $("#theMask");
		return t[0] ? (mask.isOpen = !1, mask.isIe6 && $("select").show(), void t.hide()) : !1
	}*/
};
!
function(t) {
	t.centerSize = function(e) {
		var i = {
			width: t(window).width(),
			height: t(window).height()
		},
			n = t(window).scrollTop();
		return {
			top: Math.max(n + (i.height - e.height) / 2, 0),
			left: Math.max((i.width - e.width) / 2, 0)
		}
	}, t.center = function(e) {
		e = t(e), e.css("position", "absolute").css(t.centerSize({
			width: e.outerWidth(),
			height: e.outerHeight()
		}))
	}
}(jQuery);
var PopLayer = function(t) {
		t = t || {};
		var e = this,
			i = function() {
				return !0
			};
		e.options = $.extend({
			beforeOpen: i,
			beforeClose: i,
			afterClose: i,
			ok: i,
			cancel: i,
			iframe: !1
		}, t), t.trigger && (e.trigger = $(t.trigger)), t.target && (e.target = $(t.target)), e.init()
	};
$.extend(PopLayer.prototype, {
	init: function() {
		this._initEvent()
	},
	_initEvent: function() {
		function t() {
			e = n.target, e.find(".close, .cancel").click(function(t) {
				a.cancel(), n.close(), t.preventDefault()
			}), e.find(".ok").click(function(t) {
				a.ok(), n.close(), t.preventDefault()
			})
		}
		var e, i, n = this,
			a = n.options;
		if (n.trigger && n.trigger.click(function(t) {
			n.open(), t.preventDefault()
		}), n.target) {
			if (i = a.iframe && "iframe" == n.target[0].tagName.toLowerCase()) return;
			t()
		}
	},
	open: function() {
		var t = this,
			e = t.options;
		e.beforeOpen() && t.update()
	},
	close: function() {
		var t = this,
			e = t.options;
		if (e.beforeClose()) {
			mask.off(), t.target.hide();
			var i = t.target.get(0);
			i && i.tagName && "IFRAME" == i.tagName.toUpperCase() && t.target.remove(), e.afterClose();
			try {
				t.loading.remove()
			} catch (n) {}
			PopLayer.current = null
		}
	},
	update: function() {
		PopLayer.current = this, mask.on(), this.target.show(), $.center(this.target)
	}
}), PopLayer.iframe = function(t) {
	var e, i = $('<img width="48" src="/static/img/loading.gif?v=1">').css("zIndex", mask.zIndex + 1),
		n = $('<iframe name="dialog" class="dialog" frameborder="0" scrolling="no"></iframe>').css({
			position: "absolute",
			left: -9999,
			top: -9999,
			zIndex: 9999,
			width: 1,
			height: 1
		}).appendTo(document.body).attr("src", t);
	return e = new PopLayer({
		target: n,
		iframe: !0
	}), n.load(function() {
		function t(t, e) {
			return t > 1 ? t : e
		}
		var e, a = n[0].contentWindow,
			o = {
				width: n.width(),
				height: n.height()
			};
		n.css({
			width: 1,
			height: 1
		}), e = {
			width: t($(a.document.body)[0].scrollWidth, $(a.document).outerWidth()),
			height: t($(a.document.body)[0].scrollHeight, $(a.document).outerHeight())
		}, n.css(o), n.animate($.extend(e, $.centerSize(e)), {
			duration: 200
		}), i.remove()
	}), e.open(), $.center(i.appendTo(document.body)), PopLayer.current.loading = i, e
}, PopLayer.close = function() {
	PopLayer.current && PopLayer.current.close(), PopLayer.afterClose && PopLayer.afterClose()
}, PopLayer.resize = function(t) {
	PopLayer.current && (PopLayer.current.target.animate($.extend(t, $.centerSize(t)), {
		duration: 200
	}), PopLayer.current.loading.remove())
}, $(document).delegate(".ui-select", "mouseenter", function() {
	({
		els: {
			root: $(this),
			valuebar: $(this).find(".select-valueBar"),
			input: $(this).find("input[type='hidden']"),
			text: $(this).find(".select-text"),
			list: $(this).find(".select-list"),
			item: $(this).find(".select-item")
		},
		options: {
			eventType: $(this).data("option-event") ? $(this).data("option-event") : "click",
			isInput: $(this).data("option-input")
		},
		init: function() {
			return this.bind(), this.input(), this
		},
		bind: function() {
			var t = this;
			t.els.root.delegate(t.els.valuebar.selector, t.options.eventType, function(e) {
				t.els.root.css("position", "relative"), t.els.list.show();
				var i = t.els.list.height(),
					n = $(window).height() - e.pageY + $(window).scrollTop();
				i > n && t.els.root.addClass("ui-select-bottom")
			}), t.els.root.delegate(t.els.item.selector, "click", function() {
				var e = $(this).data("type");
				if ("input" != e) {
					var i = $(this).text(),
						n = $(this).attr("data-value"),
						a = t.els.text[0].tagName;
					"INPUT" == a ? t.els.text.val(n) : t.els.text.text(i), t.els.text.focus(), t.els.input.val(n), t.els.input.attr("check-status", "yes"), $(this).parents("[data-field]").find(".error").hide().html("")
				} else t.els.text.val(""), t.els.text.focus();
				t.els.item.removeClass("select-active"), $(this).addClass("select-active"), t.els.root.css("position", "static"), t.els.list.hide()
			}), t.els.item.attr("data-css-hover", "select-hover")
		},
		input: function() {
			var t = this;
			t.els.root.delegate(t.els.text.selector, "keyup", function() {
				t.els.input.val($(this).val())
			})
		}
	}).init()
}), $(document).delegate(".ui-select", "mouseleave", function() {
	$(this).css("position", "static"), $(this).find(".select-list").hide()
}), $(document).delegate("[data-wrap='form']", "mouseenter", function() {
	var t = $(this).attr("data-temp-key");
	if (!t) var e = {
		els: {
			root: $(this),
			form: $(this).find("form"),
			fieldWrap: $(this).find("[data-wrap='form-field']"),
			submit: $(this).find("input[type='submit']") || $(this).find("[data-type='submit']"),
			alert: $(this).find(".alert-info")
		},
		options: {
			action: $(this).data("action"),
			paramTpl: $(this).data("param")
		},
		config: {
			roles: {
				number: /d+/g,
				maxlength: ",",
				empty: !0
			},
			checked: !0
		},
		init: function() {
			return this.bind(), this
		},
		bind: function() {
			var t = this;
			t._drawForm(), t.els.root.on("submit", t._submit)
		},
		_submit: function() {
			var t = e,
				i = (t._drawData(), t.options.paramTpl, t.options.action, t.config.checked);
			return i ? !0 : !1
		},
		_drawForm: function() {
			var t = this,
				e = t.els.fieldWrap;
			$(e).each(function(e, i) {
				var n = $(i).find(".alert-info");
				$(document).delegate("[ data-required]", "blur", function() {
					"" == $(this).val() ? (n.show(), t.config.checked = !1) : (n.hide(), t.config.checked = !0), $(this).on("focus", function() {
						n.hide(), t.config.checked = !0
					})
				})
			})
		},
		_drawData: function() {
			var t = this,
				e = t.els.fieldWrap.find("[name]"),
				i = {};
			return $(e).each(function(t, e) {
				var n = $(e).attr("name"),
					a = $(e).attr("value");
				i[n] = a
			}), i
		},
		_checkData: function() {
			var t = this,
				e = t.els.fieldWrap;
			$(e).each(function(e) {
				for (var i in t.config.roles) {
					var n = $(e).data(i.toString());
					t.config.roles[n]
				}
			})
		},
		_checkData_bak: function() {
			var t = this,
				e = t.els.fieldWrap;
			$(e).each(function(e) {
				for (var i in t.config.roles) {
					var n = $(e).data(i.toString());
					t.config.roles[n]
				}
			})
		}
	}.init()
}), $(document).delegate("[data-format='number']", "input propertychange keyup", function() {
	var t = $(this),
		e = t.val();
	e = e.replace(/[０１２３４５６７８９]/g, function(t) {
		return t.charCodeAt(0) - 65296
	}), t.val(e.replace(/[^\d]/g, ""))
}), $(document).delegate("[data-format='float']", "input", function() {
	var t = /^(\d+(\.\d{0,1})?)$/g,
		e = $(this),
		i = e.val();
	if (i = i.replace(/[０１２３４５６７８９]/g, function(t) {
		return t.charCodeAt(0) - 65296
	}), !t.test(this.value)) {
		var n = (Math.floor(10 * parseFloat(i)) / 10).toFixed(1);
		"NaN" == parseFloat(n).toFixed(1) && (n = ""), e.val(n)
	}
	var n = e.val();
	n.indexOf(".") > -1 ? e.attr("maxlength", "6") : e.attr("maxlength", "4")
}), $(document).delegate("[data-format='letter-number']", "input propertychange keyup", function() {
	var t = $(this),
		e = t.val();
	e = e.replace(/[０１２３４５６７８９]/g, function(t) {
		return t.charCodeAt(0) - 65296
	}), e = e.replace(/[\uff21-\uff3a\uff41-\uff5a]/g, function(t) {
		return String.fromCharCode(t.charCodeAt() - 65248)
	}), t.val(e.replace(/[^A-Za-z0-9]/g, ""))
}), $(document).delegate('[type="numbers"]', "keyup", function() {
	$(this).val($(this).val().replace(/[^\d.]/g, ""))
}), $(document).delegate("[length]", "blur", function() {
	var t = $(this).val(),
		e = $(this).parents("[data-field]").find("label").html(),
		i = $(this).attr("length");
	t.length != i && ($(this).parents("[data-field]").find(".error").show().html(e + "填写错误"), $(this).attr("check-status", "no"))
}), $(document).delegate('[type="word"]', "input propertychange", function() {
	$(this).val($(this).val().replace(/[^\a-\z\A-\Z]/g, ""))
}), $(document).delegate('[type="chinese"]', "input propertychange", function() {
	$(this).val($(this).val().replace(/[^\u4E00-\u9FA5]/g, ""))
}), $(document).delegate('.field-wrap [type="name"],.field-wrap [type="mobile"],.field-wrap [type="text"],.field-wrap textarea', "blur", function() {
	var t = $(this).val(),
		e = $(this).parents("[data-field]").find("label").html();
	"" == t && ($(this).parents("[data-field]").find(".error").show().html(e + "不能为空"), $(this).attr("check-status", "no"))
}), $(document).delegate('.field-wrap [type="name"],.field-wrap [type="mobile"],.field-wrap [type="text"],.field-wrap textarea', "focus", function() {
	$(this).parents("[data-field]").find(".error").hide().html(""), $(this).attr("check-status", "yes")
}), $(document).delegate('.field-wrap [type="mobile"]', "input propertychange", function() {
	var t = $(this),
		e = t.val();
	e = e.replace(/[０１２３４５６７８９]/g, function(t) {
		return t.charCodeAt(0) - 65296
	}), t.val(e.replace(/[^0-9]/g, ""));
	var i = $(this).val(),
		n = 11,
		a = /^1\d{10}$/;
	$(this).attr("check-status", "no"), i.length == n && (a.test(i) ? $(this).attr("check-status", "yes") : $(this).parents("[data-field]").find(".error").show().html("手机号码输入错误"))
}), $(document).delegate('.field-wrap [type="mobile"]', "blur", function() {
	var t = $(this).val(),
		e = /^1\d{10}$/;
	console.log(t), e.test(t) ? $(this).attr("check-status", "yes") : $(this).parents("[data-field]").find(".error").show().html("手机号码输入错误")
}), $(document).delegate('.field-wrap [data-type="vcode"]', "click", function(t) {
	var e = $(this).find("img"),
		i = e.attr("src") + "1";
	t.preventDefault(), e.attr("src", i)
}), $.viewmodel = function(t, e) {
	var i = t.find(".dom-wrap"),
		n = t.find('[type="text/tpl"]').html(),
		a = $.tmpl(n, e);
	i.html(a)
}, $.superForm = function(t) {
	var e = {
		_fields: $(t).find("[data-field]"),
		check: function(t) {
			var i = [],
				t = t ? t : {
					not: ""
				};
			$(e._fields).each(function(e, n) {
				var a = $(n).data("field"),
					o = $(n).find('[name="' + a + '"]');
				if ("yes" == o.attr("check-status") || a == t.not) i.push(1);
				else {
					if ("" == o.val()) {
						var r = o.parents("[data-field]").find("label").html();
						o.parents("[data-field]").find(".error").show().html(r + "不能为空")
					}
					i.push(0)
				}
			});
			var n = i.join("").indexOf("0") > -1 ? !1 : !0;
			return n
		}
	};
	return e
}, $(document).ready(function() {
	$.fn.jScrollPane && $("[data-ui='ui-scrollpane']").jScrollPane({
		showArrows: !0
	})
});
var console = console || {
	log: function() {
		return !1
	}
};;
$(function() {
	$('[data-event="ewm"]').mouseenter(function() {
		$(".menu-top-ewm", this).show()
	}), $(document).bind("click", function(e) {
		$(".menu-top-ewm");
		0 == $(e.target).closest(".menu-top-ewm").length && $(".menu-top-ewm").hide()
	}), $(".wx-hover").mouseenter(function() {
		$(".wx-img", this).show()
	}), $(document).bind("click", function(e) {
		$(".wx-img");
		0 == $(e.target).closest(".wx-img").length && $(".wx-img").hide()
	})
});