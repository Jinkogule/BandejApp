function toggle(oInput) {
    var aInputs = document.getElementsByTagName('input');
    for (var i=0;i<aInputs.length;i++) {
        if (aInputs[i] != oInput) {
            aInputs[i].checked = oInput.checked;
        }
    }
}

function setGlobal(){
    global = true;
};

Echo.private('notifications').listen('NewNotification', (e) => {
    console.log(e.notification);//teste se notificação ta funcionando
});
