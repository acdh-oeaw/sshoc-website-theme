(function (window) {
  'use strict';

  var $ = window.jQuery;
  if (!$) {
    return;
  }

  $.expr = $.expr || {};
  $.expr.pseudos = $.expr.pseudos || {};

  // Compatibility bridge for legacy plugins that still access $.expr[":"]
  // (removed/changed in newer jQuery versions).
  if (!$.expr[':']) {
    $.expr[':'] = $.expr.pseudos;
  }

  if ($.expr[':'] !== $.expr.pseudos) {
    $.expr.pseudos = $.expr[':'];
  }

  // jQuery 4 removed helpers used by legacy plugins.
  if (typeof $.isArray !== 'function') {
    $.isArray = Array.isArray;
  }

  if (typeof $.isFunction !== 'function') {
    $.isFunction = function (obj) {
      return typeof obj === 'function';
    };
  }

  if (typeof $.isNumeric !== 'function') {
    $.isNumeric = function (value) {
      if (value === null || value === '' || Array.isArray(value)) {
        return false;
      }
      return !Number.isNaN(Number(value));
    };
  }

  if (typeof $.trim !== 'function') {
    $.trim = function (text) {
      return text == null ? '' : String(text).trim();
    };
  }

  if (typeof $.type !== 'function') {
    $.type = function (obj) {
      if (obj === null) {
        return 'null';
      }
      if (obj === undefined) {
        return 'undefined';
      }
      if (Array.isArray(obj)) {
        return 'array';
      }
      return typeof obj === 'object'
        ? Object.prototype.toString.call(obj).slice(8, -1).toLowerCase()
        : typeof obj;
    };
  }

  if (typeof $.isWindow !== 'function') {
    $.isWindow = function (obj) {
      return obj != null && obj === obj.window;
    };
  }

  if (!$.fn.size) {
    $.fn.size = function () {
      return this.length;
    };
  }
})(window);
