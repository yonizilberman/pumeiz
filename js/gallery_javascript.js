// Begin User Configurable Variables:

var imgsPerPg = 9; // number of img elements in the html
var imgsMax = 250;  // total number of images
var slideTimeout = 7; // seconds before loading the next slide

var gPath = 'images/gallery_images/';  // gallery files (thumbnails) path, include trailing slash
var gPrefix = 'tnshell';
var gSuffix = '';
var gExt = '.jpg';
var gZeros = true; // filename uses leading zeros?
var gDigits = 4    // total digits in filename, including leading zeros

var sPath = 'images/gallery_images/'; // slideshow files (big imgs) path, include trailing slash
var sPrefix = 'shell';
var sSuffix = '';
var sExt = '.jpg';
var sZeros = true; // filename uses leading zeros?                     
var sDigits = 4    // total digits in filename, including leading zeros

var captions = new Array();
// There must be (imgsMax + 1) captions.
// captions[0] is currently not used.


var loopIndex=0;

for ( loopIndex=0;loopIndex<=imgsMax;loopIndex++){
  captions[loopIndex] = "";

  }


// End User Configurable Variables

window.onload = function()
{
  xImgGallery();
};


// don't change these:
var galMode = true;
var autoSlide = false;
var slideTimer = null;
var slideCounter = 0;
var currentSlide = 1;

function xImgGallery()
{
  if (document.getElementById && document.getElementById('navigation').style) {
    var n = 1, a = xGetURLArguments();
    if (a.length) {
      var arg = a['g'] || a['s'];
      if (arg) {
        n = parseInt(arg, 10);
        if (n <= 0 || n > imgsMax) { n = 1; } 
        if (a['s']) { galMode = false; }
      }
    }
    gal_paint(n);
    document.getElementById('time').style.display = 'none';
  }
}
function gal_paint(n)
{
  gal_setImgs(n);
  gal_setNav(n);
}
function gal_setImgs(n)
{
  var ssEle = document.getElementById('slideshow');
  var galEle = document.getElementById('gallery1');
  var i, imgTitle, pth, img, id, src, ipp, idPrefix, imgSuffix, imgPrefix;
  var zeros, digits, capEle, capPar;
  if (galMode) {
    ipp = imgsPerPg;
    idPrefix = 'g';
    imgPrefix = gPrefix;
    imgSuffix = gSuffix + gExt;
    imgTitle = 'Click to view large image';
    ssEle.style.display = 'none';
    galEle.style.display = 'block';
    pth = gPath;
    zeros = gZeros;
    digits = gDigits;
  }
  else {
    currentSlide = n;
    ipp = 1;
    idPrefix = 's';
    imgPrefix = sPrefix;
    imgSuffix = sSuffix + sExt;
    imgTitle = '';
    ssEle.style.display = 'block';
    galEle.style.display = 'none';
    pth = sPath;
    zeros = sZeros;
    digits = sDigits;
  }
  for (i = 0; i < ipp; ++i) {
    id = idPrefix + (i + 1);
    img = document.getElementById(id);
    capEle = document.getElementById((galMode ? 'gc':'sc') + (i + 1));
    if (capEle) capPar = capEle.parentNode;
    if ((n + i) <= imgsMax) {
      if (zeros) src = xPad(n + i, digits, '0', true);
      else src = (n + i) + "";
      img.title = imgTitle;
      img.alt = src;
      img.src = pth + imgPrefix + src + imgSuffix; // img to load now
      img.onerror = imgOnError;
      if (galMode) {
        img.style.cursor = 'pointer';
        img.slideNum = n + i; // slide img to load onclick
        //img.onclick = imgOnClick;
      }
      if (capEle) {
        capEle.innerHTML = captions[i + n];
        if (capPar) capPar.style.display = 'block';
      }
      img.style.display = 'inline';
    }
    else {
      img.style.display = 'none';
      if (capEle) {
        if (capPar) capPar.style.display = 'none';
      }
    }
  }  
}
function imgOnClick()
{
  galMode = false;
  gal_paint(this.slideNum);
}
function imgOnError()
{
  var p = this.parentNode;
  if (p) p.style.display = 'none';
}
function gal_setNav(n)
{
  var ipp = galMode ? imgsPerPg : 1;
  // Next
  var e = document.getElementById('next');
  if (n + ipp <= numberOfPicInFolder) { // numberOfPicInFolder if (n + ipp <= imgsMax)
    e.nextNum = n + ipp;
    e.onclick = next_onClick;
    e.style.display = 'inline';
  }
  else {
    e.nextNum = 1;
  }
  // Previous
  e = document.getElementById('prev');
  e.style.display = 'inline';
  e.onclick = prev_onClick;
  if (n > ipp) {
    e.prevNum = n - ipp;
  }
  else {
    e.prevNum = galMode ? normalize(numberOfPicInFolder) : numberOfPicInFolder; //normalize(imgsMax) : imgsMax;
  }
  // Back
  e = document.getElementById('back');
  if (!galMode) {
    e.onclick = back_onClick;
    e.style.display = 'inline';
    e.backNum = normalize(n);
  }
  else {
    e.style.display = 'none';
  }
  // Auto Slide
  e = document.getElementById('auto');
  if (!galMode) {
    e.onclick = auto_onClick;
    e.style.display = 'inline';
  }
  else {
    e.style.display = 'none';
  }
}
function normalize(n)
{
  return 1 + imgsPerPg * (Math.ceil(n / imgsPerPg) - 1);
}
function next_onClick(e)
{
  gal_paint(this.nextNum);
}
function prev_onClick(e)
{
  gal_paint(this.prevNum);
}
function back_onClick(e)
{
  galMode = true;
  if (slideTimer) {
    clearTimeout(slideTimer);
  }
  autoSlide = false;
  gal_paint(this.backNum);
  document.getElementById('time').style.display = 'none';
}
function auto_onClick(e)
{
  var ele = document.getElementById('time');
  autoSlide = !autoSlide;
  if (autoSlide) {
    slideCounter = 0;
    slideTimer = setTimeout("slide_OnTimeout()", slideTimeout);
    ele.style.display = 'inline';
  }
  else if (slideTimer) {
    clearTimeout(slideTimer);
    ele.style.display = 'none';
  }
}
function slide_OnTimeout()
{
  slideTimer = setTimeout("slide_OnTimeout()", 1000);
  ++slideCounter;
  document.getElementById('time').innerHTML = slideCounter + '/' + slideTimeout;
  if (slideCounter == slideTimeout) {
    if (++currentSlide > imgsMax) currentSlide = 1; 
    gal_paint(currentSlide);
    slideCounter = 0;
  }
}

/* xGetURLArguments and xPad are part of the X library,
   distributed under the terms of the GNU LGPL,
   and maintained at Cross-Browser.com.
*/
function xGetURLArguments()
{
  var idx = location.href.indexOf('?');
  var params = new Array();
  if (idx != -1) {
    var pairs = location.href.substring(idx+1, location.href.length).split('&');
    for (var i=0; i<pairs.length; i++) {
      nameVal = pairs[i].split('=');
      params[i] = nameVal[1];
      params[nameVal[0]] = nameVal[1];
    }
  }
  return params;
}
function xPad(str, finalLen, padChar, left)
{
  if (typeof str != 'string') str = str + '';
  if (left) { for (var i=str.length; i<finalLen; ++i) str = padChar + str; }
  else { for (var i=str.length; i<finalLen; ++i) str += padChar; }
  return str;
}
/*---------------------------------------------------------------------------*/

