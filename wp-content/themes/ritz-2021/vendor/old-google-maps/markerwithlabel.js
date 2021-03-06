/*!
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function inherits(n, t) {
    function i() {
    }

    i.prototype = t.prototype;
    n.superClass_ = t.prototype;
    n.prototype = new i;
    n.prototype.constructor = n
}

function MarkerLabel_(n, t) {
    this.marker_ = n;
    this.handCursorURL_ = n.handCursorURL;
    this.labelDiv_ = document.createElement("div");
    this.labelDiv_.style.cssText = "position: absolute; overflow: hidden;";
    this.eventDiv_ = document.createElement("div");
    this.eventDiv_.style.cssText = this.labelDiv_.style.cssText;
    this.eventDiv_.setAttribute("onselectstart", "return false;");
    this.eventDiv_.setAttribute("ondragstart", "return false;");
    this.crossDiv_ = MarkerLabel_.getSharedCross(t)
}

function MarkerWithLabel(n) {
    n = n || {};
    n.labelContent = n.labelContent || "";
    n.labelAnchor = n.labelAnchor || new google.maps.Point(0, 0);
    n.labelClass = n.labelClass || "markerLabels";
    n.labelStyle = n.labelStyle || {};
    n.labelInBackground = n.labelInBackground || !1;
    typeof n.labelVisible == "undefined" && (n.labelVisible = !0);
    typeof n.raiseOnDrag == "undefined" && (n.raiseOnDrag = !0);
    typeof n.clickable == "undefined" && (n.clickable = !0);
    typeof n.draggable == "undefined" && (n.draggable = !1);
    typeof n.optimized == "undefined" && (n.optimized = !1);
    n.crossImage = n.crossImage || "http" + (document.location.protocol === "https:" ? "s" : "") + "://maps.gstatic.com/intl/en_us/mapfiles/drag_cross_67_16.png";
    n.handCursor = n.handCursor || "http" + (document.location.protocol === "https:" ? "s" : "") + "://maps.gstatic.com/intl/en_us/mapfiles/closedhand_8_8.cur";
    n.optimized = !1;
    this.label = new MarkerLabel_(this, n.crossImage, n.handCursor);
    google.maps.Marker.apply(this, arguments)
}

inherits(MarkerLabel_, google.maps.OverlayView);
MarkerLabel_.getSharedCross = function (n) {
    var t;
    return typeof MarkerLabel_.getSharedCross.crossDiv == "undefined" && (t = document.createElement("img"), t.style.cssText = "position: absolute; z-index: 1000002; display: none;", t.style.marginLeft = "-8px", t.style.marginTop = "-9px", t.src = n, MarkerLabel_.getSharedCross.crossDiv = t), MarkerLabel_.getSharedCross.crossDiv
};
MarkerLabel_.prototype.onAdd = function () {
    var n = this, r = !1, t = !1, o, s, h, f, i, c, l, u = 20, a = "url(" + this.handCursorURL_ + ")",
        e = function (n) {
            n.preventDefault && n.preventDefault();
            n.cancelBubble = !0;
            n.stopPropagation && n.stopPropagation()
        }, v = function () {
            n.marker_.setAnimation(null)
        };
    this.getPanes().overlayImage.appendChild(this.labelDiv_);
    this.getPanes().overlayMouseTarget.appendChild(this.eventDiv_);
    typeof MarkerLabel_.getSharedCross.processed == "undefined" && (this.getPanes().overlayImage.appendChild(this.crossDiv_), MarkerLabel_.getSharedCross.processed = !0);
    this.listeners_ = [google.maps.event.addDomListener(this.eventDiv_, "mouseover", function (t) {
        (n.marker_.getDraggable() || n.marker_.getClickable()) && (this.style.cursor = "pointer", google.maps.event.trigger(n.marker_, "mouseover", t))
    }), google.maps.event.addDomListener(this.eventDiv_, "mouseout", function (i) {
        (n.marker_.getDraggable() || n.marker_.getClickable()) && !t && (this.style.cursor = n.marker_.getCursor(), google.maps.event.trigger(n.marker_, "mouseout", i))
    }), google.maps.event.addDomListener(this.eventDiv_, "mousedown", function (i) {
        t = !1;
        n.marker_.getDraggable() && (r = !0, this.style.cursor = a);
        (n.marker_.getDraggable() || n.marker_.getClickable()) && (google.maps.event.trigger(n.marker_, "mousedown", i), e(i))
    }), google.maps.event.addDomListener(document, "mouseup", function (e) {
        var s;
        if (r && (r = !1, n.eventDiv_.style.cursor = "pointer", google.maps.event.trigger(n.marker_, "mouseup", e)), t) {
            if (i) {
                s = n.getProjection().fromLatLngToDivPixel(n.marker_.getPosition());
                s.y += u;
                n.marker_.setPosition(n.getProjection().fromDivPixelToLatLng(s));
                try {
                    n.marker_.setAnimation(google.maps.Animation.BOUNCE);
                    setTimeout(v, 1406)
                } catch (h) {
                }
            }
            n.crossDiv_.style.display = "none";
            n.marker_.setZIndex(o);
            f = !0;
            t = !1;
            e.latLng = n.marker_.getPosition();
            google.maps.event.trigger(n.marker_, "dragend", e)
        }
    }), google.maps.event.addListener(n.marker_.getMap(), "mousemove", function (f) {
        var e;
        r && (t ? (f.latLng = new google.maps.LatLng(f.latLng.lat() - s, f.latLng.lng() - h), e = n.getProjection().fromLatLngToDivPixel(f.latLng), i && (n.crossDiv_.style.left = e.x + "px", n.crossDiv_.style.top = e.y + "px", n.crossDiv_.style.display = "", e.y -= u), n.marker_.setPosition(n.getProjection().fromDivPixelToLatLng(e)), i && (n.eventDiv_.style.top = e.y + u + "px"), google.maps.event.trigger(n.marker_, "drag", f)) : (s = f.latLng.lat() - n.marker_.getPosition().lat(), h = f.latLng.lng() - n.marker_.getPosition().lng(), o = n.marker_.getZIndex(), c = n.marker_.getPosition(), l = n.marker_.getMap().getCenter(), i = n.marker_.get("raiseOnDrag"), t = !0, n.marker_.setZIndex(1e6), f.latLng = n.marker_.getPosition(), google.maps.event.trigger(n.marker_, "dragstart", f)))
    }), google.maps.event.addDomListener(document, "keydown", function (r) {
        t && r.keyCode === 27 && (i = !1, n.marker_.setPosition(c), n.marker_.getMap().setCenter(l), google.maps.event.trigger(document, "mouseup", r))
    }), google.maps.event.addDomListener(this.eventDiv_, "click", function (t) {
        (n.marker_.getDraggable() || n.marker_.getClickable()) && (f ? f = !1 : (google.maps.event.trigger(n.marker_, "click", t), e(t)))
    }), google.maps.event.addDomListener(this.eventDiv_, "dblclick", function (t) {
        (n.marker_.getDraggable() || n.marker_.getClickable()) && (google.maps.event.trigger(n.marker_, "dblclick", t), e(t))
    }), google.maps.event.addListener(this.marker_, "dragstart", function () {
        t || (i = this.get("raiseOnDrag"))
    }), google.maps.event.addListener(this.marker_, "drag", function () {
        t || i && (n.setPosition(u), n.labelDiv_.style.zIndex = 1e6 + (this.get("labelInBackground") ? -1 : 1))
    }), google.maps.event.addListener(this.marker_, "dragend", function () {
        t || i && n.setPosition(0)
    }), google.maps.event.addListener(this.marker_, "position_changed", function () {
        n.setPosition()
    }), google.maps.event.addListener(this.marker_, "zindex_changed", function () {
        n.setZIndex()
    }), google.maps.event.addListener(this.marker_, "visible_changed", function () {
        n.setVisible()
    }), google.maps.event.addListener(this.marker_, "labelvisible_changed", function () {
        n.setVisible()
    }), google.maps.event.addListener(this.marker_, "title_changed", function () {
        n.setTitle()
    }), google.maps.event.addListener(this.marker_, "labelcontent_changed", function () {
        n.setContent()
    }), google.maps.event.addListener(this.marker_, "labelanchor_changed", function () {
        n.setAnchor()
    }), google.maps.event.addListener(this.marker_, "labelclass_changed", function () {
        n.setStyles()
    }), google.maps.event.addListener(this.marker_, "labelstyle_changed", function () {
        n.setStyles()
    })]
};
MarkerLabel_.prototype.onRemove = function () {
    var n;
    for (this.labelDiv_.parentNode.removeChild(this.labelDiv_), this.eventDiv_.parentNode.removeChild(this.eventDiv_), n = 0; n < this.listeners_.length; n++) google.maps.event.removeListener(this.listeners_[n])
};
MarkerLabel_.prototype.draw = function () {
    this.setContent();
    this.setTitle();
    this.setStyles()
};
MarkerLabel_.prototype.setContent = function () {
    var n = this.marker_.get("labelContent");
    typeof n.nodeType == "undefined" ? (this.labelDiv_.innerHTML = n, this.eventDiv_.innerHTML = this.labelDiv_.innerHTML) : (this.labelDiv_.innerHTML = "", this.labelDiv_.appendChild(n), n = n.cloneNode(!0), this.eventDiv_.appendChild(n))
};
MarkerLabel_.prototype.setTitle = function () {
    this.eventDiv_.title = this.marker_.getTitle() || ""
};
MarkerLabel_.prototype.setStyles = function () {
    var n, t;
    this.labelDiv_.className = this.marker_.get("labelClass");
    this.eventDiv_.className = this.labelDiv_.className;
    this.labelDiv_.style.cssText = "";
    this.eventDiv_.style.cssText = "";
    t = this.marker_.get("labelStyle");
    for (n in t) t.hasOwnProperty(n) && (this.labelDiv_.style[n] = t[n], this.eventDiv_.style[n] = t[n]);
    this.setMandatoryStyles()
};
MarkerLabel_.prototype.setMandatoryStyles = function () {
    this.labelDiv_.style.position = "absolute";
    this.labelDiv_.style.overflow = "hidden";
    typeof this.labelDiv_.style.opacity != "undefined" && this.labelDiv_.style.opacity !== "" && (this.labelDiv_.style.MsFilter = '"progid:DXImageTransform.Microsoft.Alpha(opacity=' + this.labelDiv_.style.opacity * 100 + ')"', this.labelDiv_.style.filter = "alpha(opacity=" + this.labelDiv_.style.opacity * 100 + ")");
    this.eventDiv_.style.position = this.labelDiv_.style.position;
    this.eventDiv_.style.overflow = this.labelDiv_.style.overflow;
    this.eventDiv_.style.opacity = .01;
    this.eventDiv_.style.MsFilter = '"progid:DXImageTransform.Microsoft.Alpha(opacity=1)"';
    this.eventDiv_.style.filter = "alpha(opacity=1)";
    this.setAnchor();
    this.setPosition();
    this.setVisible()
};
MarkerLabel_.prototype.setAnchor = function () {
    var n = this.marker_.get("labelAnchor");
    this.labelDiv_.style.marginLeft = -n.x + "px";
    this.labelDiv_.style.marginTop = -n.y + "px";
    this.eventDiv_.style.marginLeft = -n.x + "px";
    this.eventDiv_.style.marginTop = -n.y + "px"
};
MarkerLabel_.prototype.setPosition = function (n) {
    var t = this.getProjection().fromLatLngToDivPixel(this.marker_.getPosition());
    typeof n == "undefined" && (n = 0);
    this.labelDiv_.style.left = Math.round(t.x) + "px";
    this.labelDiv_.style.top = Math.round(t.y - n) + "px";
    this.eventDiv_.style.left = this.labelDiv_.style.left;
    this.eventDiv_.style.top = this.labelDiv_.style.top;
    this.setZIndex()
};
MarkerLabel_.prototype.setZIndex = function () {
    var n = this.marker_.get("labelInBackground") ? -1 : 1;
    typeof this.marker_.getZIndex() == "undefined" ? (this.labelDiv_.style.zIndex = parseInt(this.labelDiv_.style.top, 10) + n, this.eventDiv_.style.zIndex = this.labelDiv_.style.zIndex) : (this.labelDiv_.style.zIndex = this.marker_.getZIndex() + n, this.eventDiv_.style.zIndex = this.labelDiv_.style.zIndex)
};
MarkerLabel_.prototype.setVisible = function () {
    this.labelDiv_.style.display = this.marker_.get("labelVisible") ? this.marker_.getVisible() ? "block" : "none" : "none";
    this.eventDiv_.style.display = this.labelDiv_.style.display
};
inherits(MarkerWithLabel, google.maps.Marker);
MarkerWithLabel.prototype.setMap = function (n) {
    google.maps.Marker.prototype.setMap.apply(this, arguments);
    this.label.setMap(n)
}