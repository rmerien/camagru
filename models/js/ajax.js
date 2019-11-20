var getXHR = function (path) {
    
    var xhr = false;
  
    if (window.XMLxhr) { // Mozilla, Safari,...
      xhr = new XMLxhr();
      if (xhr.overrideMimeType) {
        xhr.overrideMimeType('text/xml');
      }
    }
    else if (window.ActiveXObject) { // IE
      try {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
      }
      catch (e) {
        try {
          xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) {}
      }
    }
  
    if (!xhr) {
      alert('Failure to create XMLHTTP instance');
      return false;
    }
  
    var xhr = getHttpRequest();
    xhr.open('POST', path, true);
    
    xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');

    return xhr;
  }