function wrap_child (text) {
	var res=[];for (var i=0; i<3; i++)
		res[i]='<table background=images/menutab.gif border=0 cellspacing=0 cellpadding=0 width=100% height=21><tr><td width=100%  class=minner>' + text + '</td></tr></table>'
	return res;

}

var MENU_ITEMS0 = [['Information', null, {'sw' : 97}, ['&nbsp;&nbsp;How U-EX Works', 'http://www.u-exchange.com/howitworks'],['&nbsp;&nbsp;FAQs and Facts', 'http://www.u-exchange.com/faq'],['&nbsp;&nbsp;How to Barter', 'http://www.u-exchange.com/barter101'],['&nbsp;&nbsp;Media Inquiries', 'http://www.u-exchange.com/media']],['View Listings', null, {'sw' : 111}, ['&nbsp;&nbsp;USA', 'http://www.u-exchange.com/usasearch'],['&nbsp;&nbsp;Canada', 'http://www.u-exchange.com/canadasearch'],['&nbsp;&nbsp;United Kingdom', 'http://www.u-exchange.com/unitedkingdomsearch'],['&nbsp;&nbsp;All Countries', 'http://www.u-exchange.com/membersearch']],['Sign Up Now', 'http://www.u-exchange.com/register', {'sw' : 97}] ,['Keyword Search', 'http://www.u-exchange.com/searchadvanced', {'sw' : 118}] ,['Map Search', 'http://www.u-exchange.com/mapsearch', {'sw' : 90}] ,['Advertisers', 'http://www.u-exchange.com/sponsoredads', {'sw' : 97}] ,['Forgot Password', 'http://www.u-exchange.com/password-request', {'sw' : 125}] ];
