var contentUrl = document.location.protocol + '//content.roomscope.com',
rsvnUrl = document.location.protocol + '//reservation.roomscope.com';
(function () {
var rs = document.createElement('script');
rs.type = 'text/javascript'; rs.async = true; rs.id = 'script-text';
rs.src = contentUrl.concat('/Scripts/Site/Reservation/widget.js');
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(rs, s);
window.__rscfg = { id: '1221', lang: 'th' };
}());