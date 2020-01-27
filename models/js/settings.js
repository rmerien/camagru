function displayInfo() {
    const content = document.getElementById('content');
    const uname = loggedUsername();
    const mail = loggedMail();
    content.innerHTML = '';
    content.innerHTML = "<h3>"+uname+"</h3><p>Mail: "+mail+"</p>";
}

function displayCM() {
    const content = document.getElementById('content');
    let form = document.createElement('form');
    let newpasswd = document.createElement('input');
    let confirmpw = document.createElement('input');
    let submit = document.createElement('button');

    content.innerHTML = '';
    newpasswd.setAttribute('id', 'newpw-set');
    confirmpw.setAttribute('id', 'confirmpw-set');
    submit.setAttribute('id', 'set-submit')
    newpasswd.setAttribute('placeholder', 'Desired eMail');
    confirmpw.setAttribute('placeholder', 'Confirm eMail');
    newpasswd.setAttribute('type', 'mail');
    confirmpw.setAttribute('type', 'mail');
    form.append(newpasswd, confirmpw, submit);
    content.append(form);
}

function displayCP() {
    const content = document.getElementById('content');
    let form = document.createElement('form');
    let oldpasswd = document.createElement('input');
    let newpasswd = document.createElement('input');
    let confirmpw = document.createElement('input');
    let submit = document.createElement('button');

    content.innerHTML = '';
    oldpasswd.setAttribute('id', 'oldpw-set');
    newpasswd.setAttribute('id', 'newpw-set');
    confirmpw.setAttribute('id', 'confirmpw-set');
    submit.setAttribute('id', 'set-submit')
    oldpasswd.setAttribute('placeholder', 'Current Password');
    newpasswd.setAttribute('placeholder', 'Desired Password');
    confirmpw.setAttribute('placeholder', 'Confirm New Password');
    oldpasswd.setAttribute('type', 'password');
    newpasswd.setAttribute('type', 'password');
    confirmpw.setAttribute('type', 'password');
    oldpasswd.setAttribute('autocomplete', 'off');
    newpasswd.setAttribute('autocomplete', 'on');
    confirmpw.setAttribute('autocomplete', 'off');
    submit.addEventListener('click', changePassord);
    form.append(oldpasswd, newpasswd, confirmpw, submit);
    content.append(form);

    function changePassword() {
        
        alert('lol');
    }
    
    function sha512(str) {
        return crypto.subtle.digest("SHA-512", new TextEncoder("utf-8").encode(str)).then(buf => {
          return Array.prototype.map.call(new Uint8Array(buf), x=>(('00'+x.toString(16)).slice(-2))).join('');
        });
      }
}

function displayPV() {
    const content = document.getElementById('content');
    let notif = document.createElement('button');
    let deleteAccount = document.createElement('button');

    content.innerHTML = '';
    let notCheck = checkNotifEnabled();
    alert(notCheck);
    if (notCheck == 1) {
        notif.backgroundColor = 'var(--color-camagru-4)';
        notif.color = 'var(--color-camagru-5)'
        notif.innerText = 'Enable Notifications';
        notif.addEventListener('click', enableNotif);
    } else if (notCheck == 0) {
        notif.backgroundColor = 'var(--color-camagru-5)';
        notif.color = 'var(--color-camagru-4)'
        notif.innerText = 'Enable Notifications';
        notif.addEventListener('click', disableNotif);
    }

    content.append(notif);

    function checkNotifEnabled() {
        const uname = loggedUsername();
        var fd = new FormData();

        fd.append('uname', uname);
        fd.append('action', 'statusNotif');

        var xhr = getXHR();
        xhr.open('POST', '../models/m_settings.php', true);
        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
        xhr.onload = function(e) {
            return (xhr.responseText);
        };
        xhr.send(fd);
    }

    function enableNotif() {
        const uname = loggedUsername();
        var fd = new FormData();

        fd.append('uname', uname);
        fd.append('action', 'enableNotif');

        var xhr = getXHR();
        xhr.open('POST', '../models/m_settings.php', true);
        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
        xhr.onload = function(e) {
            return (xhr.responseText);
        };
        xhr.send(fd);
    }

    function disableNotif() {
        const uname = loggedUsername();
        var fd = new FormData();

        fd.append('uname', uname);
        fd.append('action', 'disableNotif');

        var xhr = getXHR();
        xhr.open('POST', '../models/m_settings.php', true);
        xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
        xhr.onload = function(e) {
            return (xhr.responseText);
        };
        xhr.send(fd);
    }
}

function initSettings()
{
    const menu1 = document.getElementById('menu-1');
    const menu2 = document.getElementById('menu-2');
    const menu3 = document.getElementById('menu-3');
    const menu4 = document.getElementById('menu-4');

    menu1.addEventListener('click', displayInfo);
    menu2.addEventListener('click', displayCM);
    menu3.addEventListener('click', displayCP);
    menu4.addEventListener('click', displayPV);
    displayInfo();
}

initSettings();