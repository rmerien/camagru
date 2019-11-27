var _validFileExtensions = [".jpg", ".jpeg", ".png"];

function validUploadInput(input) {
    console.log(input.value);
    if (input.type == "file") {
        var fileName = input.value;
         if (fileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var extension = _validFileExtensions[j];
                if (fileName.substr(fileName.length - extension.length, extension.length).toLowerCase() == extension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, " + fileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                input.value = "";
                return false;
            }
        }
    }
    return true;
}