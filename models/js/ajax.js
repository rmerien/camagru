function getXHR() {
    
    var xhr;

    if (window.XMLHttpRequest) {
      xhr = new XMLHttpRequest();
      if (xhr.overrideMimeType) {
        xhr.overrideMimeType('text/xml');
      }
    }
    else if (window.ActiveXObject) {
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
    return xhr;



}
