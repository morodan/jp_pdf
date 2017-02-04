var page = require('webpage').create();
page.viewportSize = { width: 1200, height: 960 };


var syst = require('system');
var t = Date.now();
var address = '';



if (syst.args.length < 2) {
  console.log('Usage: convert.js <string>');
  phantom.exit();
}
var fname = syst.args[1];
address = 'tmp/' + fname + '.html';


page.open(address, function(status){
    console.log(status);
    page.render('tmp/' + fname + '.pdf');
    phantom.exit();
});