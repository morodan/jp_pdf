#How to install PhantomJS on a linux machine.

1. connect to server via ssh
2. change the user to root user with:
`su -`
or 
`sudo su`
depending on what linux you have (centos or ubuntu)
3. go to tmp folder
`cd /tmp`
4. Download latest phantom static build with:
`wget https://bitbucket.org/ariya/phantomjs/downloads/phantomjs-2.1.1-linux-x86_64.tar.bz2`
5. Unzip the file with:
`tar -xjvf phantomjs-2.1.1-linux-x86_64.tar.bz2`
6. go to phantom folder
`cd phantomjs-2.1.1-linux-x86_64/bin`
7. move or copy the file `phantomjs` in your path:
`mv phantomjs /usr/bin/phantomjs`
or
`cp phantomjs /usr/bin/phantomjs`
8. check if the file is executable, if isn't please make it
`chmod a+x /usr/bin/phantomjs`
8. try to run the file from any folder 
`phantomjs`
9. put in a folder, where you want the next js file:

`convert.js`

```js
/********************************************/
var page = require('webpage').create();

// here you can set the viewport size
page.viewportSize = { width: 1200, height: 960 };

var syst = require('system');

var t = Date.now();

// set the default url if you want
var address = 'http://www.google.com';

if (syst.args.length < 2) {
  console.log('Usage: convert.js <some URL>');
  phantom.exit();
}

address = syst.args[1];

page.open(address, function(status){
    console.log('Status: ' + status);
    if (status === 'success') {
	    page.render('/your/path/for/pdf-files/' + t + '.pdf');
//    	page.render('/your/path/for/png-files/' + t + '.png');
    }
    phantom.exit();
});
/**********************************************/
```

10. how to use the script from command line, in the folder where the convert.js is
`phantomjs convert.js http://test.adviceasdev.dk/maerskretool/print-example.html`

after that, you will have a pdf file, something like 4545335353000.pdf in your folder


##Update

`index.html` is only a demo to show you how the things works

folders `css`, `js` and `img` are for demo only

`convert.js` is the file which make the conversion from html to pdf. this file will be run in command line by php

`converttopdf.php` - the file which generate html file and send it to convert.js

`download.php` - will return the pdf file and delete it from server

temporary files (html and pdf) will be saved in `tmp` folder and are automatically deleted when the pdf is downloaded.