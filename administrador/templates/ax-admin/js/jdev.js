! function(e, t) {
	function n(e) {
		var t = e.length,
			n = oe.type(e);
		return oe.isWindow(e) ? !1 : 1 === e.nodeType && t ? !0 : "array" === n || "function" !== n && (0 === t || "number" == typeof t && t > 0 && t - 1 in e)
	}

	function r(e) {
		var t = he[e] = {};
		return oe.each(e.match(ae) || [], function(e, n) {
			t[n] = !0
		}), t
	}

	function i() {
		Object.defineProperty(this.cache = {}, 0, {
			get: function() {
				return {}
			}
		}), this.expando = oe.expando + Math.random()
	}

	function o(e, n, r) {
		var i;
		if (r === t && 1 === e.nodeType)
			if (i = "data-" + n.replace(ve, "-$1").toLowerCase(), r = e.getAttribute(i), "string" == typeof r) {
				try {
					r = "true" === r ? !0 : "false" === r ? !1 : "null" === r ? null : +r + "" === r ? +r : ye.test(r) ? JSON.parse(r) : r
				} catch (o) {}
				ge.set(e, n, r)
			} else r = t;
		return r
	}

	function s() {
		return !0
	}

	function a() {
		return !1
	}

	function u() {
		try {
			return X.activeElement
		} catch (e) {}
	}

	function l(e, t) {
		for (;
			(e = e[t]) && 1 !== e.nodeType;);
		return e
	}

	function c(e, t, n) {
		if (oe.isFunction(t)) return oe.grep(e, function(e, r) {
			return !!t.call(e, r, e) !== n
		});
		if (t.nodeType) return oe.grep(e, function(e) {
			return e === t !== n
		});
		if ("string" == typeof t) {
			if (je.test(t)) return oe.filter(t, e, n);
			t = oe.filter(t, e)
		}
		return oe.grep(e, function(e) {
			return te.call(t, e) >= 0 !== n
		})
	}

	function f(e, t) {
		return oe.nodeName(e, "table") && oe.nodeName(1 === t.nodeType ? t : t.firstChild, "tr") ? e.getElementsByTagName("tbody")[0] || e.appendChild(e.ownerDocument.createElement("tbody")) : e
	}

	function p(e) {
		return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e
	}

	function d(e) {
		var t = Me.exec(e.type);
		return t ? e.type = t[1] : e.removeAttribute("type"), e
	}

	function h(e, t) {
		for (var n = e.length, r = 0; n > r; r++) me.set(e[r], "globalEval", !t || me.get(t[r], "globalEval"))
	}

	function g(e, t) {
		var n, r, i, o, s, a, u, l;
		if (1 === t.nodeType) {
			if (me.hasData(e) && (o = me.access(e), s = oe.extend({}, o), l = o.events, me.set(t, s), l)) {
				delete s.handle, s.events = {};
				for (i in l)
					for (n = 0, r = l[i].length; r > n; n++) oe.event.add(t, i, l[i][n])
			}
			ge.hasData(e) && (a = ge.access(e), u = oe.extend({}, a), ge.set(t, u))
		}
	}

	function m(e, n) {
		var r = e.getElementsByTagName ? e.getElementsByTagName(n || "*") : e.querySelectorAll ? e.querySelectorAll(n || "*") : [];
		return n === t || n && oe.nodeName(e, n) ? oe.merge([e], r) : r
	}

	function y(e, t) {
		var n = t.nodeName.toLowerCase();
		"input" === n && Fe.test(e.type) ? t.checked = e.checked : ("input" === n || "textarea" === n) && (t.defaultValue = e.defaultValue)
	}

	function v(e, t) {
		if (t in e) return t;
		for (var n = t.charAt(0).toUpperCase() + t.slice(1), r = t, i = Ke.length; i--;)
			if (t = Ke[i] + n, t in e) return t;
		return r
	}

	function x(e, t) {
		return e = t || e, "none" === oe.css(e, "display") || !oe.contains(e.ownerDocument, e)
	}

	function b(t) {
		return e.getComputedStyle(t, null)
	}

	function w(e, t) {
		for (var n, r, i, o = [], s = 0, a = e.length; a > s; s++) r = e[s], r.style && (o[s] = me.get(r, "olddisplay"), n = r.style.display, t ? (o[s] || "none" !== n || (r.style.display = ""), "" === r.style.display && x(r) && (o[s] = me.access(r, "olddisplay", k(r.nodeName)))) : o[s] || (i = x(r), (n && "none" !== n || !i) && me.set(r, "olddisplay", i ? n : oe.css(r, "display"))));
		for (s = 0; a > s; s++) r = e[s], r.style && (t && "none" !== r.style.display && "" !== r.style.display || (r.style.display = t ? o[s] || "" : "none"));
		return e
	}

	function T(e, t, n) {
		var r = Xe.exec(t);
		return r ? Math.max(0, r[1] - (n || 0)) + (r[2] || "px") : t
	}

	function C(e, t, n, r, i) {
		for (var o = n === (r ? "border" : "content") ? 4 : "width" === t ? 1 : 0, s = 0; 4 > o; o += 2) "margin" === n && (s += oe.css(e, n + Qe[o], !0, i)), r ? ("content" === n && (s -= oe.css(e, "padding" + Qe[o], !0, i)), "margin" !== n && (s -= oe.css(e, "border" + Qe[o] + "Width", !0, i))) : (s += oe.css(e, "padding" + Qe[o], !0, i), "padding" !== n && (s += oe.css(e, "border" + Qe[o] + "Width", !0, i)));
		return s
	}

	function N(e, t, n) {
		var r = !0,
			i = "width" === t ? e.offsetWidth : e.offsetHeight,
			o = b(e),
			s = oe.support.boxSizing && "border-box" === oe.css(e, "boxSizing", !1, o);
		if (0 >= i || null == i) {
			if (i = Be(e, t, o), (0 > i || null == i) && (i = e.style[t]), Ue.test(i)) return i;
			r = s && (oe.support.boxSizingReliable || i === e.style[t]), i = parseFloat(i) || 0
		}
		return i + C(e, t, n || (s ? "border" : "content"), r, o) + "px"
	}

	function k(e) {
		var t = X,
			n = Ve[e];
		return n || (n = E(e, t), "none" !== n && n || (Ie = (Ie || oe("<iframe frameborder='0' width='0' height='0'/>").css("cssText", "display:block !important")).appendTo(t.documentElement), t = (Ie[0].contentWindow || Ie[0].contentDocument).document, t.write("<!doctype html><html><body>"), t.close(), n = E(e, t), Ie.detach()), Ve[e] = n), n
	}

	function E(e, t) {
		var n = oe(t.createElement(e)).appendTo(t.body),
			r = oe.css(n[0], "display");
		return n.remove(), r
	}

	function S(e, t, n, r) {
		var i;
		if (oe.isArray(t)) oe.each(t, function(t, i) {
			n || et.test(e) ? r(e, i) : S(e + "[" + ("object" == typeof i ? t : "") + "]", i, n, r)
		});
		else if (n || "object" !== oe.type(t)) r(e, t);
		else
			for (i in t) S(e + "[" + i + "]", t[i], n, r)
	}

	function j(e) {
		return function(t, n) {
			"string" != typeof t && (n = t, t = "*");
			var r, i = 0,
				o = t.toLowerCase().match(ae) || [];
			if (oe.isFunction(n))
				for (; r = o[i++];) "+" === r[0] ? (r = r.slice(1) || "*", (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n)
		}
	}

	function D(e, t, n, r) {
		function i(a) {
			var u;
			return o[a] = !0, oe.each(e[a] || [], function(e, a) {
				var l = a(t, n, r);
				return "string" != typeof l || s || o[l] ? s ? !(u = l) : void 0 : (t.dataTypes.unshift(l), i(l), !1)
			}), u
		}
		var o = {},
			s = e === yt;
		return i(t.dataTypes[0]) || !o["*"] && i("*")
	}

	function A(e, n) {
		var r, i, o = oe.ajaxSettings.flatOptions || {};
		for (r in n) n[r] !== t && ((o[r] ? e : i || (i = {}))[r] = n[r]);
		return i && oe.extend(!0, e, i), e
	}

	function L(e, n, r) {
		for (var i, o, s, a, u = e.contents, l = e.dataTypes;
			"*" === l[0];) l.shift(), i === t && (i = e.mimeType || n.getResponseHeader("Content-Type"));
		if (i)
			for (o in u)
				if (u[o] && u[o].test(i)) {
					l.unshift(o);
					break
				}
		if (l[0] in r) s = l[0];
		else {
			for (o in r) {
				if (!l[0] || e.converters[o + " " + l[0]]) {
					s = o;
					break
				}
				a || (a = o)
			}
			s = s || a
		}
		return s ? (s !== l[0] && l.unshift(s), r[s]) : void 0
	}

	function q(e, t, n, r) {
		var i, o, s, a, u, l = {},
			c = e.dataTypes.slice();
		if (c[1])
			for (s in e.converters) l[s.toLowerCase()] = e.converters[s];
		for (o = c.shift(); o;)
			if (e.responseFields[o] && (n[e.responseFields[o]] = t), !u && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)), u = o, o = c.shift())
				if ("*" === o) o = u;
				else if ("*" !== u && u !== o) {
			if (s = l[u + " " + o] || l["* " + o], !s)
				for (i in l)
					if (a = i.split(" "), a[1] === o && (s = l[u + " " + a[0]] || l["* " + a[0]])) {
						s === !0 ? s = l[i] : l[i] !== !0 && (o = a[0], c.unshift(a[1]));
						break
					}
			if (s !== !0)
				if (s && e["throws"]) t = s(t);
				else try {
					t = s(t)
				} catch (f) {
					return {
						state: "parsererror",
						error: s ? f : "No conversion from " + u + " to " + o
					}
				}
		}
		return {
			state: "success",
			data: t
		}
	}

	function H() {
		return setTimeout(function() {
			Et = t
		}), Et = oe.now()
	}

	function O(e, t) {
		oe.each(t, function(t, n) {
			for (var r = (qt[t] || []).concat(qt["*"]), i = 0, o = r.length; o > i; i++)
				if (r[i].call(e, t, n)) return
		})
	}

	function F(e, t, n) {
		var r, i, o = 0,
			s = Lt.length,
			a = oe.Deferred().always(function() {
				delete u.elem
			}),
			u = function() {
				if (i) return !1;
				for (var t = Et || H(), n = Math.max(0, l.startTime + l.duration - t), r = n / l.duration || 0, o = 1 - r, s = 0, u = l.tweens.length; u > s; s++) l.tweens[s].run(o);
				return a.notifyWith(e, [l, o, n]), 1 > o && u ? n : (a.resolveWith(e, [l]), !1)
			},
			l = a.promise({
				elem: e,
				props: oe.extend({}, t),
				opts: oe.extend(!0, {
					specialEasing: {}
				}, n),
				originalProperties: t,
				originalOptions: n,
				startTime: Et || H(),
				duration: n.duration,
				tweens: [],
				createTween: function(t, n) {
					var r = oe.Tween(e, l.opts, t, n, l.opts.specialEasing[t] || l.opts.easing);
					return l.tweens.push(r), r
				},
				stop: function(t) {
					var n = 0,
						r = t ? l.tweens.length : 0;
					if (i) return this;
					for (i = !0; r > n; n++) l.tweens[n].run(1);
					return t ? a.resolveWith(e, [l, t]) : a.rejectWith(e, [l, t]), this
				}
			}),
			c = l.props;
		for (P(c, l.opts.specialEasing); s > o; o++)
			if (r = Lt[o].call(l, e, c, l.opts)) return r;
		return O(l, c), oe.isFunction(l.opts.start) && l.opts.start.call(e, l), oe.fx.timer(oe.extend(u, {
			elem: e,
			anim: l,
			queue: l.opts.queue
		})), l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always)
	}

	function P(e, t) {
		var n, r, i, o, s;
		for (n in e)
			if (r = oe.camelCase(n), i = t[r], o = e[n], oe.isArray(o) && (i = o[1], o = e[n] = o[0]), n !== r && (e[r] = o, delete e[n]), s = oe.cssHooks[r], s && "expand" in s) {
				o = s.expand(o), delete e[r];
				for (n in o) n in e || (e[n] = o[n], t[n] = i)
			} else t[r] = i
	}

	function R(e, n, r) {
		var i, o, s, a, u, l, c, f, p, d = this,
			h = e.style,
			g = {},
			m = [],
			y = e.nodeType && x(e);
		r.queue || (f = oe._queueHooks(e, "fx"), null == f.unqueued && (f.unqueued = 0, p = f.empty.fire, f.empty.fire = function() {
			f.unqueued || p()
		}), f.unqueued++, d.always(function() {
			d.always(function() {
				f.unqueued--, oe.queue(e, "fx").length || f.empty.fire()
			})
		})), 1 === e.nodeType && ("height" in n || "width" in n) && (r.overflow = [h.overflow, h.overflowX, h.overflowY], "inline" === oe.css(e, "display") && "none" === oe.css(e, "float") && (h.display = "inline-block")), r.overflow && (h.overflow = "hidden", d.always(function() {
			h.overflow = r.overflow[0], h.overflowX = r.overflow[1], h.overflowY = r.overflow[2]
		})), u = me.get(e, "fxshow");
		for (i in n)
			if (s = n[i], jt.exec(s)) {
				if (delete n[i], l = l || "toggle" === s, s === (y ? "hide" : "show")) {
					if ("show" !== s || u === t || u[i] === t) continue;
					y = !0
				}
				m.push(i)
			}
		if (a = m.length) {
			u = me.get(e, "fxshow") || me.access(e, "fxshow", {}), "hidden" in u && (y = u.hidden), l && (u.hidden = !y), y ? oe(e).show() : d.done(function() {
				oe(e).hide()
			}), d.done(function() {
				var t;
				me.remove(e, "fxshow");
				for (t in g) oe.style(e, t, g[t])
			});
			for (i = 0; a > i; i++) o = m[i], c = d.createTween(o, y ? u[o] : 0), g[o] = u[o] || oe.style(e, o), o in u || (u[o] = c.start, y && (c.end = c.start, c.start = "width" === o || "height" === o ? 1 : 0))
		}
	}

	function M(e, t, n, r, i) {
		return new M.prototype.init(e, t, n, r, i)
	}

	function W(e, t) {
		var n, r = {
				height: e
			},
			i = 0;
		for (t = t ? 1 : 0; 4 > i; i += 2 - t) n = Qe[i], r["margin" + n] = r["padding" + n] = e;
		return t && (r.opacity = r.width = e), r
	}

	function $(e) {
		return oe.isWindow(e) ? e : 9 === e.nodeType && e.defaultView
	}
	var B, I, z = typeof t,
		_ = e.location,
		X = e.document,
		U = X.documentElement,
		Y = e.jQuery,
		V = e.$,
		G = {},
		J = [],
		Q = "2.0.0",
		K = J.concat,
		Z = J.push,
		ee = J.slice,
		te = J.indexOf,
		ne = G.toString,
		re = G.hasOwnProperty,
		ie = Q.trim,
		oe = function(e, t) {
			return new oe.fn.init(e, t, B)
		},
		se = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
		ae = /\S+/g,
		ue = /^(?:(<[\w\W]+>)[^>]*|#([\w-]*))$/,
		le = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
		ce = /^-ms-/,
		fe = /-([\da-z])/gi,
		pe = function(e, t) {
			return t.toUpperCase()
		},
		de = function() {
			X.removeEventListener("DOMContentLoaded", de, !1), e.removeEventListener("load", de, !1), oe.ready()
		};
	oe.fn = oe.prototype = {
			jquery: Q,
			constructor: oe,
			init: function(e, n, r) {
				var i, o;
				if (!e) return this;
				if ("string" == typeof e) {
					if (i = "<" === e.charAt(0) && ">" === e.charAt(e.length - 1) && e.length >= 3 ? [null, e, null] : ue.exec(e), !i || !i[1] && n) return !n || n.jquery ? (n || r).find(e) : this.constructor(n).find(e);
					if (i[1]) {
						if (n = n instanceof oe ? n[0] : n, oe.merge(this, oe.parseHTML(i[1], n && n.nodeType ? n.ownerDocument || n : X, !0)), le.test(i[1]) && oe.isPlainObject(n))
							for (i in n) oe.isFunction(this[i]) ? this[i](n[i]) : this.attr(i, n[i]);
						return this
					}
					return o = X.getElementById(i[2]), o && o.parentNode && (this.length = 1, this[0] = o), this.context = X, this.selector = e, this
				}
				return e.nodeType ? (this.context = this[0] = e, this.length = 1, this) : oe.isFunction(e) ? r.ready(e) : (e.selector !== t && (this.selector = e.selector, this.context = e.context), oe.makeArray(e, this))
			},
			selector: "",
			length: 0,
			toArray: function() {
				return ee.call(this)
			},
			get: function(e) {
				return null == e ? this.toArray() : 0 > e ? this[this.length + e] : this[e]
			},
			pushStack: function(e) {
				var t = oe.merge(this.constructor(), e);
				return t.prevObject = this, t.context = this.context, t
			},
			each: function(e, t) {
				return oe.each(this, e, t)
			},
			ready: function(e) {
				return oe.ready.promise().done(e), this
			},
			slice: function() {
				return this.pushStack(ee.apply(this, arguments))
			},
			first: function() {
				return this.eq(0)
			},
			last: function() {
				return this.eq(-1)
			},
			eq: function(e) {
				var t = this.length,
					n = +e + (0 > e ? t : 0);
				return this.pushStack(n >= 0 && t > n ? [this[n]] : [])
			},
			map: function(e) {
				return this.pushStack(oe.map(this, function(t, n) {
					return e.call(t, n, t)
				}))
			},
			end: function() {
				return this.prevObject || this.constructor(null)
			},
			push: Z,
			sort: [].sort,
			splice: [].splice
		}, oe.fn.init.prototype = oe.fn, oe.extend = oe.fn.extend = function() {
			var e, n, r, i, o, s, a = arguments[0] || {},
				u = 1,
				l = arguments.length,
				c = !1;
			for ("boolean" == typeof a && (c = a, a = arguments[1] || {}, u = 2), "object" == typeof a || oe.isFunction(a) || (a = {}), l === u && (a = this, --u); l > u; u++)
				if (null != (e = arguments[u]))
					for (n in e) r = a[n], i = e[n], a !== i && (c && i && (oe.isPlainObject(i) || (o = oe.isArray(i))) ? (o ? (o = !1, s = r && oe.isArray(r) ? r : []) : s = r && oe.isPlainObject(r) ? r : {}, a[n] = oe.extend(c, s, i)) : i !== t && (a[n] = i));
			return a
		}, oe.extend({
			expando: "jQuery" + (Q + Math.random()).replace(/\D/g, ""),
			noConflict: function(t) {
				return e.$ === oe && (e.$ = V), t && e.jQuery === oe && (e.jQuery = Y), oe
			},
			isReady: !1,
			readyWait: 1,
			holdReady: function(e) {
				e ? oe.readyWait++ : oe.ready(!0)
			},
			ready: function(e) {
				(e === !0 ? --oe.readyWait : oe.isReady) || (oe.isReady = !0, e !== !0 && --oe.readyWait > 0 || (I.resolveWith(X, [oe]), oe.fn.trigger && oe(X).trigger("ready").off("ready")))
			},
			isFunction: function(e) {
				return "function" === oe.type(e)
			},
			isArray: Array.isArray,
			isWindow: function(e) {
				return null != e && e === e.window
			},
			isNumeric: function(e) {
				return !isNaN(parseFloat(e)) && isFinite(e)
			},
			type: function(e) {
				return null == e ? String(e) : "object" == typeof e || "function" == typeof e ? G[ne.call(e)] || "object" : typeof e
			},
			isPlainObject: function(e) {
				if ("object" !== oe.type(e) || e.nodeType || oe.isWindow(e)) return !1;
				try {
					if (e.constructor && !re.call(e.constructor.prototype, "isPrototypeOf")) return !1
				} catch (t) {
					return !1
				}
				return !0
			},
			isEmptyObject: function(e) {
				var t;
				for (t in e) return !1;
				return !0
			},
			error: function(e) {
				throw new Error(e)
			},
			parseHTML: function(e, t, n) {
				if (!e || "string" != typeof e) return null;
				"boolean" == typeof t && (n = t, t = !1), t = t || X;
				var r = le.exec(e),
					i = !n && [];
				return r ? [t.createElement(r[1])] : (r = oe.buildFragment([e], t, i), i && oe(i).remove(), oe.merge([], r.childNodes))
			},
			parseJSON: JSON.parse,
			parseXML: function(e) {
				var n, r;
				if (!e || "string" != typeof e) return null;
				try {
					r = new DOMParser, n = r.parseFromString(e, "text/xml")
				} catch (i) {
					n = t
				}
				return (!n || n.getElementsByTagName("parsererror").length) && oe.error("Invalid XML: " + e), n
			},
			noop: function() {},
			globalEval: function(e) {
				var t, n = eval;
				e = oe.trim(e), e && (1 === e.indexOf("use strict") ? (t = X.createElement("script"), t.text = e, X.head.appendChild(t).parentNode.removeChild(t)) : n(e))
			},
			camelCase: function(e) {
				return e.replace(ce, "ms-").replace(fe, pe)
			},
			nodeName: function(e, t) {
				return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
			},
			each: function(e, t, r) {
				var i, o = 0,
					s = e.length,
					a = n(e);
				if (r) {
					if (a)
						for (; s > o && (i = t.apply(e[o], r), i !== !1); o++);
					else
						for (o in e)
							if (i = t.apply(e[o], r), i === !1) break
				} else if (a)
					for (; s > o && (i = t.call(e[o], o, e[o]), i !== !1); o++);
				else
					for (o in e)
						if (i = t.call(e[o], o, e[o]), i === !1) break;
				return e
			},
			trim: function(e) {
				return null == e ? "" : ie.call(e)
			},
			makeArray: function(e, t) {
				var r = t || [];
				return null != e && (n(Object(e)) ? oe.merge(r, "string" == typeof e ? [e] : e) : Z.call(r, e)), r
			},
			inArray: function(e, t, n) {
				return null == t ? -1 : te.call(t, e, n)
			},
			merge: function(e, n) {
				var r = n.length,
					i = e.length,
					o = 0;
				if ("number" == typeof r)
					for (; r > o; o++) e[i++] = n[o];
				else
					for (; n[o] !== t;) e[i++] = n[o++];
				return e.length = i, e
			},
			grep: function(e, t, n) {
				var r, i = [],
					o = 0,
					s = e.length;
				for (n = !!n; s > o; o++) r = !!t(e[o], o), n !== r && i.push(e[o]);
				return i
			},
			map: function(e, t, r) {
				var i, o = 0,
					s = e.length,
					a = n(e),
					u = [];
				if (a)
					for (; s > o; o++) i = t(e[o], o, r), null != i && (u[u.length] = i);
				else
					for (o in e) i = t(e[o], o, r), null != i && (u[u.length] = i);
				return K.apply([], u)
			},
			guid: 1,
			proxy: function(e, n) {
				var r, i, o;
				return "string" == typeof n && (r = e[n], n = e, e = r), oe.isFunction(e) ? (i = ee.call(arguments, 2), o = function() {
					return e.apply(n || this, i.concat(ee.call(arguments)))
				}, o.guid = e.guid = e.guid || oe.guid++, o) : t
			},
			access: function(e, n, r, i, o, s, a) {
				var u = 0,
					l = e.length,
					c = null == r;
				if ("object" === oe.type(r)) {
					o = !0;
					for (u in r) oe.access(e, n, u, r[u], !0, s, a)
				} else if (i !== t && (o = !0, oe.isFunction(i) || (a = !0), c && (a ? (n.call(e, i), n = null) : (c = n, n = function(e, t, n) {
						return c.call(oe(e), n)
					})), n))
					for (; l > u; u++) n(e[u], r, a ? i : i.call(e[u], u, n(e[u], r)));
				return o ? e : c ? n.call(e) : l ? n(e[0], r) : s
			},
			now: Date.now,
			swap: function(e, t, n, r) {
				var i, o, s = {};
				for (o in t) s[o] = e.style[o], e.style[o] = t[o];
				i = n.apply(e, r || []);
				for (o in t) e.style[o] = s[o];
				return i
			}
		}), oe.ready.promise = function(t) {
			return I || (I = oe.Deferred(), "complete" === X.readyState ? setTimeout(oe.ready) : (X.addEventListener("DOMContentLoaded", de, !1), e.addEventListener("load", de, !1))), I.promise(t)
		}, oe.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(e, t) {
			G["[object " + t + "]"] = t.toLowerCase()
		}), B = oe(X),
		function(e, t) {
			function n(e) {
				return xe.test(e + "")
			}

			function r() {
				var e, t = [];
				return e = function(n, r) {
					return t.push(n += " ") > E.cacheLength && delete e[t.shift()], e[n] = r
				}
			}

			function i(e) {
				return e[$] = !0, e
			}

			function o(e) {
				var t = H.createElement("div");
				try {
					return !!e(t)
				} catch (n) {
					return !1
				} finally {
					t.parentNode && t.parentNode.removeChild(t), t = null
				}
			}

			function s(e, t, n, r) {
				var i, o, s, a, u, l, c, f, p, g;
				if ((t ? t.ownerDocument || t : B) !== H && q(t), t = t || H, n = n || [], !e || "string" != typeof e) return n;
				if (1 !== (a = t.nodeType) && 9 !== a) return [];
				if (F && !r) {
					if (i = be.exec(e))
						if (s = i[1]) {
							if (9 === a) {
								if (o = t.getElementById(s), !o || !o.parentNode) return n;
								if (o.id === s) return n.push(o), n
							} else if (t.ownerDocument && (o = t.ownerDocument.getElementById(s)) && W(t, o) && o.id === s) return n.push(o), n
						} else {
							if (i[2]) return te.apply(n, t.getElementsByTagName(e)), n;
							if ((s = i[3]) && I.getElementsByClassName && t.getElementsByClassName) return te.apply(n, t.getElementsByClassName(s)), n
						}
					if (I.qsa && (!P || !P.test(e))) {
						if (f = c = $, p = t, g = 9 === a && e, 1 === a && "object" !== t.nodeName.toLowerCase()) {
							for (l = d(e), (c = t.getAttribute("id")) ? f = c.replace(Ce, "\\$&") : t.setAttribute("id", f), f = "[id='" + f + "'] ", u = l.length; u--;) l[u] = f + h(l[u]);
							p = he.test(e) && t.parentNode || t, g = l.join(",")
						}
						if (g) try {
							return te.apply(n, p.querySelectorAll(g)), n
						} catch (m) {} finally {
							c || t.removeAttribute("id")
						}
					}
				}
				return T(e.replace(fe, "$1"), t, n, r)
			}

			function a(e, t) {
				var n = t && e,
					r = n && (~t.sourceIndex || Q) - (~e.sourceIndex || Q);
				if (r) return r;
				if (n)
					for (; n = n.nextSibling;)
						if (n === t) return -1;
				return e ? 1 : -1
			}

			function u(e, n, r) {
				var i;
				return r ? t : (i = e.getAttributeNode(n)) && i.specified ? i.value : e[n] === !0 ? n.toLowerCase() : null
			}

			function l(e, n, r) {
				var i;
				return r ? t : i = e.getAttribute(n, "type" === n.toLowerCase() ? 1 : 2)
			}

			function c(e) {
				return function(t) {
					var n = t.nodeName.toLowerCase();
					return "input" === n && t.type === e
				}
			}

			function f(e) {
				return function(t) {
					var n = t.nodeName.toLowerCase();
					return ("input" === n || "button" === n) && t.type === e
				}
			}

			function p(e) {
				return i(function(t) {
					return t = +t, i(function(n, r) {
						for (var i, o = e([], n.length, t), s = o.length; s--;) n[i = o[s]] && (n[i] = !(r[i] = n[i]))
					})
				})
			}

			function d(e, t) {
				var n, r, i, o, a, u, l, c = U[e + " "];
				if (c) return t ? 0 : c.slice(0);
				for (a = e, u = [], l = E.preFilter; a;) {
					(!n || (r = pe.exec(a))) && (r && (a = a.slice(r[0].length) || a), u.push(i = [])), n = !1, (r = de.exec(a)) && (n = r.shift(), i.push({
						value: n,
						type: r[0].replace(fe, " ")
					}), a = a.slice(n.length));
					for (o in E.filter) !(r = ve[o].exec(a)) || l[o] && !(r = l[o](r)) || (n = r.shift(), i.push({
						value: n,
						type: o,
						matches: r
					}), a = a.slice(n.length));
					if (!n) break
				}
				return t ? a.length : a ? s.error(e) : U(e, u).slice(0)
			}

			function h(e) {
				for (var t = 0, n = e.length, r = ""; n > t; t++) r += e[t].value;
				return r
			}

			function g(e, t, n) {
				var r = t.dir,
					i = n && "parentNode" === r,
					o = _++;
				return t.first ? function(t, n, o) {
					for (; t = t[r];)
						if (1 === t.nodeType || i) return e(t, n, o)
				} : function(t, n, s) {
					var a, u, l, c = z + " " + o;
					if (s) {
						for (; t = t[r];)
							if ((1 === t.nodeType || i) && e(t, n, s)) return !0
					} else
						for (; t = t[r];)
							if (1 === t.nodeType || i)
								if (l = t[$] || (t[$] = {}), (u = l[r]) && u[0] === c) {
									if ((a = u[1]) === !0 || a === k) return a === !0
								} else if (u = l[r] = [c], u[1] = e(t, n, s) || k, u[1] === !0) return !0
				}
			}

			function m(e) {
				return e.length > 1 ? function(t, n, r) {
					for (var i = e.length; i--;)
						if (!e[i](t, n, r)) return !1;
					return !0
				} : e[0]
			}

			function y(e, t, n, r, i) {
				for (var o, s = [], a = 0, u = e.length, l = null != t; u > a; a++)(o = e[a]) && (!n || n(o, r, i)) && (s.push(o), l && t.push(a));
				return s
			}

			function v(e, t, n, r, o, s) {
				return r && !r[$] && (r = v(r)), o && !o[$] && (o = v(o, s)), i(function(i, s, a, u) {
					var l, c, f, p = [],
						d = [],
						h = s.length,
						g = i || w(t || "*", a.nodeType ? [a] : a, []),
						m = !e || !i && t ? g : y(g, p, e, a, u),
						v = n ? o || (i ? e : h || r) ? [] : s : m;
					if (n && n(m, v, a, u), r)
						for (l = y(v, d), r(l, [], a, u), c = l.length; c--;)(f = l[c]) && (v[d[c]] = !(m[d[c]] = f));
					if (i) {
						if (o || e) {
							if (o) {
								for (l = [], c = v.length; c--;)(f = v[c]) && l.push(m[c] = f);
								o(null, v = [], l, u)
							}
							for (c = v.length; c--;)(f = v[c]) && (l = o ? re.call(i, f) : p[c]) > -1 && (i[l] = !(s[l] = f))
						}
					} else v = y(v === s ? v.splice(h, v.length) : v), o ? o(null, s, v, u) : te.apply(s, v)
				})
			}

			function x(e) {
				for (var t, n, r, i = e.length, o = E.relative[e[0].type], s = o || E.relative[" "], a = o ? 1 : 0, u = g(function(e) {
						return e === t
					}, s, !0), l = g(function(e) {
						return re.call(t, e) > -1
					}, s, !0), c = [function(e, n, r) {
						return !o && (r || n !== A) || ((t = n).nodeType ? u(e, n, r) : l(e, n, r))
					}]; i > a; a++)
					if (n = E.relative[e[a].type]) c = [g(m(c), n)];
					else {
						if (n = E.filter[e[a].type].apply(null, e[a].matches), n[$]) {
							for (r = ++a; i > r && !E.relative[e[r].type]; r++);
							return v(a > 1 && m(c), a > 1 && h(e.slice(0, a - 1)).replace(fe, "$1"), n, r > a && x(e.slice(a, r)), i > r && x(e = e.slice(r)), i > r && h(e))
						}
						c.push(n)
					}
				return m(c)
			}

			function b(e, t) {
				var n = 0,
					r = t.length > 0,
					o = e.length > 0,
					a = function(i, a, u, l, c) {
						var f, p, d, h = [],
							g = 0,
							m = "0",
							v = i && [],
							x = null != c,
							b = A,
							w = i || o && E.find.TAG("*", c && a.parentNode || a),
							T = z += null == b ? 1 : Math.random() || .1;
						for (x && (A = a !== H && a, k = n); null != (f = w[m]); m++) {
							if (o && f) {
								for (p = 0; d = e[p++];)
									if (d(f, a, u)) {
										l.push(f);
										break
									}
								x && (z = T, k = ++n)
							}
							r && ((f = !d && f) && g--, i && v.push(f))
						}
						if (g += m, r && m !== g) {
							for (p = 0; d = t[p++];) d(v, h, a, u);
							if (i) {
								if (g > 0)
									for (; m--;) v[m] || h[m] || (h[m] = Z.call(l));
								h = y(h)
							}
							te.apply(l, h), x && !i && h.length > 0 && g + t.length > 1 && s.uniqueSort(l)
						}
						return x && (z = T, A = b), v
					};
				return r ? i(a) : a
			}

			function w(e, t, n) {
				for (var r = 0, i = t.length; i > r; r++) s(e, t[r], n);
				return n
			}

			function T(e, t, n, r) {
				var i, o, s, a, u, l = d(e);
				if (!r && 1 === l.length) {
					if (o = l[0] = l[0].slice(0), o.length > 2 && "ID" === (s = o[0]).type && 9 === t.nodeType && F && E.relative[o[1].type]) {
						if (t = (E.find.ID(s.matches[0].replace(Ne, ke), t) || [])[0], !t) return n;
						e = e.slice(o.shift().value.length)
					}
					for (i = ve.needsContext.test(e) ? 0 : o.length; i-- && (s = o[i], !E.relative[a = s.type]);)
						if ((u = E.find[a]) && (r = u(s.matches[0].replace(Ne, ke), he.test(o[0].type) && t.parentNode || t))) {
							if (o.splice(i, 1), e = r.length && h(o), !e) return te.apply(n, r), n;
							break
						}
				}
				return D(e, l)(r, t, !F, n, he.test(e)), n
			}

			function C() {}
			var N, k, E, S, j, D, A, L, q, H, O, F, P, R, M, W, $ = "sizzle" + -new Date,
				B = e.document,
				I = {},
				z = 0,
				_ = 0,
				X = r(),
				U = r(),
				Y = r(),
				V = !1,
				G = function() {
					return 0
				},
				J = typeof t,
				Q = 1 << 31,
				K = [],
				Z = K.pop,
				ee = K.push,
				te = K.push,
				ne = K.slice,
				re = K.indexOf || function(e) {
					for (var t = 0, n = this.length; n > t; t++)
						if (this[t] === e) return t;
					return -1
				},
				ie = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
				se = "[\\x20\\t\\r\\n\\f]",
				ae = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
				ue = ae.replace("w", "w#"),
				le = "\\[" + se + "*(" + ae + ")" + se + "*(?:([*^$|!~]?=)" + se + "*(?:(['\"])((?:\\\\.|[^\\\\])*?)\\3|(" + ue + ")|)|)" + se + "*\\]",
				ce = ":(" + ae + ")(?:\\(((['\"])((?:\\\\.|[^\\\\])*?)\\3|((?:\\\\.|[^\\\\()[\\]]|" + le.replace(3, 8) + ")*)|.*)\\)|)",
				fe = new RegExp("^" + se + "+|((?:^|[^\\\\])(?:\\\\.)*)" + se + "+$", "g"),
				pe = new RegExp("^" + se + "*," + se + "*"),
				de = new RegExp("^" + se + "*([>+~]|" + se + ")" + se + "*"),
				he = new RegExp(se + "*[+~]"),
				ge = new RegExp("=" + se + "*([^\\]'\"]*)" + se + "*\\]", "g"),
				me = new RegExp(ce),
				ye = new RegExp("^" + ue + "$"),
				ve = {
					ID: new RegExp("^#(" + ae + ")"),
					CLASS: new RegExp("^\\.(" + ae + ")"),
					TAG: new RegExp("^(" + ae.replace("w", "w*") + ")"),
					ATTR: new RegExp("^" + le),
					PSEUDO: new RegExp("^" + ce),
					CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + se + "*(even|odd|(([+-]|)(\\d*)n|)" + se + "*(?:([+-]|)" + se + "*(\\d+)|))" + se + "*\\)|)", "i"),
					"boolean": new RegExp("^(?:" + ie + ")$", "i"),
					needsContext: new RegExp("^" + se + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + se + "*((?:-\\d)?\\d*)" + se + "*\\)|)(?=[^-]|$)", "i")
				},
				xe = /^[^{]+\{\s*\[native \w/,
				be = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
				we = /^(?:input|select|textarea|button)$/i,
				Te = /^h\d$/i,
				Ce = /'|\\/g,
				Ne = /\\([\da-fA-F]{1,6}[\x20\t\r\n\f]?|.)/g,
				ke = function(e, t) {
					var n = "0x" + t - 65536;
					return n !== n ? t : 0 > n ? String.fromCharCode(n + 65536) : String.fromCharCode(n >> 10 | 55296, 1023 & n | 56320)
				};
			try {
				te.apply(K = ne.call(B.childNodes), B.childNodes), K[B.childNodes.length].nodeType
			} catch (Ee) {
				te = {
					apply: K.length ? function(e, t) {
						ee.apply(e, ne.call(t))
					} : function(e, t) {
						for (var n = e.length, r = 0; e[n++] = t[r++];);
						e.length = n - 1
					}
				}
			}
			j = s.isXML = function(e) {
				var t = e && (e.ownerDocument || e).documentElement;
				return t ? "HTML" !== t.nodeName : !1
			}, q = s.setDocument = function(e) {
				var r = e ? e.ownerDocument || e : B;
				return r !== H && 9 === r.nodeType && r.documentElement ? (H = r, O = r.documentElement, F = !j(r), I.getElementsByTagName = o(function(e) {
					return e.appendChild(r.createComment("")), !e.getElementsByTagName("*").length
				}), I.attributes = o(function(e) {
					return e.className = "i", !e.getAttribute("className")
				}), I.getElementsByClassName = o(function(e) {
					return e.innerHTML = "<div class='a'></div><div class='a i'></div>", e.firstChild.className = "i", 2 === e.getElementsByClassName("i").length
				}), I.sortDetached = o(function(e) {
					return 1 & e.compareDocumentPosition(H.createElement("div"))
				}), I.getById = o(function(e) {
					return O.appendChild(e).id = $, !r.getElementsByName || !r.getElementsByName($).length
				}), I.getById ? (E.find.ID = function(e, t) {
					if (typeof t.getElementById !== J && F) {
						var n = t.getElementById(e);
						return n && n.parentNode ? [n] : []
					}
				}, E.filter.ID = function(e) {
					var t = e.replace(Ne, ke);
					return function(e) {
						return e.getAttribute("id") === t
					}
				}) : (E.find.ID = function(e, n) {
					if (typeof n.getElementById !== J && F) {
						var r = n.getElementById(e);
						return r ? r.id === e || typeof r.getAttributeNode !== J && r.getAttributeNode("id").value === e ? [r] : t : []
					}
				}, E.filter.ID = function(e) {
					var t = e.replace(Ne, ke);
					return function(e) {
						var n = typeof e.getAttributeNode !== J && e.getAttributeNode("id");
						return n && n.value === t
					}
				}), E.find.TAG = I.getElementsByTagName ? function(e, t) {
					return typeof t.getElementsByTagName !== J ? t.getElementsByTagName(e) : void 0
				} : function(e, t) {
					var n, r = [],
						i = 0,
						o = t.getElementsByTagName(e);
					if ("*" === e) {
						for (; n = o[i++];) 1 === n.nodeType && r.push(n);
						return r
					}
					return o
				}, E.find.CLASS = I.getElementsByClassName && function(e, t) {
					return typeof t.getElementsByClassName !== J && F ? t.getElementsByClassName(e) : void 0
				}, R = [], P = [], (I.qsa = n(r.querySelectorAll)) && (o(function(e) {
					e.innerHTML = "<select><option selected=''></option></select>", e.querySelectorAll("[selected]").length || P.push("\\[" + se + "*(?:value|" + ie + ")"), e.querySelectorAll(":checked").length || P.push(":checked")
				}), o(function(e) {
					var t = H.createElement("input");
					t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("t", ""), e.querySelectorAll("[t^='']").length && P.push("[*^$]=" + se + "*(?:''|\"\")"), e.querySelectorAll(":enabled").length || P.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), P.push(",.*:")
				})), (I.matchesSelector = n(M = O.webkitMatchesSelector || O.mozMatchesSelector || O.oMatchesSelector || O.msMatchesSelector)) && o(function(e) {
					I.disconnectedMatch = M.call(e, "div"), M.call(e, "[s!='']:x"), R.push("!=", ce)
				}), P = P.length && new RegExp(P.join("|")), R = R.length && new RegExp(R.join("|")), W = n(O.contains) || O.compareDocumentPosition ? function(e, t) {
					var n = 9 === e.nodeType ? e.documentElement : e,
						r = t && t.parentNode;
					return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
				} : function(e, t) {
					if (t)
						for (; t = t.parentNode;)
							if (t === e) return !0;
					return !1
				}, G = O.compareDocumentPosition ? function(e, t) {
					if (e === t) return V = !0, 0;
					var n = t.compareDocumentPosition && e.compareDocumentPosition && e.compareDocumentPosition(t);
					return n ? 1 & n || !I.sortDetached && t.compareDocumentPosition(e) === n ? e === r || W(B, e) ? -1 : t === r || W(B, t) ? 1 : L ? re.call(L, e) - re.call(L, t) : 0 : 4 & n ? -1 : 1 : e.compareDocumentPosition ? -1 : 1
				} : function(e, t) {
					var n, i = 0,
						o = e.parentNode,
						s = t.parentNode,
						u = [e],
						l = [t];
					if (e === t) return V = !0, 0;
					if (!o || !s) return e === r ? -1 : t === r ? 1 : o ? -1 : s ? 1 : L ? re.call(L, e) - re.call(L, t) : 0;
					if (o === s) return a(e, t);
					for (n = e; n = n.parentNode;) u.unshift(n);
					for (n = t; n = n.parentNode;) l.unshift(n);
					for (; u[i] === l[i];) i++;
					return i ? a(u[i], l[i]) : u[i] === B ? -1 : l[i] === B ? 1 : 0
				}, H) : H
			}, s.matches = function(e, t) {
				return s(e, null, null, t)
			}, s.matchesSelector = function(e, t) {
				if ((e.ownerDocument || e) !== H && q(e), t = t.replace(ge, "='$1']"), I.matchesSelector && F && (!R || !R.test(t)) && (!P || !P.test(t))) try {
					var n = M.call(e, t);
					if (n || I.disconnectedMatch || e.document && 11 !== e.document.nodeType) return n
				} catch (r) {}
				return s(t, H, null, [e]).length > 0
			}, s.contains = function(e, t) {
				return (e.ownerDocument || e) !== H && q(e), W(e, t)
			}, s.attr = function(e, n) {
				(e.ownerDocument || e) !== H && q(e);
				var r = E.attrHandle[n.toLowerCase()],
					i = r && r(e, n, !F);
				return i === t ? I.attributes || !F ? e.getAttribute(n) : (i = e.getAttributeNode(n)) && i.specified ? i.value : null : i
			}, s.error = function(e) {
				throw new Error("Syntax error, unrecognized expression: " + e)
			}, s.uniqueSort = function(e) {
				var t, n = [],
					r = 0,
					i = 0;
				if (V = !I.detectDuplicates, L = !I.sortStable && e.slice(0), e.sort(G), V) {
					for (; t = e[i++];) t === e[i] && (r = n.push(i));
					for (; r--;) e.splice(n[r], 1)
				}
				return e
			}, S = s.getText = function(e) {
				var t, n = "",
					r = 0,
					i = e.nodeType;
				if (i) {
					if (1 === i || 9 === i || 11 === i) {
						if ("string" == typeof e.textContent) return e.textContent;
						for (e = e.firstChild; e; e = e.nextSibling) n += S(e)
					} else if (3 === i || 4 === i) return e.nodeValue
				} else
					for (; t = e[r]; r++) n += S(t);
				return n
			}, E = s.selectors = {
				cacheLength: 50,
				createPseudo: i,
				match: ve,
				attrHandle: {},
				find: {},
				relative: {
					">": {
						dir: "parentNode",
						first: !0
					},
					" ": {
						dir: "parentNode"
					},
					"+": {
						dir: "previousSibling",
						first: !0
					},
					"~": {
						dir: "previousSibling"
					}
				},
				preFilter: {
					ATTR: function(e) {
						return e[1] = e[1].replace(Ne, ke), e[3] = (e[4] || e[5] || "").replace(Ne, ke), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
					},
					CHILD: function(e) {
						return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || s.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && s.error(e[0]), e
					},
					PSEUDO: function(e) {
						var t, n = !e[5] && e[2];
						return ve.CHILD.test(e[0]) ? null : (e[4] ? e[2] = e[4] : n && me.test(n) && (t = d(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
					}
				},
				filter: {
					TAG: function(e) {
						var t = e.replace(Ne, ke).toLowerCase();
						return "*" === e ? function() {
							return !0
						} : function(e) {
							return e.nodeName && e.nodeName.toLowerCase() === t
						}
					},
					CLASS: function(e) {
						var t = X[e + " "];
						return t || (t = new RegExp("(^|" + se + ")" + e + "(" + se + "|$)")) && X(e, function(e) {
							return t.test("string" == typeof e.className && e.className || typeof e.getAttribute !== J && e.getAttribute("class") || "")
						})
					},
					ATTR: function(e, t, n) {
						return function(r) {
							var i = s.attr(r, e);
							return null == i ? "!=" === t : t ? (i += "", "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && i.indexOf(n) > -1 : "$=" === t ? n && i.slice(-n.length) === n : "~=" === t ? (" " + i + " ").indexOf(n) > -1 : "|=" === t ? i === n || i.slice(0, n.length + 1) === n + "-" : !1) : !0
						}
					},
					CHILD: function(e, t, n, r, i) {
						var o = "nth" !== e.slice(0, 3),
							s = "last" !== e.slice(-4),
							a = "of-type" === t;
						return 1 === r && 0 === i ? function(e) {
							return !!e.parentNode
						} : function(t, n, u) {
							var l, c, f, p, d, h, g = o !== s ? "nextSibling" : "previousSibling",
								m = t.parentNode,
								y = a && t.nodeName.toLowerCase(),
								v = !u && !a;
							if (m) {
								if (o) {
									for (; g;) {
										for (f = t; f = f[g];)
											if (a ? f.nodeName.toLowerCase() === y : 1 === f.nodeType) return !1;
										h = g = "only" === e && !h && "nextSibling"
									}
									return !0
								}
								if (h = [s ? m.firstChild : m.lastChild], s && v) {
									for (c = m[$] || (m[$] = {}), l = c[e] || [], d = l[0] === z && l[1], p = l[0] === z && l[2], f = d && m.childNodes[d]; f = ++d && f && f[g] || (p = d = 0) || h.pop();)
										if (1 === f.nodeType && ++p && f === t) {
											c[e] = [z, d, p];
											break
										}
								} else if (v && (l = (t[$] || (t[$] = {}))[e]) && l[0] === z) p = l[1];
								else
									for (;
										(f = ++d && f && f[g] || (p = d = 0) || h.pop()) && ((a ? f.nodeName.toLowerCase() !== y : 1 !== f.nodeType) || !++p || (v && ((f[$] || (f[$] = {}))[e] = [z, p]), f !== t)););
								return p -= i, p === r || p % r === 0 && p / r >= 0
							}
						}
					},
					PSEUDO: function(e, t) {
						var n, r = E.pseudos[e] || E.setFilters[e.toLowerCase()] || s.error("unsupported pseudo: " + e);
						return r[$] ? r(t) : r.length > 1 ? (n = [e, e, "", t], E.setFilters.hasOwnProperty(e.toLowerCase()) ? i(function(e, n) {
							for (var i, o = r(e, t), s = o.length; s--;) i = re.call(e, o[s]), e[i] = !(n[i] = o[s])
						}) : function(e) {
							return r(e, 0, n)
						}) : r
					}
				},
				pseudos: {
					not: i(function(e) {
						var t = [],
							n = [],
							r = D(e.replace(fe, "$1"));
						return r[$] ? i(function(e, t, n, i) {
							for (var o, s = r(e, null, i, []), a = e.length; a--;)(o = s[a]) && (e[a] = !(t[a] = o))
						}) : function(e, i, o) {
							return t[0] = e, r(t, null, o, n), !n.pop()
						}
					}),
					has: i(function(e) {
						return function(t) {
							return s(e, t).length > 0
						}
					}),
					contains: i(function(e) {
						return function(t) {
							return (t.textContent || t.innerText || S(t)).indexOf(e) > -1
						}
					}),
					lang: i(function(e) {
						return ye.test(e || "") || s.error("unsupported lang: " + e), e = e.replace(Ne, ke).toLowerCase(),
							function(t) {
								var n;
								do
									if (n = F ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return n = n.toLowerCase(), n === e || 0 === n.indexOf(e + "-"); while ((t = t.parentNode) && 1 === t.nodeType);
								return !1
							}
					}),
					target: function(t) {
						var n = e.location && e.location.hash;
						return n && n.slice(1) === t.id
					},
					root: function(e) {
						return e === O
					},
					focus: function(e) {
						return e === H.activeElement && (!H.hasFocus || H.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
					},
					enabled: function(e) {
						return e.disabled === !1
					},
					disabled: function(e) {
						return e.disabled === !0
					},
					checked: function(e) {
						var t = e.nodeName.toLowerCase();
						return "input" === t && !!e.checked || "option" === t && !!e.selected
					},
					selected: function(e) {
						return e.parentNode && e.parentNode.selectedIndex, e.selected === !0
					},
					empty: function(e) {
						for (e = e.firstChild; e; e = e.nextSibling)
							if (e.nodeName > "@" || 3 === e.nodeType || 4 === e.nodeType) return !1;
						return !0
					},
					parent: function(e) {
						return !E.pseudos.empty(e)
					},
					header: function(e) {
						return Te.test(e.nodeName)
					},
					input: function(e) {
						return we.test(e.nodeName)
					},
					button: function(e) {
						var t = e.nodeName.toLowerCase();
						return "input" === t && "button" === e.type || "button" === t
					},
					text: function(e) {
						var t;
						return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || t.toLowerCase() === e.type)
					},
					first: p(function() {
						return [0]
					}),
					last: p(function(e, t) {
						return [t - 1]
					}),
					eq: p(function(e, t, n) {
						return [0 > n ? n + t : n]
					}),
					even: p(function(e, t) {
						for (var n = 0; t > n; n += 2) e.push(n);
						return e
					}),
					odd: p(function(e, t) {
						for (var n = 1; t > n; n += 2) e.push(n);
						return e;
					}),
					lt: p(function(e, t, n) {
						for (var r = 0 > n ? n + t : n; --r >= 0;) e.push(r);
						return e
					}),
					gt: p(function(e, t, n) {
						for (var r = 0 > n ? n + t : n; ++r < t;) e.push(r);
						return e
					})
				}
			};
			for (N in {
					radio: !0,
					checkbox: !0,
					file: !0,
					password: !0,
					image: !0
				}) E.pseudos[N] = c(N);
			for (N in {
					submit: !0,
					reset: !0
				}) E.pseudos[N] = f(N);
			D = s.compile = function(e, t) {
				var n, r = [],
					i = [],
					o = Y[e + " "];
				if (!o) {
					for (t || (t = d(e)), n = t.length; n--;) o = x(t[n]), o[$] ? r.push(o) : i.push(o);
					o = Y(e, b(i, r))
				}
				return o
			}, E.pseudos.nth = E.pseudos.eq, C.prototype = E.filters = E.pseudos, E.setFilters = new C, I.sortStable = $.split("").sort(G).join("") === $, q(), [0, 0].sort(G), I.detectDuplicates = V, o(function(e) {
				if (e.innerHTML = "<a href='#'></a>", "#" !== e.firstChild.getAttribute("href"))
					for (var t = "type|href|height|width".split("|"), n = t.length; n--;) E.attrHandle[t[n]] = l
			}), o(function(e) {
				if (null != e.getAttribute("disabled"))
					for (var t = ie.split("|"), n = t.length; n--;) E.attrHandle[t[n]] = u
			}), oe.find = s, oe.expr = s.selectors, oe.expr[":"] = oe.expr.pseudos, oe.unique = s.uniqueSort, oe.text = s.getText, oe.isXMLDoc = s.isXML, oe.contains = s.contains
		}(e);
	var he = {};
	oe.Callbacks = function(e) {
		e = "string" == typeof e ? he[e] || r(e) : oe.extend({}, e);
		var n, i, o, s, a, u, l = [],
			c = !e.once && [],
			f = function(t) {
				for (n = e.memory && t, i = !0, u = s || 0, s = 0, a = l.length, o = !0; l && a > u; u++)
					if (l[u].apply(t[0], t[1]) === !1 && e.stopOnFalse) {
						n = !1;
						break
					}
				o = !1, l && (c ? c.length && f(c.shift()) : n ? l = [] : p.disable())
			},
			p = {
				add: function() {
					if (l) {
						var t = l.length;
						! function r(t) {
							oe.each(t, function(t, n) {
								var i = oe.type(n);
								"function" === i ? e.unique && p.has(n) || l.push(n) : n && n.length && "string" !== i && r(n)
							})
						}(arguments), o ? a = l.length : n && (s = t, f(n))
					}
					return this
				},
				remove: function() {
					return l && oe.each(arguments, function(e, t) {
						for (var n;
							(n = oe.inArray(t, l, n)) > -1;) l.splice(n, 1), o && (a >= n && a--, u >= n && u--)
					}), this
				},
				has: function(e) {
					return e ? oe.inArray(e, l) > -1 : !(!l || !l.length)
				},
				empty: function() {
					return l = [], a = 0, this
				},
				disable: function() {
					return l = c = n = t, this
				},
				disabled: function() {
					return !l
				},
				lock: function() {
					return c = t, n || p.disable(), this
				},
				locked: function() {
					return !c
				},
				fireWith: function(e, t) {
					return t = t || [], t = [e, t.slice ? t.slice() : t], !l || i && !c || (o ? c.push(t) : f(t)), this
				},
				fire: function() {
					return p.fireWith(this, arguments), this
				},
				fired: function() {
					return !!i
				}
			};
		return p
	}, oe.extend({
		Deferred: function(e) {
			var t = [
					["resolve", "done", oe.Callbacks("once memory"), "resolved"],
					["reject", "fail", oe.Callbacks("once memory"), "rejected"],
					["notify", "progress", oe.Callbacks("memory")]
				],
				n = "pending",
				r = {
					state: function() {
						return n
					},
					always: function() {
						return i.done(arguments).fail(arguments), this
					},
					then: function() {
						var e = arguments;
						return oe.Deferred(function(n) {
							oe.each(t, function(t, o) {
								var s = o[0],
									a = oe.isFunction(e[t]) && e[t];
								i[o[1]](function() {
									var e = a && a.apply(this, arguments);
									e && oe.isFunction(e.promise) ? e.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[s + "With"](this === r ? n.promise() : this, a ? [e] : arguments)
								})
							}), e = null
						}).promise()
					},
					promise: function(e) {
						return null != e ? oe.extend(e, r) : r
					}
				},
				i = {};
			return r.pipe = r.then, oe.each(t, function(e, o) {
				var s = o[2],
					a = o[3];
				r[o[1]] = s.add, a && s.add(function() {
					n = a
				}, t[1 ^ e][2].disable, t[2][2].lock), i[o[0]] = function() {
					return i[o[0] + "With"](this === i ? r : this, arguments), this
				}, i[o[0] + "With"] = s.fireWith
			}), r.promise(i), e && e.call(i, i), i
		},
		when: function(e) {
			var t, n, r, i = 0,
				o = ee.call(arguments),
				s = o.length,
				a = 1 !== s || e && oe.isFunction(e.promise) ? s : 0,
				u = 1 === a ? e : oe.Deferred(),
				l = function(e, n, r) {
					return function(i) {
						n[e] = this, r[e] = arguments.length > 1 ? ee.call(arguments) : i, r === t ? u.notifyWith(n, r) : --a || u.resolveWith(n, r)
					}
				};
			if (s > 1)
				for (t = new Array(s), n = new Array(s), r = new Array(s); s > i; i++) o[i] && oe.isFunction(o[i].promise) ? o[i].promise().done(l(i, r, o)).fail(u.reject).progress(l(i, n, t)) : --a;
			return a || u.resolveWith(r, o), u.promise()
		}
	}), oe.support = function(t) {
		var n = X.createElement("input"),
			r = X.createDocumentFragment(),
			i = X.createElement("div"),
			o = X.createElement("select"),
			s = o.appendChild(X.createElement("option"));
		return n.type ? (n.type = "checkbox", t.checkOn = "" !== n.value, t.optSelected = s.selected, t.reliableMarginRight = !0, t.boxSizingReliable = !0, t.pixelPosition = !1, n.checked = !0, t.noCloneChecked = n.cloneNode(!0).checked, o.disabled = !0, t.optDisabled = !s.disabled, n = X.createElement("input"), n.value = "t", n.type = "radio", t.radioValue = "t" === n.value, n.setAttribute("checked", "t"), n.setAttribute("name", "t"), r.appendChild(n), t.checkClone = r.cloneNode(!0).cloneNode(!0).lastChild.checked, t.focusinBubbles = "onfocusin" in e, i.style.backgroundClip = "content-box", i.cloneNode(!0).style.backgroundClip = "", t.clearCloneStyle = "content-box" === i.style.backgroundClip, oe(function() {
			var n, r, o = "padding:0;margin:0;border:0;display:block;-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box",
				s = X.getElementsByTagName("body")[0];
			s && (n = X.createElement("div"), n.style.cssText = "border:0;width:0;height:0;position:absolute;top:0;left:-9999px;margin-top:1px", s.appendChild(n).appendChild(i), i.innerHTML = "", i.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:1px;border:1px;display:block;width:4px;margin-top:1%;position:absolute;top:1%", oe.swap(s, null != s.style.zoom ? {
				zoom: 1
			} : {}, function() {
				t.boxSizing = 4 === i.offsetWidth
			}), e.getComputedStyle && (t.pixelPosition = "1%" !== (e.getComputedStyle(i, null) || {}).top, t.boxSizingReliable = "4px" === (e.getComputedStyle(i, null) || {
				width: "4px"
			}).width, r = i.appendChild(X.createElement("div")), r.style.cssText = i.style.cssText = o, r.style.marginRight = r.style.width = "0", i.style.width = "1px", t.reliableMarginRight = !parseFloat((e.getComputedStyle(r, null) || {}).marginRight)), s.removeChild(n))
		}), t) : t
	}({});
	var ge, me, ye = /(?:\{[\s\S]*\}|\[[\s\S]*\])$/,
		ve = /([A-Z])/g;
	i.uid = 1, i.accepts = function(e) {
		return e.nodeType ? 1 === e.nodeType || 9 === e.nodeType : !0
	}, i.prototype = {
		key: function(e) {
			if (!i.accepts(e)) return 0;
			var t = {},
				n = e[this.expando];
			if (!n) {
				n = i.uid++;
				try {
					t[this.expando] = {
						value: n
					}, Object.defineProperties(e, t)
				} catch (r) {
					t[this.expando] = n, oe.extend(e, t)
				}
			}
			return this.cache[n] || (this.cache[n] = {}), n
		},
		set: function(e, t, n) {
			var r, i = this.key(e),
				o = this.cache[i];
			if ("string" == typeof t) o[t] = n;
			else if (oe.isEmptyObject(o)) this.cache[i] = t;
			else
				for (r in t) o[r] = t[r]
		},
		get: function(e, n) {
			var r = this.cache[this.key(e)];
			return n === t ? r : r[n]
		},
		access: function(e, n, r) {
			return n === t || n && "string" == typeof n && r === t ? this.get(e, n) : (this.set(e, n, r), r !== t ? r : n)
		},
		remove: function(e, n) {
			var r, i, o = this.key(e),
				s = this.cache[o];
			if (n === t) this.cache[o] = {};
			else {
				oe.isArray(n) ? i = n.concat(n.map(oe.camelCase)) : n in s ? i = [n] : (i = oe.camelCase(n), i = i in s ? [i] : i.match(ae) || []), r = i.length;
				for (; r--;) delete s[i[r]]
			}
		},
		hasData: function(e) {
			return !oe.isEmptyObject(this.cache[e[this.expando]] || {})
		},
		discard: function(e) {
			delete this.cache[this.key(e)]
		}
	}, ge = new i, me = new i, oe.extend({
		acceptData: i.accepts,
		hasData: function(e) {
			return ge.hasData(e) || me.hasData(e)
		},
		data: function(e, t, n) {
			return ge.access(e, t, n)
		},
		removeData: function(e, t) {
			ge.remove(e, t)
		},
		_data: function(e, t, n) {
			return me.access(e, t, n)
		},
		_removeData: function(e, t) {
			me.remove(e, t)
		}
	}), oe.fn.extend({
		data: function(e, n) {
			var r, i, s = this[0],
				a = 0,
				u = null;
			if (e === t) {
				if (this.length && (u = ge.get(s), 1 === s.nodeType && !me.get(s, "hasDataAttrs"))) {
					for (r = s.attributes; a < r.length; a++) i = r[a].name, 0 === i.indexOf("data-") && (i = oe.camelCase(i.substring(5)), o(s, i, u[i]));
					me.set(s, "hasDataAttrs", !0)
				}
				return u
			}
			return "object" == typeof e ? this.each(function() {
				ge.set(this, e)
			}) : oe.access(this, function(n) {
				var r, i = oe.camelCase(e);
				if (s && n === t) {
					if (r = ge.get(s, e), r !== t) return r;
					if (r = ge.get(s, i), r !== t) return r;
					if (r = o(s, i, t), r !== t) return r
				} else this.each(function() {
					var r = ge.get(this, i);
					ge.set(this, i, n), -1 !== e.indexOf("-") && r !== t && ge.set(this, e, n)
				})
			}, null, n, arguments.length > 1, null, !0)
		},
		removeData: function(e) {
			return this.each(function() {
				ge.remove(this, e)
			})
		}
	}), oe.extend({
		queue: function(e, t, n) {
			var r;
			return e ? (t = (t || "fx") + "queue", r = me.get(e, t), n && (!r || oe.isArray(n) ? r = me.access(e, t, oe.makeArray(n)) : r.push(n)), r || []) : void 0
		},
		dequeue: function(e, t) {
			t = t || "fx";
			var n = oe.queue(e, t),
				r = n.length,
				i = n.shift(),
				o = oe._queueHooks(e, t),
				s = function() {
					oe.dequeue(e, t)
				};
			"inprogress" === i && (i = n.shift(), r--), o.cur = i, i && ("fx" === t && n.unshift("inprogress"), delete o.stop, i.call(e, s, o)), !r && o && o.empty.fire()
		},
		_queueHooks: function(e, t) {
			var n = t + "queueHooks";
			return me.get(e, n) || me.access(e, n, {
				empty: oe.Callbacks("once memory").add(function() {
					me.remove(e, [t + "queue", n])
				})
			})
		}
	}), oe.fn.extend({
		queue: function(e, n) {
			var r = 2;
			return "string" != typeof e && (n = e, e = "fx", r--), arguments.length < r ? oe.queue(this[0], e) : n === t ? this : this.each(function() {
				var t = oe.queue(this, e, n);
				oe._queueHooks(this, e), "fx" === e && "inprogress" !== t[0] && oe.dequeue(this, e)
			})
		},
		dequeue: function(e) {
			return this.each(function() {
				oe.dequeue(this, e)
			})
		},
		delay: function(e, t) {
			return e = oe.fx ? oe.fx.speeds[e] || e : e, t = t || "fx", this.queue(t, function(t, n) {
				var r = setTimeout(t, e);
				n.stop = function() {
					clearTimeout(r)
				}
			})
		},
		clearQueue: function(e) {
			return this.queue(e || "fx", [])
		},
		promise: function(e, n) {
			var r, i = 1,
				o = oe.Deferred(),
				s = this,
				a = this.length,
				u = function() {
					--i || o.resolveWith(s, [s])
				};
			for ("string" != typeof e && (n = e, e = t), e = e || "fx"; a--;) r = me.get(s[a], e + "queueHooks"), r && r.empty && (i++, r.empty.add(u));
			return u(), o.promise(n)
		}
	});
	var xe, be, we = /[\t\r\n]/g,
		Te = /\r/g,
		Ce = /^(?:input|select|textarea|button)$/i;
	oe.fn.extend({
		attr: function(e, t) {
			return oe.access(this, oe.attr, e, t, arguments.length > 1)
		},
		removeAttr: function(e) {
			return this.each(function() {
				oe.removeAttr(this, e)
			})
		},
		prop: function(e, t) {
			return oe.access(this, oe.prop, e, t, arguments.length > 1)
		},
		removeProp: function(e) {
			return this.each(function() {
				delete this[oe.propFix[e] || e]
			})
		},
		addClass: function(e) {
			var t, n, r, i, o, s = 0,
				a = this.length,
				u = "string" == typeof e && e;
			if (oe.isFunction(e)) return this.each(function(t) {
				oe(this).addClass(e.call(this, t, this.className))
			});
			if (u)
				for (t = (e || "").match(ae) || []; a > s; s++)
					if (n = this[s], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(we, " ") : " ")) {
						for (o = 0; i = t[o++];) r.indexOf(" " + i + " ") < 0 && (r += i + " ");
						n.className = oe.trim(r)
					}
			return this
		},
		removeClass: function(e) {
			var t, n, r, i, o, s = 0,
				a = this.length,
				u = 0 === arguments.length || "string" == typeof e && e;
			if (oe.isFunction(e)) return this.each(function(t) {
				oe(this).removeClass(e.call(this, t, this.className))
			});
			if (u)
				for (t = (e || "").match(ae) || []; a > s; s++)
					if (n = this[s], r = 1 === n.nodeType && (n.className ? (" " + n.className + " ").replace(we, " ") : "")) {
						for (o = 0; i = t[o++];)
							for (; r.indexOf(" " + i + " ") >= 0;) r = r.replace(" " + i + " ", " ");
						n.className = e ? oe.trim(r) : ""
					}
			return this
		},
		toggleClass: function(e, t) {
			var n = typeof e,
				r = "boolean" == typeof t;
			return oe.isFunction(e) ? this.each(function(n) {
				oe(this).toggleClass(e.call(this, n, this.className, t), t)
			}) : this.each(function() {
				if ("string" === n)
					for (var i, o = 0, s = oe(this), a = t, u = e.match(ae) || []; i = u[o++];) a = r ? a : !s.hasClass(i), s[a ? "addClass" : "removeClass"](i);
				else(n === z || "boolean" === n) && (this.className && me.set(this, "__className__", this.className), this.className = this.className || e === !1 ? "" : me.get(this, "__className__") || "")
			})
		},
		hasClass: function(e) {
			for (var t = " " + e + " ", n = 0, r = this.length; r > n; n++)
				if (1 === this[n].nodeType && (" " + this[n].className + " ").replace(we, " ").indexOf(t) >= 0) return !0;
			return !1
		},
		val: function(e) {
			var n, r, i, o = this[0]; {
				if (arguments.length) return i = oe.isFunction(e), this.each(function(r) {
					var o, s = oe(this);
					1 === this.nodeType && (o = i ? e.call(this, r, s.val()) : e, null == o ? o = "" : "number" == typeof o ? o += "" : oe.isArray(o) && (o = oe.map(o, function(e) {
						return null == e ? "" : e + ""
					})), n = oe.valHooks[this.type] || oe.valHooks[this.nodeName.toLowerCase()], n && "set" in n && n.set(this, o, "value") !== t || (this.value = o))
				});
				if (o) return n = oe.valHooks[o.type] || oe.valHooks[o.nodeName.toLowerCase()], n && "get" in n && (r = n.get(o, "value")) !== t ? r : (r = o.value, "string" == typeof r ? r.replace(Te, "") : null == r ? "" : r)
			}
		}
	}), oe.extend({
		valHooks: {
			option: {
				get: function(e) {
					var t = e.attributes.value;
					return !t || t.specified ? e.value : e.text
				}
			},
			select: {
				get: function(e) {
					for (var t, n, r = e.options, i = e.selectedIndex, o = "select-one" === e.type || 0 > i, s = o ? null : [], a = o ? i + 1 : r.length, u = 0 > i ? a : o ? i : 0; a > u; u++)
						if (n = r[u], (n.selected || u === i) && (oe.support.optDisabled ? !n.disabled : null === n.getAttribute("disabled")) && (!n.parentNode.disabled || !oe.nodeName(n.parentNode, "optgroup"))) {
							if (t = oe(n).val(), o) return t;
							s.push(t)
						}
					return s
				},
				set: function(e, t) {
					for (var n, r, i = e.options, o = oe.makeArray(t), s = i.length; s--;) r = i[s], (r.selected = oe.inArray(oe(r).val(), o) >= 0) && (n = !0);
					return n || (e.selectedIndex = -1), o
				}
			}
		},
		attr: function(e, n, r) {
			var i, o, s = e.nodeType;
			if (e && 3 !== s && 8 !== s && 2 !== s) return typeof e.getAttribute === z ? oe.prop(e, n, r) : (1 === s && oe.isXMLDoc(e) || (n = n.toLowerCase(), i = oe.attrHooks[n] || (oe.expr.match["boolean"].test(n) ? be : xe)), r === t ? i && "get" in i && null !== (o = i.get(e, n)) ? o : (o = oe.find.attr(e, n), null == o ? t : o) : null !== r ? i && "set" in i && (o = i.set(e, r, n)) !== t ? o : (e.setAttribute(n, r + ""), r) : void oe.removeAttr(e, n))
		},
		removeAttr: function(e, t) {
			var n, r, i = 0,
				o = t && t.match(ae);
			if (o && 1 === e.nodeType)
				for (; n = o[i++];) r = oe.propFix[n] || n, oe.expr.match["boolean"].test(n) && (e[r] = !1), e.removeAttribute(n)
		},
		attrHooks: {
			type: {
				set: function(e, t) {
					if (!oe.support.radioValue && "radio" === t && oe.nodeName(e, "input")) {
						var n = e.value;
						return e.setAttribute("type", t), n && (e.value = n), t
					}
				}
			}
		},
		propFix: {
			"for": "htmlFor",
			"class": "className"
		},
		prop: function(e, n, r) {
			var i, o, s, a = e.nodeType;
			if (e && 3 !== a && 8 !== a && 2 !== a) return s = 1 !== a || !oe.isXMLDoc(e), s && (n = oe.propFix[n] || n, o = oe.propHooks[n]), r !== t ? o && "set" in o && (i = o.set(e, r, n)) !== t ? i : e[n] = r : o && "get" in o && null !== (i = o.get(e, n)) ? i : e[n]
		},
		propHooks: {
			tabIndex: {
				get: function(e) {
					return e.hasAttribute("tabindex") || Ce.test(e.nodeName) || e.href ? e.tabIndex : -1
				}
			}
		}
	}), be = {
		set: function(e, t, n) {
			return t === !1 ? oe.removeAttr(e, n) : e.setAttribute(n, n), n
		}
	}, oe.each(oe.expr.match["boolean"].source.match(/\w+/g), function(e, n) {
		var r = oe.expr.attrHandle[n] || oe.find.attr;
		oe.expr.attrHandle[n] = function(e, n, i) {
			var o = oe.expr.attrHandle[n],
				s = i ? t : (oe.expr.attrHandle[n] = t) != r(e, n, i) ? n.toLowerCase() : null;
			return oe.expr.attrHandle[n] = o, s
		}
	}), oe.support.optSelected || (oe.propHooks.selected = {
		get: function(e) {
			var t = e.parentNode;
			return t && t.parentNode && t.parentNode.selectedIndex, null
		}
	}), oe.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
		oe.propFix[this.toLowerCase()] = this
	}), oe.each(["radio", "checkbox"], function() {
		oe.valHooks[this] = {
			set: function(e, t) {
				return oe.isArray(t) ? e.checked = oe.inArray(oe(e).val(), t) >= 0 : void 0
			}
		}, oe.support.checkOn || (oe.valHooks[this].get = function(e) {
			return null === e.getAttribute("value") ? "on" : e.value
		})
	});
	var Ne = /^key/,
		ke = /^(?:mouse|contextmenu)|click/,
		Ee = /^(?:focusinfocus|focusoutblur)$/,
		Se = /^([^.]*)(?:\.(.+)|)$/;
	oe.event = {
		global: {},
		add: function(e, n, r, i, o) {
			var s, a, u, l, c, f, p, d, h, g, m, y = me.get(e);
			if (y) {
				for (r.handler && (s = r, r = s.handler, o = s.selector), r.guid || (r.guid = oe.guid++), (l = y.events) || (l = y.events = {}), (a = y.handle) || (a = y.handle = function(e) {
						return typeof oe === z || e && oe.event.triggered === e.type ? t : oe.event.dispatch.apply(a.elem, arguments)
					}, a.elem = e), n = (n || "").match(ae) || [""], c = n.length; c--;) u = Se.exec(n[c]) || [], h = m = u[1], g = (u[2] || "").split(".").sort(), h && (p = oe.event.special[h] || {}, h = (o ? p.delegateType : p.bindType) || h, p = oe.event.special[h] || {}, f = oe.extend({
					type: h,
					origType: m,
					data: i,
					handler: r,
					guid: r.guid,
					selector: o,
					needsContext: o && oe.expr.match.needsContext.test(o),
					namespace: g.join(".")
				}, s), (d = l[h]) || (d = l[h] = [], d.delegateCount = 0, p.setup && p.setup.call(e, i, g, a) !== !1 || e.addEventListener && e.addEventListener(h, a, !1)), p.add && (p.add.call(e, f), f.handler.guid || (f.handler.guid = r.guid)), o ? d.splice(d.delegateCount++, 0, f) : d.push(f), oe.event.global[h] = !0);
				e = null
			}
		},
		remove: function(e, t, n, r, i) {
			var o, s, a, u, l, c, f, p, d, h, g, m = me.hasData(e) && me.get(e);
			if (m && (u = m.events)) {
				for (t = (t || "").match(ae) || [""], l = t.length; l--;)
					if (a = Se.exec(t[l]) || [], d = g = a[1], h = (a[2] || "").split(".").sort(), d) {
						for (f = oe.event.special[d] || {}, d = (r ? f.delegateType : f.bindType) || d, p = u[d] || [], a = a[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), s = o = p.length; o--;) c = p[o], !i && g !== c.origType || n && n.guid !== c.guid || a && !a.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c.selector) || (p.splice(o, 1), c.selector && p.delegateCount--, f.remove && f.remove.call(e, c));
						s && !p.length && (f.teardown && f.teardown.call(e, h, m.handle) !== !1 || oe.removeEvent(e, d, m.handle), delete u[d])
					} else
						for (d in u) oe.event.remove(e, d + t[l], n, r, !0);
				oe.isEmptyObject(u) && (delete m.handle, me.remove(e, "events"))
			}
		},
		trigger: function(n, r, i, o) {
			var s, a, u, l, c, f, p, d = [i || X],
				h = re.call(n, "type") ? n.type : n,
				g = re.call(n, "namespace") ? n.namespace.split(".") : [];
			if (a = u = i = i || X, 3 !== i.nodeType && 8 !== i.nodeType && !Ee.test(h + oe.event.triggered) && (h.indexOf(".") >= 0 && (g = h.split("."), h = g.shift(), g.sort()), c = h.indexOf(":") < 0 && "on" + h, n = n[oe.expando] ? n : new oe.Event(h, "object" == typeof n && n), n.isTrigger = o ? 2 : 3, n.namespace = g.join("."), n.namespace_re = n.namespace ? new RegExp("(^|\\.)" + g.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, n.result = t, n.target || (n.target = i), r = null == r ? [n] : oe.makeArray(r, [n]), p = oe.event.special[h] || {}, o || !p.trigger || p.trigger.apply(i, r) !== !1)) {
				if (!o && !p.noBubble && !oe.isWindow(i)) {
					for (l = p.delegateType || h, Ee.test(l + h) || (a = a.parentNode); a; a = a.parentNode) d.push(a), u = a;
					u === (i.ownerDocument || X) && d.push(u.defaultView || u.parentWindow || e)
				}
				for (s = 0;
					(a = d[s++]) && !n.isPropagationStopped();) n.type = s > 1 ? l : p.bindType || h, f = (me.get(a, "events") || {})[n.type] && me.get(a, "handle"), f && f.apply(a, r), f = c && a[c], f && oe.acceptData(a) && f.apply && f.apply(a, r) === !1 && n.preventDefault();
				return n.type = h, o || n.isDefaultPrevented() || p._default && p._default.apply(d.pop(), r) !== !1 || !oe.acceptData(i) || c && oe.isFunction(i[h]) && !oe.isWindow(i) && (u = i[c], u && (i[c] = null), oe.event.triggered = h, i[h](), oe.event.triggered = t, u && (i[c] = u)), n.result
			}
		},
		dispatch: function(e) {
			e = oe.event.fix(e);
			var n, r, i, o, s, a = [],
				u = ee.call(arguments),
				l = (me.get(this, "events") || {})[e.type] || [],
				c = oe.event.special[e.type] || {};
			if (u[0] = e, e.delegateTarget = this, !c.preDispatch || c.preDispatch.call(this, e) !== !1) {
				for (a = oe.event.handlers.call(this, e, l), n = 0;
					(o = a[n++]) && !e.isPropagationStopped();)
					for (e.currentTarget = o.elem, r = 0;
						(s = o.handlers[r++]) && !e.isImmediatePropagationStopped();)(!e.namespace_re || e.namespace_re.test(s.namespace)) && (e.handleObj = s, e.data = s.data, i = ((oe.event.special[s.origType] || {}).handle || s.handler).apply(o.elem, u), i !== t && (e.result = i) === !1 && (e.preventDefault(), e.stopPropagation()));
				return c.postDispatch && c.postDispatch.call(this, e), e.result
			}
		},
		handlers: function(e, n) {
			var r, i, o, s, a = [],
				u = n.delegateCount,
				l = e.target;
			if (u && l.nodeType && (!e.button || "click" !== e.type))
				for (; l !== this; l = l.parentNode || this)
					if (l.disabled !== !0 || "click" !== e.type) {
						for (i = [], r = 0; u > r; r++) s = n[r], o = s.selector + " ", i[o] === t && (i[o] = s.needsContext ? oe(o, this).index(l) >= 0 : oe.find(o, this, null, [l]).length), i[o] && i.push(s);
						i.length && a.push({
							elem: l,
							handlers: i
						})
					}
			return u < n.length && a.push({
				elem: this,
				handlers: n.slice(u)
			}), a
		},
		props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
		fixHooks: {},
		keyHooks: {
			props: "char charCode key keyCode".split(" "),
			filter: function(e, t) {
				return null == e.which && (e.which = null != t.charCode ? t.charCode : t.keyCode), e
			}
		},
		mouseHooks: {
			props: "button buttons clientX clientY offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
			filter: function(e, n) {
				var r, i, o, s = n.button;
				return null == e.pageX && null != n.clientX && (r = e.target.ownerDocument || X, i = r.documentElement, o = r.body, e.pageX = n.clientX + (i && i.scrollLeft || o && o.scrollLeft || 0) - (i && i.clientLeft || o && o.clientLeft || 0), e.pageY = n.clientY + (i && i.scrollTop || o && o.scrollTop || 0) - (i && i.clientTop || o && o.clientTop || 0)), e.which || s === t || (e.which = 1 & s ? 1 : 2 & s ? 3 : 4 & s ? 2 : 0), e
			}
		},
		fix: function(e) {
			if (e[oe.expando]) return e;
			var t, n, r, i = e.type,
				o = e,
				s = this.fixHooks[i];
			for (s || (this.fixHooks[i] = s = ke.test(i) ? this.mouseHooks : Ne.test(i) ? this.keyHooks : {}), r = s.props ? this.props.concat(s.props) : this.props, e = new oe.Event(o), t = r.length; t--;) n = r[t], e[n] = o[n];
			return 3 === e.target.nodeType && (e.target = e.target.parentNode), s.filter ? s.filter(e, o) : e
		},
		special: {
			load: {
				noBubble: !0
			},
			focus: {
				trigger: function() {
					return this !== u() && this.focus ? (this.focus(), !1) : void 0
				},
				delegateType: "focusin"
			},
			blur: {
				trigger: function() {
					return this === u() && this.blur ? (this.blur(), !1) : void 0
				},
				delegateType: "focusout"
			},
			click: {
				trigger: function() {
					return "checkbox" === this.type && this.click && oe.nodeName(this, "input") ? (this.click(), !1) : void 0
				},
				_default: function(e) {
					return oe.nodeName(e.target, "a")
				}
			},
			beforeunload: {
				postDispatch: function(e) {
					e.result !== t && (e.originalEvent.returnValue = e.result)
				}
			}
		},
		simulate: function(e, t, n, r) {
			var i = oe.extend(new oe.Event, n, {
				type: e,
				isSimulated: !0,
				originalEvent: {}
			});
			r ? oe.event.trigger(i, null, t) : oe.event.dispatch.call(t, i), i.isDefaultPrevented() && n.preventDefault()
		}
	}, oe.removeEvent = function(e, t, n) {
		e.removeEventListener && e.removeEventListener(t, n, !1)
	}, oe.Event = function(e, t) {
		return this instanceof oe.Event ? (e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || e.getPreventDefault && e.getPreventDefault() ? s : a) : this.type = e, t && oe.extend(this, t), this.timeStamp = e && e.timeStamp || oe.now(), void(this[oe.expando] = !0)) : new oe.Event(e, t)
	}, oe.Event.prototype = {
		isDefaultPrevented: a,
		isPropagationStopped: a,
		isImmediatePropagationStopped: a,
		preventDefault: function() {
			var e = this.originalEvent;
			this.isDefaultPrevented = s, e && e.preventDefault && e.preventDefault()
		},
		stopPropagation: function() {
			var e = this.originalEvent;
			this.isPropagationStopped = s, e && e.stopPropagation && e.stopPropagation()
		},
		stopImmediatePropagation: function() {
			this.isImmediatePropagationStopped = s, this.stopPropagation()
		}
	}, oe.each({
		mouseenter: "mouseover",
		mouseleave: "mouseout"
	}, function(e, t) {
		oe.event.special[e] = {
			delegateType: t,
			bindType: t,
			handle: function(e) {
				var n, r = this,
					i = e.relatedTarget,
					o = e.handleObj;
				return (!i || i !== r && !oe.contains(r, i)) && (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n
			}
		}
	}), oe.support.focusinBubbles || oe.each({
		focus: "focusin",
		blur: "focusout"
	}, function(e, t) {
		var n = 0,
			r = function(e) {
				oe.event.simulate(t, e.target, oe.event.fix(e), !0)
			};
		oe.event.special[t] = {
			setup: function() {
				0 === n++ && X.addEventListener(e, r, !0)
			},
			teardown: function() {
				0 === --n && X.removeEventListener(e, r, !0)
			}
		}
	}), oe.fn.extend({
		on: function(e, n, r, i, o) {
			var s, u;
			if ("object" == typeof e) {
				"string" != typeof n && (r = r || n, n = t);
				for (u in e) this.on(u, n, r, e[u], o);
				return this
			}
			if (null == r && null == i ? (i = n, r = n = t) : null == i && ("string" == typeof n ? (i = r, r = t) : (i = r, r = n, n = t)), i === !1) i = a;
			else if (!i) return this;
			return 1 === o && (s = i, i = function(e) {
				return oe().off(e), s.apply(this, arguments)
			}, i.guid = s.guid || (s.guid = oe.guid++)), this.each(function() {
				oe.event.add(this, e, i, r, n)
			})
		},
		one: function(e, t, n, r) {
			return this.on(e, t, n, r, 1)
		},
		off: function(e, n, r) {
			var i, o;
			if (e && e.preventDefault && e.handleObj) return i = e.handleObj, oe(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
			if ("object" == typeof e) {
				for (o in e) this.off(o, n, e[o]);
				return this
			}
			return (n === !1 || "function" == typeof n) && (r = n, n = t), r === !1 && (r = a), this.each(function() {
				oe.event.remove(this, e, r, n)
			})
		},
		trigger: function(e, t) {
			return this.each(function() {
				oe.event.trigger(e, t, this)
			})
		},
		triggerHandler: function(e, t) {
			var n = this[0];
			return n ? oe.event.trigger(e, t, n, !0) : void 0
		}
	});
	var je = /^.[^:#\[\.,]*$/,
		De = oe.expr.match.needsContext,
		Ae = {
			children: !0,
			contents: !0,
			next: !0,
			prev: !0
		};
	oe.fn.extend({
		find: function(e) {
			var t, n, r, i = this.length;
			if ("string" != typeof e) return t = this, this.pushStack(oe(e).filter(function() {
				for (r = 0; i > r; r++)
					if (oe.contains(t[r], this)) return !0
			}));
			for (n = [], r = 0; i > r; r++) oe.find(e, this[r], n);
			return n = this.pushStack(i > 1 ? oe.unique(n) : n), n.selector = (this.selector ? this.selector + " " : "") + e, n
		},
		has: function(e) {
			var t = oe(e, this),
				n = t.length;
			return this.filter(function() {
				for (var e = 0; n > e; e++)
					if (oe.contains(this, t[e])) return !0
			})
		},
		not: function(e) {
			return this.pushStack(c(this, e || [], !0))
		},
		filter: function(e) {
			return this.pushStack(c(this, e || [], !1))
		},
		is: function(e) {
			return !!e && ("string" == typeof e ? De.test(e) ? oe(e, this.context).index(this[0]) >= 0 : oe.filter(e, this).length > 0 : this.filter(e).length > 0)
		},
		closest: function(e, t) {
			for (var n, r = 0, i = this.length, o = [], s = De.test(e) || "string" != typeof e ? oe(e, t || this.context) : 0; i > r; r++)
				for (n = this[r]; n && n !== t; n = n.parentNode)
					if (n.nodeType < 11 && (s ? s.index(n) > -1 : 1 === n.nodeType && oe.find.matchesSelector(n, e))) {
						n = o.push(n);
						break
					}
			return this.pushStack(o.length > 1 ? oe.unique(o) : o)
		},
		index: function(e) {
			return e ? "string" == typeof e ? te.call(oe(e), this[0]) : te.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
		},
		add: function(e, t) {
			var n = "string" == typeof e ? oe(e, t) : oe.makeArray(e && e.nodeType ? [e] : e),
				r = oe.merge(this.get(), n);
			return this.pushStack(oe.unique(r))
		},
		addBack: function(e) {
			return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
		}
	}), oe.each({
		parent: function(e) {
			var t = e.parentNode;
			return t && 11 !== t.nodeType ? t : null
		},
		parents: function(e) {
			return oe.dir(e, "parentNode")
		},
		parentsUntil: function(e, t, n) {
			return oe.dir(e, "parentNode", n)
		},
		next: function(e) {
			return l(e, "nextSibling")
		},
		prev: function(e) {
			return l(e, "previousSibling")
		},
		nextAll: function(e) {
			return oe.dir(e, "nextSibling")
		},
		prevAll: function(e) {
			return oe.dir(e, "previousSibling")
		},
		nextUntil: function(e, t, n) {
			return oe.dir(e, "nextSibling", n)
		},
		prevUntil: function(e, t, n) {
			return oe.dir(e, "previousSibling", n)
		},
		siblings: function(e) {
			return oe.sibling((e.parentNode || {}).firstChild, e)
		},
		children: function(e) {
			return oe.sibling(e.firstChild)
		},
		contents: function(e) {
			return oe.nodeName(e, "iframe") ? e.contentDocument || e.contentWindow.document : oe.merge([], e.childNodes)
		}
	}, function(e, t) {
		oe.fn[e] = function(n, r) {
			var i = oe.map(this, t, n);
			return "Until" !== e.slice(-5) && (r = n), r && "string" == typeof r && (i = oe.filter(r, i)), this.length > 1 && (Ae[e] || oe.unique(i), "p" === e[0] && i.reverse()), this.pushStack(i)
		}
	}), oe.extend({
		filter: function(e, t, n) {
			var r = t[0];
			return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? oe.find.matchesSelector(r, e) ? [r] : [] : oe.find.matches(e, oe.grep(t, function(e) {
				return 1 === e.nodeType
			}))
		},
		dir: function(e, n, r) {
			for (var i = [], o = r !== t;
				(e = e[n]) && 9 !== e.nodeType;)
				if (1 === e.nodeType) {
					if (o && oe(e).is(r)) break;
					i.push(e)
				}
			return i
		},
		sibling: function(e, t) {
			for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
			return n
		}
	});
	var Le = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
		qe = /<([\w:]+)/,
		He = /<|&#?\w+;/,
		Oe = /<(?:script|style|link)/i,
		Fe = /^(?:checkbox|radio)$/i,
		Pe = /checked\s*(?:[^=]|=\s*.checked.)/i,
		Re = /^$|\/(?:java|ecma)script/i,
		Me = /^true\/(.*)/,
		We = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
		$e = {
			option: [1, "<select multiple='multiple'>", "</select>"],
			thead: [1, "<table>", "</table>"],
			tr: [2, "<table><tbody>", "</tbody></table>"],
			td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
			_default: [0, "", ""]
		};
	$e.optgroup = $e.option, $e.tbody = $e.tfoot = $e.colgroup = $e.caption = $e.col = $e.thead, $e.th = $e.td, oe.fn.extend({
		text: function(e) {
			return oe.access(this, function(e) {
				return e === t ? oe.text(this) : this.empty().append((this[0] && this[0].ownerDocument || X).createTextNode(e))
			}, null, e, arguments.length)
		},
		append: function() {
			return this.domManip(arguments, function(e) {
				if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
					var t = f(this, e);
					t.appendChild(e)
				}
			})
		},
		prepend: function() {
			return this.domManip(arguments, function(e) {
				if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
					var t = f(this, e);
					t.insertBefore(e, t.firstChild)
				}
			})
		},
		before: function() {
			return this.domManip(arguments, function(e) {
				this.parentNode && this.parentNode.insertBefore(e, this)
			})
		},
		after: function() {
			return this.domManip(arguments, function(e) {
				this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
			})
		},
		remove: function(e, t) {
			for (var n, r = e ? oe.filter(e, this) : this, i = 0; null != (n = r[i]); i++) t || 1 !== n.nodeType || oe.cleanData(m(n)), n.parentNode && (t && oe.contains(n.ownerDocument, n) && h(m(n, "script")), n.parentNode.removeChild(n));
			return this
		},
		empty: function() {
			for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (oe.cleanData(m(e, !1)), e.textContent = "");
			return this
		},
		clone: function(e, t) {
			return e = null == e ? !1 : e, t = null == t ? e : t, this.map(function() {
				return oe.clone(this, e, t)
			})
		},
		html: function(e) {
			return oe.access(this, function(e) {
				var n = this[0] || {},
					r = 0,
					i = this.length;
				if (e === t && 1 === n.nodeType) return n.innerHTML;
				if ("string" == typeof e && !Oe.test(e) && !$e[(qe.exec(e) || ["", ""])[1].toLowerCase()]) {
					e = e.replace(Le, "<$1></$2>");
					try {
						for (; i > r; r++) n = this[r] || {}, 1 === n.nodeType && (oe.cleanData(m(n, !1)), n.innerHTML = e);
						n = 0
					} catch (o) {}
				}
				n && this.empty().append(e)
			}, null, e, arguments.length)
		},
		replaceWith: function() {
			var e = oe.map(this, function(e) {
					return [e.nextSibling, e.parentNode]
				}),
				t = 0;
			return this.domManip(arguments, function(n) {
				var r = e[t++],
					i = e[t++];
				i && (oe(this).remove(), i.insertBefore(n, r))
			}, !0), t ? this : this.remove()
		},
		detach: function(e) {
			return this.remove(e, !0)
		},
		domManip: function(e, t, n) {
			e = K.apply([], e);
			var r, i, o, s, a, u, l = 0,
				c = this.length,
				f = this,
				h = c - 1,
				g = e[0],
				y = oe.isFunction(g);
			if (y || !(1 >= c || "string" != typeof g || oe.support.checkClone) && Pe.test(g)) return this.each(function(r) {
				var i = f.eq(r);
				y && (e[0] = g.call(this, r, i.html())), i.domManip(e, t, n)
			});
			if (c && (r = oe.buildFragment(e, this[0].ownerDocument, !1, !n && this), i = r.firstChild, 1 === r.childNodes.length && (r = i), i)) {
				for (o = oe.map(m(r, "script"), p), s = o.length; c > l; l++) a = r, l !== h && (a = oe.clone(a, !0, !0), s && oe.merge(o, m(a, "script"))), t.call(this[l], a, l);
				if (s)
					for (u = o[o.length - 1].ownerDocument, oe.map(o, d), l = 0; s > l; l++) a = o[l], Re.test(a.type || "") && !me.access(a, "globalEval") && oe.contains(u, a) && (a.src ? oe._evalUrl(a.src) : oe.globalEval(a.textContent.replace(We, "")))
			}
			return this
		}
	}), oe.each({
		appendTo: "append",
		prependTo: "prepend",
		insertBefore: "before",
		insertAfter: "after",
		replaceAll: "replaceWith"
	}, function(e, t) {
		oe.fn[e] = function(e) {
			for (var n, r = [], i = oe(e), o = i.length - 1, s = 0; o >= s; s++) n = s === o ? this : this.clone(!0), oe(i[s])[t](n), Z.apply(r, n.get());
			return this.pushStack(r)
		}
	}), oe.extend({
		clone: function(e, t, n) {
			var r, i, o, s, a = e.cloneNode(!0),
				u = oe.contains(e.ownerDocument, e);
			if (!(oe.support.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || oe.isXMLDoc(e)))
				for (s = m(a), o = m(e), r = 0, i = o.length; i > r; r++) y(o[r], s[r]);
			if (t)
				if (n)
					for (o = o || m(e), s = s || m(a), r = 0, i = o.length; i > r; r++) g(o[r], s[r]);
				else g(e, a);
			return s = m(a, "script"), s.length > 0 && h(s, !u && m(e, "script")), a
		},
		buildFragment: function(e, t, n, r) {
			for (var i, o, s, a, u, l, c = 0, f = e.length, p = t.createDocumentFragment(), d = []; f > c; c++)
				if (i = e[c], i || 0 === i)
					if ("object" === oe.type(i)) oe.merge(d, i.nodeType ? [i] : i);
					else if (He.test(i)) {
				for (o = o || p.appendChild(t.createElement("div")), s = (qe.exec(i) || ["", ""])[1].toLowerCase(), a = $e[s] || $e._default, o.innerHTML = a[1] + i.replace(Le, "<$1></$2>") + a[2], l = a[0]; l--;) o = o.firstChild;
				oe.merge(d, o.childNodes), o = p.firstChild, o.textContent = ""
			} else d.push(t.createTextNode(i));
			for (p.textContent = "", c = 0; i = d[c++];)
				if ((!r || -1 === oe.inArray(i, r)) && (u = oe.contains(i.ownerDocument, i), o = m(p.appendChild(i), "script"), u && h(o), n))
					for (l = 0; i = o[l++];) Re.test(i.type || "") && n.push(i);
			return p
		},
		cleanData: function(e) {
			for (var t, n, r, i = e.length, o = 0, s = oe.event.special; i > o; o++) {
				if (n = e[o], oe.acceptData(n) && (t = me.access(n)))
					for (r in t.events) s[r] ? oe.event.remove(n, r) : oe.removeEvent(n, r, t.handle);
				ge.discard(n), me.discard(n)
			}
		},
		_evalUrl: function(e) {
			return oe.ajax({
				url: e,
				type: "GET",
				dataType: "text",
				async: !1,
				global: !1,
				success: oe.globalEval
			})
		}
	}), oe.fn.extend({
		wrapAll: function(e) {
			var t;
			return oe.isFunction(e) ? this.each(function(t) {
				oe(this).wrapAll(e.call(this, t))
			}) : (this[0] && (t = oe(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
				for (var e = this; e.firstElementChild;) e = e.firstElementChild;
				return e
			}).append(this)), this)
		},
		wrapInner: function(e) {
			return oe.isFunction(e) ? this.each(function(t) {
				oe(this).wrapInner(e.call(this, t))
			}) : this.each(function() {
				var t = oe(this),
					n = t.contents();
				n.length ? n.wrapAll(e) : t.append(e)
			})
		},
		wrap: function(e) {
			var t = oe.isFunction(e);
			return this.each(function(n) {
				oe(this).wrapAll(t ? e.call(this, n) : e)
			})
		},
		unwrap: function() {
			return this.parent().each(function() {
				oe.nodeName(this, "body") || oe(this).replaceWith(this.childNodes)
			}).end()
		}
	});
	var Be, Ie, ze = /^(none|table(?!-c[ea]).+)/,
		_e = /^margin/,
		Xe = new RegExp("^(" + se + ")(.*)$", "i"),
		Ue = new RegExp("^(" + se + ")(?!px)[a-z%]+$", "i"),
		Ye = new RegExp("^([+-])=(" + se + ")", "i"),
		Ve = {
			BODY: "block"
		},
		Ge = {
			position: "absolute",
			visibility: "hidden",
			display: "block"
		},
		Je = {
			letterSpacing: 0,
			fontWeight: 400
		},
		Qe = ["Top", "Right", "Bottom", "Left"],
		Ke = ["Webkit", "O", "Moz", "ms"];
	oe.fn.extend({
		css: function(e, n) {
			return oe.access(this, function(e, n, r) {
				var i, o, s = {},
					a = 0;
				if (oe.isArray(n)) {
					for (i = b(e), o = n.length; o > a; a++) s[n[a]] = oe.css(e, n[a], !1, i);
					return s
				}
				return r !== t ? oe.style(e, n, r) : oe.css(e, n)
			}, e, n, arguments.length > 1)
		},
		show: function() {
			return w(this, !0)
		},
		hide: function() {
			return w(this)
		},
		toggle: function(e) {
			var t = "boolean" == typeof e;
			return this.each(function() {
				(t ? e : x(this)) ? oe(this).show(): oe(this).hide();
			})
		}
	}), oe.extend({
		cssHooks: {
			opacity: {
				get: function(e, t) {
					if (t) {
						var n = Be(e, "opacity");
						return "" === n ? "1" : n
					}
				}
			}
		},
		cssNumber: {
			columnCount: !0,
			fillOpacity: !0,
			fontWeight: !0,
			lineHeight: !0,
			opacity: !0,
			orphans: !0,
			widows: !0,
			zIndex: !0,
			zoom: !0
		},
		cssProps: {
			"float": "cssFloat"
		},
		style: function(e, n, r, i) {
			if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
				var o, s, a, u = oe.camelCase(n),
					l = e.style;
				return n = oe.cssProps[u] || (oe.cssProps[u] = v(l, u)), a = oe.cssHooks[n] || oe.cssHooks[u], r === t ? a && "get" in a && (o = a.get(e, !1, i)) !== t ? o : l[n] : (s = typeof r, "string" === s && (o = Ye.exec(r)) && (r = (o[1] + 1) * o[2] + parseFloat(oe.css(e, n)), s = "number"), null == r || "number" === s && isNaN(r) || ("number" !== s || oe.cssNumber[u] || (r += "px"), oe.support.clearCloneStyle || "" !== r || 0 !== n.indexOf("background") || (l[n] = "inherit"), a && "set" in a && (r = a.set(e, r, i)) === t || (l[n] = r)), void 0)
			}
		},
		css: function(e, n, r, i) {
			var o, s, a, u = oe.camelCase(n);
			return n = oe.cssProps[u] || (oe.cssProps[u] = v(e.style, u)), a = oe.cssHooks[n] || oe.cssHooks[u], a && "get" in a && (o = a.get(e, !0, r)), o === t && (o = Be(e, n, i)), "normal" === o && n in Je && (o = Je[n]), "" === r || r ? (s = parseFloat(o), r === !0 || oe.isNumeric(s) ? s || 0 : o) : o
		}
	}), Be = function(e, n, r) {
		var i, o, s, a = r || b(e),
			u = a ? a.getPropertyValue(n) || a[n] : t,
			l = e.style;
		return a && ("" !== u || oe.contains(e.ownerDocument, e) || (u = oe.style(e, n)), Ue.test(u) && _e.test(n) && (i = l.width, o = l.minWidth, s = l.maxWidth, l.minWidth = l.maxWidth = l.width = u, u = a.width, l.width = i, l.minWidth = o, l.maxWidth = s)), u
	}, oe.each(["height", "width"], function(e, t) {
		oe.cssHooks[t] = {
			get: function(e, n, r) {
				return n ? 0 === e.offsetWidth && ze.test(oe.css(e, "display")) ? oe.swap(e, Ge, function() {
					return N(e, t, r)
				}) : N(e, t, r) : void 0
			},
			set: function(e, n, r) {
				var i = r && b(e);
				return T(e, n, r ? C(e, t, r, oe.support.boxSizing && "border-box" === oe.css(e, "boxSizing", !1, i), i) : 0)
			}
		}
	}), oe(function() {
		oe.support.reliableMarginRight || (oe.cssHooks.marginRight = {
			get: function(e, t) {
				return t ? oe.swap(e, {
					display: "inline-block"
				}, Be, [e, "marginRight"]) : void 0
			}
		}), !oe.support.pixelPosition && oe.fn.position && oe.each(["top", "left"], function(e, t) {
			oe.cssHooks[t] = {
				get: function(e, n) {
					return n ? (n = Be(e, t), Ue.test(n) ? oe(e).position()[t] + "px" : n) : void 0
				}
			}
		})
	}), oe.expr && oe.expr.filters && (oe.expr.filters.hidden = function(e) {
		return e.offsetWidth <= 0 && e.offsetHeight <= 0
	}, oe.expr.filters.visible = function(e) {
		return !oe.expr.filters.hidden(e)
	}), oe.each({
		margin: "",
		padding: "",
		border: "Width"
	}, function(e, t) {
		oe.cssHooks[e + t] = {
			expand: function(n) {
				for (var r = 0, i = {}, o = "string" == typeof n ? n.split(" ") : [n]; 4 > r; r++) i[e + Qe[r] + t] = o[r] || o[r - 2] || o[0];
				return i
			}
		}, _e.test(e) || (oe.cssHooks[e + t].set = T)
	});
	var Ze = /%20/g,
		et = /\[\]$/,
		tt = /\r?\n/g,
		nt = /^(?:submit|button|image|reset|file)$/i,
		rt = /^(?:input|select|textarea|keygen)/i;
	oe.fn.extend({
		serialize: function() {
			return oe.param(this.serializeArray())
		},
		serializeArray: function() {
			return this.map(function() {
				var e = oe.prop(this, "elements");
				return e ? oe.makeArray(e) : this
			}).filter(function() {
				var e = this.type;
				return this.name && !oe(this).is(":disabled") && rt.test(this.nodeName) && !nt.test(e) && (this.checked || !Fe.test(e))
			}).map(function(e, t) {
				var n = oe(this).val();
				return null == n ? null : oe.isArray(n) ? oe.map(n, function(e) {
					return {
						name: t.name,
						value: e.replace(tt, "\r\n")
					}
				}) : {
					name: t.name,
					value: n.replace(tt, "\r\n")
				}
			}).get()
		}
	}), oe.param = function(e, n) {
		var r, i = [],
			o = function(e, t) {
				t = oe.isFunction(t) ? t() : null == t ? "" : t, i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(t)
			};
		if (n === t && (n = oe.ajaxSettings && oe.ajaxSettings.traditional), oe.isArray(e) || e.jquery && !oe.isPlainObject(e)) oe.each(e, function() {
			o(this.name, this.value)
		});
		else
			for (r in e) S(r, e[r], n, o);
		return i.join("&").replace(Ze, "+")
	}, oe.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "), function(e, t) {
		oe.fn[t] = function(e, n) {
			return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
		}
	}), oe.fn.extend({
		hover: function(e, t) {
			return this.mouseenter(e).mouseleave(t || e)
		},
		bind: function(e, t, n) {
			return this.on(e, null, t, n)
		},
		unbind: function(e, t) {
			return this.off(e, null, t)
		},
		delegate: function(e, t, n, r) {
			return this.on(t, e, n, r)
		},
		undelegate: function(e, t, n) {
			return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
		}
	});
	var it, ot, st = oe.now(),
		at = /\?/,
		ut = /#.*$/,
		lt = /([?&])_=[^&]*/,
		ct = /^(.*?):[ \t]*([^\r\n]*)$/gm,
		ft = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
		pt = /^(?:GET|HEAD)$/,
		dt = /^\/\//,
		ht = /^([\w.+-]+:)(?:\/\/([^\/?#:]*)(?::(\d+)|)|)/,
		gt = oe.fn.load,
		mt = {},
		yt = {},
		vt = "*/".concat("*");
	try {
		ot = _.href
	} catch (xt) {
		ot = X.createElement("a"), ot.href = "", ot = ot.href
	}
	it = ht.exec(ot.toLowerCase()) || [], oe.fn.load = function(e, n, r) {
		if ("string" != typeof e && gt) return gt.apply(this, arguments);
		var i, o, s, a = this,
			u = e.indexOf(" ");
		return u >= 0 && (i = e.slice(u), e = e.slice(0, u)), oe.isFunction(n) ? (r = n, n = t) : n && "object" == typeof n && (o = "POST"), a.length > 0 && oe.ajax({
			url: e,
			type: o,
			dataType: "html",
			data: n
		}).done(function(e) {
			s = arguments, a.html(i ? oe("<div>").append(oe.parseHTML(e)).find(i) : e)
		}).complete(r && function(e, t) {
			a.each(r, s || [e.responseText, t, e])
		}), this
	}, oe.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
		oe.fn[t] = function(e) {
			return this.on(t, e)
		}
	}), oe.extend({
		active: 0,
		lastModified: {},
		etag: {},
		ajaxSettings: {
			url: ot,
			type: "GET",
			isLocal: ft.test(it[1]),
			global: !0,
			processData: !0,
			async: !0,
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			accepts: {
				"*": vt,
				text: "text/plain",
				html: "text/html",
				xml: "application/xml, text/xml",
				json: "application/json, text/javascript"
			},
			contents: {
				xml: /xml/,
				html: /html/,
				json: /json/
			},
			responseFields: {
				xml: "responseXML",
				text: "responseText",
				json: "responseJSON"
			},
			converters: {
				"* text": String,
				"text html": !0,
				"text json": oe.parseJSON,
				"text xml": oe.parseXML
			},
			flatOptions: {
				url: !0,
				context: !0
			}
		},
		ajaxSetup: function(e, t) {
			return t ? A(A(e, oe.ajaxSettings), t) : A(oe.ajaxSettings, e)
		},
		ajaxPrefilter: j(mt),
		ajaxTransport: j(yt),
		ajax: function(e, n) {
			function r(e, n, r, a) {
				var l, f, v, x, w, C = n;
				2 !== b && (b = 2, u && clearTimeout(u), i = t, s = a || "", T.readyState = e > 0 ? 4 : 0, l = e >= 200 && 300 > e || 304 === e, r && (x = L(p, T, r)), x = q(p, x, T, l), l ? (p.ifModified && (w = T.getResponseHeader("Last-Modified"), w && (oe.lastModified[o] = w), w = T.getResponseHeader("etag"), w && (oe.etag[o] = w)), 204 === e ? C = "nocontent" : 304 === e ? C = "notmodified" : (C = x.state, f = x.data, v = x.error, l = !v)) : (v = C, (e || !C) && (C = "error", 0 > e && (e = 0))), T.status = e, T.statusText = (n || C) + "", l ? g.resolveWith(d, [f, C, T]) : g.rejectWith(d, [T, C, v]), T.statusCode(y), y = t, c && h.trigger(l ? "ajaxSuccess" : "ajaxError", [T, p, l ? f : v]), m.fireWith(d, [T, C]), c && (h.trigger("ajaxComplete", [T, p]), --oe.active || oe.event.trigger("ajaxStop")))
			}
			"object" == typeof e && (n = e, e = t), n = n || {};
			var i, o, s, a, u, l, c, f, p = oe.ajaxSetup({}, n),
				d = p.context || p,
				h = p.context && (d.nodeType || d.jquery) ? oe(d) : oe.event,
				g = oe.Deferred(),
				m = oe.Callbacks("once memory"),
				y = p.statusCode || {},
				v = {},
				x = {},
				b = 0,
				w = "canceled",
				T = {
					readyState: 0,
					getResponseHeader: function(e) {
						var t;
						if (2 === b) {
							if (!a)
								for (a = {}; t = ct.exec(s);) a[t[1].toLowerCase()] = t[2];
							t = a[e.toLowerCase()]
						}
						return null == t ? null : t
					},
					getAllResponseHeaders: function() {
						return 2 === b ? s : null
					},
					setRequestHeader: function(e, t) {
						var n = e.toLowerCase();
						return b || (e = x[n] = x[n] || e, v[e] = t), this
					},
					overrideMimeType: function(e) {
						return b || (p.mimeType = e), this
					},
					statusCode: function(e) {
						var t;
						if (e)
							if (2 > b)
								for (t in e) y[t] = [y[t], e[t]];
							else T.always(e[T.status]);
						return this
					},
					abort: function(e) {
						var t = e || w;
						return i && i.abort(t), r(0, t), this
					}
				};
			if (g.promise(T).complete = m.add, T.success = T.done, T.error = T.fail, p.url = ((e || p.url || ot) + "").replace(ut, "").replace(dt, it[1] + "//"), p.type = n.method || n.type || p.method || p.type, p.dataTypes = oe.trim(p.dataType || "*").toLowerCase().match(ae) || [""], null == p.crossDomain && (l = ht.exec(p.url.toLowerCase()), p.crossDomain = !(!l || l[1] === it[1] && l[2] === it[2] && (l[3] || ("http:" === l[1] ? "80" : "443")) === (it[3] || ("http:" === it[1] ? "80" : "443")))), p.data && p.processData && "string" != typeof p.data && (p.data = oe.param(p.data, p.traditional)), D(mt, p, n, T), 2 === b) return T;
			c = p.global, c && 0 === oe.active++ && oe.event.trigger("ajaxStart"), p.type = p.type.toUpperCase(), p.hasContent = !pt.test(p.type), o = p.url, p.hasContent || (p.data && (o = p.url += (at.test(o) ? "&" : "?") + p.data, delete p.data), p.cache === !1 && (p.url = lt.test(o) ? o.replace(lt, "$1_=" + st++) : o + (at.test(o) ? "&" : "?") + "_=" + st++)), p.ifModified && (oe.lastModified[o] && T.setRequestHeader("If-Modified-Since", oe.lastModified[o]), oe.etag[o] && T.setRequestHeader("If-None-Match", oe.etag[o])), (p.data && p.hasContent && p.contentType !== !1 || n.contentType) && T.setRequestHeader("Content-Type", p.contentType), T.setRequestHeader("Accept", p.dataTypes[0] && p.accepts[p.dataTypes[0]] ? p.accepts[p.dataTypes[0]] + ("*" !== p.dataTypes[0] ? ", " + vt + "; q=0.01" : "") : p.accepts["*"]);
			for (f in p.headers) T.setRequestHeader(f, p.headers[f]);
			if (p.beforeSend && (p.beforeSend.call(d, T, p) === !1 || 2 === b)) return T.abort();
			w = "abort";
			for (f in {
					success: 1,
					error: 1,
					complete: 1
				}) T[f](p[f]);
			if (i = D(yt, p, n, T)) {
				T.readyState = 1, c && h.trigger("ajaxSend", [T, p]), p.async && p.timeout > 0 && (u = setTimeout(function() {
					T.abort("timeout")
				}, p.timeout));
				try {
					b = 1, i.send(v, r)
				} catch (C) {
					if (!(2 > b)) throw C;
					r(-1, C)
				}
			} else r(-1, "No Transport");
			return T
		},
		getJSON: function(e, t, n) {
			return oe.get(e, t, n, "json")
		},
		getScript: function(e, n) {
			return oe.get(e, t, n, "script")
		}
	}), oe.each(["get", "post"], function(e, n) {
		oe[n] = function(e, r, i, o) {
			return oe.isFunction(r) && (o = o || i, i = r, r = t), oe.ajax({
				url: e,
				type: n,
				dataType: o,
				data: r,
				success: i
			})
		}
	}), oe.ajaxSetup({
		accepts: {
			script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
		},
		contents: {
			script: /(?:java|ecma)script/
		},
		converters: {
			"text script": function(e) {
				return oe.globalEval(e), e
			}
		}
	}), oe.ajaxPrefilter("script", function(e) {
		e.cache === t && (e.cache = !1), e.crossDomain && (e.type = "GET")
	}), oe.ajaxTransport("script", function(e) {
		if (e.crossDomain) {
			var t, n;
			return {
				send: function(r, i) {
					t = oe("<script>").prop({
						async: !0,
						charset: e.scriptCharset,
						src: e.url
					}).on("load error", n = function(e) {
						t.remove(), n = null, e && i("error" === e.type ? 404 : 200, e.type)
					}), X.head.appendChild(t[0])
				},
				abort: function() {
					n && n()
				}
			}
		}
	});
	var bt = [],
		wt = /(=)\?(?=&|$)|\?\?/;
	oe.ajaxSetup({
		jsonp: "callback",
		jsonpCallback: function() {
			var e = bt.pop() || oe.expando + "_" + st++;
			return this[e] = !0, e
		}
	}), oe.ajaxPrefilter("json jsonp", function(n, r, i) {
		var o, s, a, u = n.jsonp !== !1 && (wt.test(n.url) ? "url" : "string" == typeof n.data && !(n.contentType || "").indexOf("application/x-www-form-urlencoded") && wt.test(n.data) && "data");
		return u || "jsonp" === n.dataTypes[0] ? (o = n.jsonpCallback = oe.isFunction(n.jsonpCallback) ? n.jsonpCallback() : n.jsonpCallback, u ? n[u] = n[u].replace(wt, "$1" + o) : n.jsonp !== !1 && (n.url += (at.test(n.url) ? "&" : "?") + n.jsonp + "=" + o), n.converters["script json"] = function() {
			return a || oe.error(o + " was not called"), a[0]
		}, n.dataTypes[0] = "json", s = e[o], e[o] = function() {
			a = arguments
		}, i.always(function() {
			e[o] = s, n[o] && (n.jsonpCallback = r.jsonpCallback, bt.push(o)), a && oe.isFunction(s) && s(a[0]), a = s = t
		}), "script") : void 0
	}), oe.ajaxSettings.xhr = function() {
		try {
			return new XMLHttpRequest
		} catch (e) {}
	};
	var Tt = oe.ajaxSettings.xhr(),
		Ct = {
			0: 200,
			1223: 204
		},
		Nt = 0,
		kt = {};
	e.ActiveXObject && oe(e).on("unload", function() {
		for (var e in kt) kt[e]();
		kt = t
	}), oe.support.cors = !!Tt && "withCredentials" in Tt, oe.support.ajax = Tt = !!Tt, oe.ajaxTransport(function(e) {
		var n;
		return oe.support.cors || Tt && !e.crossDomain ? {
			send: function(r, i) {
				var o, s, a = e.xhr();
				if (a.open(e.type, e.url, e.async, e.username, e.password), e.xhrFields)
					for (o in e.xhrFields) a[o] = e.xhrFields[o];
				e.mimeType && a.overrideMimeType && a.overrideMimeType(e.mimeType), e.crossDomain || r["X-Requested-With"] || (r["X-Requested-With"] = "XMLHttpRequest");
				for (o in r) a.setRequestHeader(o, r[o]);
				n = function(e) {
					return function() {
						n && (console.log(a.responseText), delete kt[s], n = a.onload = a.onerror = null, "abort" === e ? a.abort() : "error" === e ? i(a.status || 404, a.statusText) : i(Ct[a.status] || a.status, a.statusText, "string" == typeof a.responseText ? {
							text: a.responseText
						} : t, a.getAllResponseHeaders()))
					}
				}, a.onload = n(), a.onerror = n("error"), n = kt[s = Nt++] = n("abort"), a.send(e.hasContent && e.data || null)
			},
			abort: function() {
				n && n()
			}
		} : void 0
	});
	var Et, St, jt = /^(?:toggle|show|hide)$/,
		Dt = new RegExp("^(?:([+-])=|)(" + se + ")([a-z%]*)$", "i"),
		At = /queueHooks$/,
		Lt = [R],
		qt = {
			"*": [function(e, t) {
				var n, r, i = this.createTween(e, t),
					o = Dt.exec(t),
					s = i.cur(),
					a = +s || 0,
					u = 1,
					l = 20;
				if (o) {
					if (n = +o[2], r = o[3] || (oe.cssNumber[e] ? "" : "px"), "px" !== r && a) {
						a = oe.css(i.elem, e, !0) || n || 1;
						do u = u || ".5", a /= u, oe.style(i.elem, e, a + r); while (u !== (u = i.cur() / s) && 1 !== u && --l)
					}
					i.unit = r, i.start = a, i.end = o[1] ? a + (o[1] + 1) * n : n
				}
				return i
			}]
		};
	oe.Animation = oe.extend(F, {
		tweener: function(e, t) {
			oe.isFunction(e) ? (t = e, e = ["*"]) : e = e.split(" ");
			for (var n, r = 0, i = e.length; i > r; r++) n = e[r], qt[n] = qt[n] || [], qt[n].unshift(t)
		},
		prefilter: function(e, t) {
			t ? Lt.unshift(e) : Lt.push(e)
		}
	}), oe.Tween = M, M.prototype = {
		constructor: M,
		init: function(e, t, n, r, i, o) {
			this.elem = e, this.prop = n, this.easing = i || "swing", this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = o || (oe.cssNumber[n] ? "" : "px")
		},
		cur: function() {
			var e = M.propHooks[this.prop];
			return e && e.get ? e.get(this) : M.propHooks._default.get(this)
		},
		run: function(e) {
			var t, n = M.propHooks[this.prop];
			return this.options.duration ? this.pos = t = oe.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : M.propHooks._default.set(this), this
		}
	}, M.prototype.init.prototype = M.prototype, M.propHooks = {
		_default: {
			get: function(e) {
				var t;
				return null == e.elem[e.prop] || e.elem.style && null != e.elem.style[e.prop] ? (t = oe.css(e.elem, e.prop, ""), t && "auto" !== t ? t : 0) : e.elem[e.prop]
			},
			set: function(e) {
				oe.fx.step[e.prop] ? oe.fx.step[e.prop](e) : e.elem.style && (null != e.elem.style[oe.cssProps[e.prop]] || oe.cssHooks[e.prop]) ? oe.style(e.elem, e.prop, e.now + e.unit) : e.elem[e.prop] = e.now
			}
		}
	}, M.propHooks.scrollTop = M.propHooks.scrollLeft = {
		set: function(e) {
			e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
		}
	}, oe.each(["toggle", "show", "hide"], function(e, t) {
		var n = oe.fn[t];
		oe.fn[t] = function(e, r, i) {
			return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(W(t, !0), e, r, i)
		}
	}), oe.fn.extend({
		fadeTo: function(e, t, n, r) {
			return this.filter(x).css("opacity", 0).show().end().animate({
				opacity: t
			}, e, n, r)
		},
		animate: function(e, t, n, r) {
			var i = oe.isEmptyObject(e),
				o = oe.speed(t, n, r),
				s = function() {
					var t = F(this, oe.extend({}, e), o);
					s.finish = function() {
						t.stop(!0)
					}, (i || me.get(this, "finish")) && t.stop(!0)
				};
			return s.finish = s, i || o.queue === !1 ? this.each(s) : this.queue(o.queue, s)
		},
		stop: function(e, n, r) {
			var i = function(e) {
				var t = e.stop;
				delete e.stop, t(r)
			};
			return "string" != typeof e && (r = n, n = e, e = t), n && e !== !1 && this.queue(e || "fx", []), this.each(function() {
				var t = !0,
					n = null != e && e + "queueHooks",
					o = oe.timers,
					s = me.get(this);
				if (n) s[n] && s[n].stop && i(s[n]);
				else
					for (n in s) s[n] && s[n].stop && At.test(n) && i(s[n]);
				for (n = o.length; n--;) o[n].elem !== this || null != e && o[n].queue !== e || (o[n].anim.stop(r), t = !1, o.splice(n, 1));
				(t || !r) && oe.dequeue(this, e)
			})
		},
		finish: function(e) {
			return e !== !1 && (e = e || "fx"), this.each(function() {
				var t, n = me.get(this),
					r = n[e + "queue"],
					i = n[e + "queueHooks"],
					o = oe.timers,
					s = r ? r.length : 0;
				for (n.finish = !0, oe.queue(this, e, []), i && i.cur && i.cur.finish && i.cur.finish.call(this), t = o.length; t--;) o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0), o.splice(t, 1));
				for (t = 0; s > t; t++) r[t] && r[t].finish && r[t].finish.call(this);
				delete n.finish
			})
		}
	}), oe.each({
		slideDown: W("show"),
		slideUp: W("hide"),
		slideToggle: W("toggle"),
		fadeIn: {
			opacity: "show"
		},
		fadeOut: {
			opacity: "hide"
		},
		fadeToggle: {
			opacity: "toggle"
		}
	}, function(e, t) {
		oe.fn[e] = function(e, n, r) {
			return this.animate(t, e, n, r)
		}
	}), oe.speed = function(e, t, n) {
		var r = e && "object" == typeof e ? oe.extend({}, e) : {
			complete: n || !n && t || oe.isFunction(e) && e,
			duration: e,
			easing: n && t || t && !oe.isFunction(t) && t
		};
		return r.duration = oe.fx.off ? 0 : "number" == typeof r.duration ? r.duration : r.duration in oe.fx.speeds ? oe.fx.speeds[r.duration] : oe.fx.speeds._default, (null == r.queue || r.queue === !0) && (r.queue = "fx"), r.old = r.complete, r.complete = function() {
			oe.isFunction(r.old) && r.old.call(this), r.queue && oe.dequeue(this, r.queue)
		}, r
	}, oe.easing = {
		linear: function(e) {
			return e
		},
		swing: function(e) {
			return .5 - Math.cos(e * Math.PI) / 2
		}
	}, oe.timers = [], oe.fx = M.prototype.init, oe.fx.tick = function() {
		var e, n = oe.timers,
			r = 0;
		for (Et = oe.now(); r < n.length; r++) e = n[r], e() || n[r] !== e || n.splice(r--, 1);
		n.length || oe.fx.stop(), Et = t
	}, oe.fx.timer = function(e) {
		e() && oe.timers.push(e) && oe.fx.start()
	}, oe.fx.interval = 13, oe.fx.start = function() {
		St || (St = setInterval(oe.fx.tick, oe.fx.interval))
	}, oe.fx.stop = function() {
		clearInterval(St), St = null
	}, oe.fx.speeds = {
		slow: 600,
		fast: 200,
		_default: 400
	}, oe.fx.step = {}, oe.expr && oe.expr.filters && (oe.expr.filters.animated = function(e) {
		return oe.grep(oe.timers, function(t) {
			return e === t.elem
		}).length
	}), oe.fn.offset = function(e) {
		if (arguments.length) return e === t ? this : this.each(function(t) {
			oe.offset.setOffset(this, e, t)
		});
		var n, r, i = this[0],
			o = {
				top: 0,
				left: 0
			},
			s = i && i.ownerDocument;
		if (s) return n = s.documentElement, oe.contains(n, i) ? (typeof i.getBoundingClientRect !== z && (o = i.getBoundingClientRect()), r = $(s), {
			top: o.top + r.pageYOffset - n.clientTop,
			left: o.left + r.pageXOffset - n.clientLeft
		}) : o
	}, oe.offset = {
		setOffset: function(e, t, n) {
			var r, i, o, s, a, u, l, c = oe.css(e, "position"),
				f = oe(e),
				p = {};
			"static" === c && (e.style.position = "relative"), a = f.offset(), o = oe.css(e, "top"), u = oe.css(e, "left"), l = ("absolute" === c || "fixed" === c) && (o + u).indexOf("auto") > -1, l ? (r = f.position(), s = r.top, i = r.left) : (s = parseFloat(o) || 0, i = parseFloat(u) || 0), oe.isFunction(t) && (t = t.call(e, n, a)), null != t.top && (p.top = t.top - a.top + s), null != t.left && (p.left = t.left - a.left + i), "using" in t ? t.using.call(e, p) : f.css(p)
		}
	}, oe.fn.extend({
		position: function() {
			if (this[0]) {
				var e, t, n = this[0],
					r = {
						top: 0,
						left: 0
					};
				return "fixed" === oe.css(n, "position") ? t = n.getBoundingClientRect() : (e = this.offsetParent(), t = this.offset(), oe.nodeName(e[0], "html") || (r = e.offset()), r.top += oe.css(e[0], "borderTopWidth", !0), r.left += oe.css(e[0], "borderLeftWidth", !0)), {
					top: t.top - r.top - oe.css(n, "marginTop", !0),
					left: t.left - r.left - oe.css(n, "marginLeft", !0)
				}
			}
		},
		offsetParent: function() {
			return this.map(function() {
				for (var e = this.offsetParent || U; e && !oe.nodeName(e, "html") && "static" === oe.css(e, "position");) e = e.offsetParent;
				return e || U
			})
		}
	}), oe.each({
		scrollLeft: "pageXOffset",
		scrollTop: "pageYOffset"
	}, function(n, r) {
		var i = "pageYOffset" === r;
		oe.fn[n] = function(o) {
			return oe.access(this, function(n, o, s) {
				var a = $(n);
				return s === t ? a ? a[r] : n[o] : void(a ? a.scrollTo(i ? e.pageXOffset : s, i ? s : e.pageYOffset) : n[o] = s)
			}, n, o, arguments.length, null)
		}
	}), oe.each({
		Height: "height",
		Width: "width"
	}, function(e, n) {
		oe.each({
			padding: "inner" + e,
			content: n,
			"": "outer" + e
		}, function(r, i) {
			oe.fn[i] = function(i, o) {
				var s = arguments.length && (r || "boolean" != typeof i),
					a = r || (i === !0 || o === !0 ? "margin" : "border");
				return oe.access(this, function(n, r, i) {
					var o;
					return oe.isWindow(n) ? n.document.documentElement["client" + e] : 9 === n.nodeType ? (o = n.documentElement, Math.max(n.body["scroll" + e], o["scroll" + e], n.body["offset" + e], o["offset" + e], o["client" + e])) : i === t ? oe.css(n, r, a) : oe.style(n, r, i, a)
				}, n, s ? i : t, s, null)
			}
		})
	}), oe.fn.size = function() {
		return this.length
	}, oe.fn.andSelf = oe.fn.addBack, "object" == typeof module && "object" == typeof module.exports ? module.exports = oe : "function" == typeof define && define.amd && define("jquery", [], function() {
		return oe
	}), "object" == typeof e && "object" == typeof e.document && (e.jQuery = e.$ = oe)
}(window);
